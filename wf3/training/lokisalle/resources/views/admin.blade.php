@extends( 'layout' )

@section( 'title' )
    Admin
@stop

@section( 'content' )
    <div class="row">
        <div class="col-lg-12">
            <h2>Produits</h2>
            <div class="table-responsive">
                @if( count($products) > 0 )
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID Produit</th>
                            <th>Date d'arrivée</th>
                            <th>Date de départ</th>
                            <th>ID Salle</th>
                            <th>Prix</th>
                            <th>Etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ Carbon\Carbon::parse($product->arrived_date)->format('d/m/Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($product->left_date)->format('d/m/Y') }}</td>
                            <td>{{ $product->room_id }} - {{ $product->room->title }} <br/> <img src="medias/salles/{{ $product->room_id }}.jpg" alt="{{ $product->room->title }}" width="150" /></td>
                            <td>{{ $product->price }} &euro;</td>
                            <td>{{ $product->state }}</td>
                            <td>
                                <a href="#" title="Détails"><i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                                <a href="#" title="Editer"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="#" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
{{--                        {{var_dump($products)}}--}}
                @endif
            </div>
        </div>
    </div>
@stop