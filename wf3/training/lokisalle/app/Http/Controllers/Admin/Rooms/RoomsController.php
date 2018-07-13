<?php

namespace Lokisalle\Http\Controllers\Admin\Rooms;

use DB;
use Lokisalle\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Lokisalle\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    public function products()
    {
        return $this->belongsTo( Product::class );
    }

    public function show()
    {
        $rooms = Room::all();

        return view('rooms', compact( 'rooms' )
        );
    }


    public function details( $id ) {
        $room = Rooms::find( $id );

        return view('rooms.details', compact( 'room' ));
    }

    public function store(Request $request)
    {
        $errors = [];
        $success = '';

//        var_dump(Input::all()); exit;
        if( ! empty( Input::all() ) )
        {
            $errors_messages = [
                'required'  => 'Le champ <strong>:attribute</strong> est obligatoire.',
                'size'      => 'Le champ <strong>:attribute</strong> doit contenir exactement <strong>:size</strong> caractères.',
                'max'       => 'Le champ <strong>:attribute</strong> doit contenir maximum <strong>:max</strong> caractères.',
                'digits'    => 'Le champ <strong>:attribute</strong> doit être de type numérique.',
                'in'        => 'Le champ <strong>:attribute</strong> doit être compris parmi les valeurs suivantes : <strong>:values</strong>',
                'mimes'     => 'Le fichier image envoyé doit être de type <strong>:values</strong>',
            ];

            // Valide les champs, si une erreur est repérée, le code s'arrête
            $this->validate(
                $request,
                [
                    'title'         => 'required|max:50',
                    'description'   => 'required|max:255',
                    'country'       => 'required|max:20',
                    'city'          => 'required|max:25',
                    'address'       => 'required|max:100',
                    'postal_code'   => 'required|digits:5|numeric',
                    'capacity'      => 'required|max:4',
                    'category'      => 'required|max:10|in:bureau,reunion,formation',
                    'pic'           => 'required|mimes:jpeg'
                ],
                $errors_messages
            );

            // On sauvegarde les données en BDD
            $room = Rooms::create([
                'title'         => $request->title,
                'description'   => $request->description,
                'country'       => $request->country,
                'city'          => $request->city,
                'address'       => $request->address,
                'postal_code'   => $request->postal_code,
                'capacity'      => $request->capacity,
                'category'      => $request->category
            ]);

            // Si la requête retourne un ID
            if( is_int( $room->id ) ) {

                // On affichera un message de confirmation
                Session::flash( 'success', 'La salle a bien éte ajoutée.' );

                // Si on a reçu une image
                if( $request->hasFile( 'pic' ) && $request->file( 'pic' )->isValid() ){

                    $base_path = 'medias/rooms';
                    $filename = $room->id . '.jpg';

                    $path = public_path( $base_path . '/' . $filename );
                    Image::make(
                        $request
                            ->file( 'pic' )
                            ->getRealPath()
                    )
                        ->resize(1200, 1200)
                        ->insert('logo-traddamus-fb.png', 'bottom-right')
                        ->save( $path );

                    $path_th = public_path( $base_path . '/th/' . $filename );
                    Image::make(
                        $request
                            ->file( 'pic' )
                            ->getRealPath()
                    )
                        ->resize(150, 150)
                        ->insert('logo-traddamus-fb-th.png')
                        ->save( $path_th );
                    ;
                }
            }

        }

        return view('admin.rooms.add', [ 'success' => $success]);
    }
}
