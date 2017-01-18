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
                            <td>{{ $product->id_product }}</td>
                            <td>{{ Carbon\Carbon::parse($product->date_arrivee)->format('d/m/Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($product->date_depart)->format('d/m/Y') }}</td>
                            <td>{{ $product->id_room }} - Salle cézanne <br/> <img src="images/{{ $product->id_room }}.jpg" alt="Salle Cézanne" /></td>
                            <td>{{ $product->prix }} &euro;</td>
                            <td>{{ $product->etat }}</td>
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
                        {{var_dump($products)}}
                @endif
            </div>
        </div>
    </div>
@stop