@extends( 'layout' )

@section('breadcrumb')
    <li><i class="fa fa-dashboard"></i> <a href="/admin">Dashboard</a></li>
    <li class="active">Salles</li>
@stop

@section( 'content' )
    <div class="row">
        <div class="col-lg-12">
            <h2>Salles</h2>
            <div class="table-responsive">
                @if( count($rooms) > 0 )
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Salle</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Pays</th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Capacité</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->title }}</td>
                            <td>{{ $room->description }}</td>
                            <td><img src="<?php echo asset('storage/medias/rooms/' . $room->id . '.jpg'); ?>" alt="{{ $room->title }}" width="150" /></td>
                            <td>{{ ucfirst( $room->country ) }}</td>
                            <td>{{ ucfirst( $room->city ) }}</td>
                            <td>{{ $room->address }}</td>
                            <td>{{ $room->postal_code }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>{{ ucfirst( $room->category ) }}</td>
                            <td>
                                <a href="/admin/rooms/{{ $room->id  }}" title="Détails"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <a href="/admin/rooms/{{ $room->id  }}/edit" title="Editer"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="/admin/rooms/{{ $room->id  }}/delete" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@stop