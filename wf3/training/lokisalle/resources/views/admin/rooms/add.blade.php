@extends( 'layout' )

@section('title')
    Ajouter une salle
@stop

@section('breadcrumb')
    <li><i class="fa fa-dashboard"></i> <a href="{{ route('admin::home') }}">Dashboard</a></li>
    <li><a href="{{ route('admin::rooms::home') }}">Salles</a></li>
    <li class="active">Ajouter</li>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            @if( Session::has('success') )
                <p class="bg-success text-center" style="padding: 10px;">
                    {{ Session::get('success') }}<br />
                    <a href="{{ route( 'admin::rooms::home' ) }}">Retour à la liste des salles</a>
                </p>
            @endif


            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <?php if( isset( $room ) ): ?>
                <div class="form-group">
                    <label for="id" class="col-sm-4 control-label">ID :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id" id="id" value="{{ old( 'id' ) }}" placeholder="identifiant" readonly="readonly" />
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Titre :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" id="title" value="{{ old( 'title' ) }}" placeholder="Titre" />
                        <?php if( $errors->has('title') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('title') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="description" id="description" placeholder="description">{{ old( 'description' ) }}</textarea>
                        <?php if( $errors->has('description') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('description') as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pic" class="col-sm-4 control-label">Photo :</label>
                    <div class="col-sm-8">
                        <input type="file" name="pic" id="pic" />
                        <?php if( $errors->has('pic') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('pic') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="country" class="col-sm-4 control-label">Pays :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="country" id="country" value="{{ old( 'country' ) }}" placeholder="Pays" />
                        <?php if( $errors->has('country') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('country') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="city" class="col-sm-4 control-label">Ville :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="city" id="city" value="{{ old( 'city' ) }}" placeholder="Ville" />
                        <?php if( $errors->has('city') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('city') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-4 control-label">Adresse :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" id="address" value="{{ old( 'address' ) }}" placeholder="Adresse" />
                        <?php if( $errors->has('address') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('address') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="postal_code" class="col-sm-4 control-label">Code postal :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old( 'postal_code' ) }}" placeholder="Code postal" />
                        <?php if( $errors->has('postal_code') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('postal_code') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="capacity" class="col-sm-4 control-label">Capacité :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="capacity" id="capacity" value="{{ old( 'capacity' ) }}" placeholder="Capacité" />
                        <?php if( $errors->has('capacity') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('capacity') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="col-sm-4 control-label">Catégorie  :</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="category" id="category">
                            <option value="">Sélectionner une catégorie</option>
                            <option <?= ( old( 'category' ) == 'bureau' ) ? 'selected="selected"' : ''; ?> value="bureau">Bureau</option>
                            <option <?= ( old( 'category' ) == 'reunion' ) ? 'selected="selected"' : ''; ?> value="reunion">Réunion</option>
                            <option <?= ( old( 'category' ) == 'formation' ) ? 'selected="selected"' : ''; ?> value="formation">Formation</option>
                        </select>
                        <?php if( $errors->has('category') ): ?>
                            <ul class="bg-danger">
                                <?php foreach( $errors->get('category') as $error): ?>
                                <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <input type="submit" value="Ajouter" class="btn btn-block btn-primary" />
            </form>
        </div>
    </div>
@stop

