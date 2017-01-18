<form class="form-horizontal col-md-4 col-md-offset-4" action="./index.php?p=movies&a=add&form=true" method="post">
    <div class="form-group <?php echo ($error_title) ? 'has-error' : ''; ?>">
        <label for="movie-title" class="col-sm-4 control-label">Titre</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="movie-title" name="movie-title" placeholder="Titre du film" required="required" value="<?php echo isset( $_POST['movie-title'] ) ? $_POST['movie-title'] : ''; ?>" />
            <?php
                # Si champ erroné
                if($error_title)
                {
                    echo '<span class="help-inline">Le champ doit contenir 5 caractères minimum</span>';
                }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_actors) ? 'has-error' : ''; ?>">
        <label for="movie-actors" class="col-sm-4 control-label">Acteurs</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="movie-actors" name="movie-actors" placeholder="Acteurs du film" value="<?php echo isset( $_POST['movie-actors'] ) ? $_POST['movie-actors'] : ''; ?>" />

            <?php
            if($error_actors)
            {
                echo '<span class="help-inline">Le champ doit contenir 5 caractères minimum</span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_director) ? 'has-error' : ''; ?>">
        <label for="movie-director" class="col-sm-4 control-label">Réalisateur</label>
        <div class="col-sm-8">
            <input type="text" name="movie-director" class="form-control" id="movie-director" placeholder="Réalisateur du film" value="<?php echo isset( $_POST['movie-director'] ) ? $_POST['movie-director'] : ''; ?>" />

            <?php
            if($error_director)
            {
                echo '<span class="help-inline">Le champ doit contenir 5 caractères minimum</span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_producer) ? 'has-error' : ''; ?>">
        <label for="movie-producer" class="col-sm-4 control-label">Producteur</label>
        <div class="col-sm-8">
            <input type="text" name="movie-producer" class="form-control" id="movie-producer" placeholder="Producteur du film" value="<?php echo isset( $_POST['movie-producer'] ) ? $_POST['movie-producer'] : ''; ?>" />


            <?php
            if($error_producer)
            {
                echo '<span class="help-inline">Le champ doit contenir 5 caractères minimum</span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_year) ? 'has-error' : ''; ?>">
        <label for="movie-year" class="col-sm-4 control-label">Année de production</label>
        <div class="col-sm-8">
            <select name="movie-year" id="movie-year" class="form-control">
                <option value="">Sélectionner une année</option>
                <?php
                    $current_year = date('Y', time());
                    for($i = 1900; $i <= $current_year; $i++)
                    {
                        $selected = ( ! empty ( $_POST['movie-year'] ) && $_POST['movie-year'] == $i ) ? 'selected="selected"' : '';
                        echo '<option value="' . $i .'" ' . $selected . '>' . $i . '</option>';
                    }
                ?>
            </select>

            <?php
            if($error_year)
            {
                echo '<span class="help-inline"></span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_language) ? 'has-error' : ''; ?>">
        <label for="movie-language" class="col-sm-4 control-label">Langue</label>
        <div class="col-sm-8">
            <select name="movie-language" id="movie-language" class="form-control">
                <option value="">Sélectionner une langue</option>
                <?php
                    $languages = get_fk_infos('language');
                    foreach($languages as $id => $info)
                    {
                        $selected = ( ! empty ( $_POST['movie-language'] ) && $_POST['movie-language'] == $id ) ? 'selected="selected"' : '';
                        echo '<option value="' . $id .'" ' . $selected . '>' . $info['language_label'] . '</option>';
                    }
                ?>
            </select>

            <?php
            if($error_language)
            {
                echo '<span class="help-inline"></span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_category) ? 'has-error' : ''; ?>">
        <label for="movie-category" class="col-sm-4 control-label">Catégorie</label>
        <div class="col-sm-8">
            <select name="movie-category" id="movie-category" class="form-control">
                <option value="">Sélectionner une catégorie</option>
                <?php
                    $categories = get_fk_infos('category');
                    foreach($categories as $id => $info)
                    {
                        $selected = ( ! empty ( $_POST['movie-category'] ) && $_POST['movie-category'] == $id ) ? 'selected="selected"' : '';
                        echo '<option value="' . $id .'" ' . $selected . '>' . $info['category_label'] . '</option>';
                    }
                ?>
            </select>

            <?php
            if($error_category)
            {
                echo '<span class="help-inline"></span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_storyline) ? 'has-error' : ''; ?>">
        <label for="movie-storyline" class="col-sm-4 control-label">Synopsis</label>
        <div class="col-sm-8">
            <textarea name="movie-storyline" class="form-control" id="movie-storyline" placeholder="Description du film"><?php echo isset( $_POST['movie-storyline'] ) ? $_POST['movie-storyline'] : ''; ?></textarea>

            <?php
            if($error_storyline)
            {
                echo '<span class="help-inline">Le champ doit contenir 5 caractères minimum</span>';
            }
            ?>
        </div>
    </div>
    <div class="form-group <?php echo ($error_video) ? 'has-error' : ''; ?>">
        <label for="movie-video" class="col-sm-4 control-label">Bande-annonce</label>
        <div class="col-sm-8">
            <input type="text" name="movie-video" class="form-control" id="movie-video" placeholder="URL de la bande-annonce du film" value="<?php echo isset( $_POST['movie-video'] ) ? $_POST['movie-video'] : ''; ?>" />

            <?php
            if($error_video)
            {
                echo '<span class="help-inline">Vous devez insérer une URL valide ( http://... )</span>';
            }
            ?>
        </div>
    </div>

    <div class="text-center">
        <input class="btn btn-info" type="submit" value="Ajouter le film" />
    </div>
</form>
