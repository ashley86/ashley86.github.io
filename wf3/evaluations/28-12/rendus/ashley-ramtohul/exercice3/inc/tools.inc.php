<?php

    # dump...
    function d($msg, $exit = false){
        echo '<pre>';
        var_dump($msg);
        echo '</pre>';
        if($exit) exit;
    }

    # Liste les films
    function get_movies($movie_id = null)
    {
        global $sql_conn;
        $movies = [];

        $where = ( $movie_id ) ? ' WHERE movie_id = ' . $movie_id : '';
        $sql = "SELECT * FROM movies $where";
        $q = mysqli_query($sql_conn, $sql);

        if( mysqli_num_rows($q) > 0 )
        {
            while ($resp = mysqli_fetch_assoc($q))
            {
                if( $movie_id )
                {
                    $movies['movie_id']             = $resp['movie_id']             ;
                    $movies['movie_title']          = $resp['movie_title']          ;
                    $movies['movie_actors']         = $resp['movie_actors']         ;
                    $movies['movie_director']       = $resp['movie_director']       ;
                    $movies['movie_producer']       = $resp['movie_producer']       ;
                    $movies['movie_year_of_prod']   = $resp['movie_year_of_prod']   ;
                    $movies['movie_language']       = $resp['movie_language']       ;
                    $movies['movie_category']       = $resp['movie_category']       ;
                    $movies['movie_storyline']      = $resp['movie_storyline']      ;
                    $movies['movie_video']          = $resp['movie_video']          ;
                } else {
                    $movies[ $resp['movie_id'] ]['movie_id']            = $resp['movie_id']             ;
                    $movies[ $resp['movie_id'] ]['movie_title']         = $resp['movie_title']          ;
                    $movies[ $resp['movie_id'] ]['movie_actors']        = $resp['movie_actors']         ;
                    $movies[ $resp['movie_id'] ]['movie_director']      = $resp['movie_director']       ;
                    $movies[ $resp['movie_id'] ]['movie_producer']      = $resp['movie_producer']       ;
                    $movies[ $resp['movie_id'] ]['movie_year_of_prod']  = $resp['movie_year_of_prod']   ;
                    $movies[ $resp['movie_id'] ]['movie_language']      = $resp['movie_language']       ;
                    $movies[ $resp['movie_id'] ]['movie_category']      = $resp['movie_category']       ;
                    $movies[ $resp['movie_id'] ]['movie_storyline']     = $resp['movie_storyline']      ;
                    $movies[ $resp['movie_id'] ]['movie_video']         = $resp['movie_video']          ;
                }
            }
        }
        
        return $movies;
    }

    # Liste les catégories
    function get_fk_infos($fk_table, $fk_id = null)
    {
        $tables_allowed = ['category', 'producer', 'language'];

        if( ! in_array( $fk_table, $tables_allowed ) )
        {
            return false;
        } else {
            switch( $fk_table )
            {
                case 'category':
                    $table_name = 'categories';
                    $prefix_field_name = 'category';
                    break;

                case 'language':
                    $table_name = 'languages';
                    $prefix_field_name = 'language';
                    break;

                case 'producer':
                    $table_name = 'producers';
                    $prefix_field_name = 'producer';
                    break;

                default:
                    break;
            }
        }

        global $sql_conn;
        $results = [];

        $where = ( $fk_id ) ? " WHERE {$prefix_field_name}_id = " . $fk_id : '';
        $sql = "SELECT * FROM {$table_name} $where";
        $q = mysqli_query($sql_conn, $sql);

        if( mysqli_num_rows($q) > 0 )
        {
            while ($resp = mysqli_fetch_assoc($q))
            {
                if( $fk_id )
                {
                    $results[$prefix_field_name . '_id']             = $resp[$prefix_field_name . '_id']             ;
                    $results[$prefix_field_name . '_label']          = $resp[$prefix_field_name . '_label']          ;
                } else {
                    $results[ $resp[$prefix_field_name . '_id'] ][$prefix_field_name . '_id']            = $resp[$prefix_field_name . '_id']             ;
                    $results[ $resp[$prefix_field_name . '_id'] ][$prefix_field_name . '_label']         = $resp[$prefix_field_name . '_label']          ;
                }
            }
        }

        return $results;
    }

    # Ajoute un film en BDD
    function add_movie( $title, $actors, $director, $producer, $year, $language, $category, $storyline, $video )
    {
        global $sql_conn;

        # Néttoie les données
        $title = htmlentities( trim( $title ) );
        $actors = htmlentities( trim( $actors ) );
        $director = htmlentities( trim( $director ) );
        $producer = htmlentities( trim( $producer ) );
        $year = htmlentities( trim( $year ) );
        $language = htmlentities( trim( $language ) );
        $category = htmlentities( trim( $category ) );
        $storyline = htmlentities( trim( $storyline ) );
        $video = htmlentities( trim( $video ) );

        $sql = "INSERT INTO movies (movie_title, movie_actors, movie_director, movie_producer, movie_year_of_prod, movie_language, movie_category, movie_storyline, movie_video) VALUES( '" . $title . "', '" . $actors . "', '" . $director . "', '" . $producer . "', '" . $year . "', '" . $language . "', '" . $category . "', '" . $storyline . "', '" . $video . "' )";

        # Retourne TRUE ou FALSE selon la réussite de la requête
        return mysqli_query( $sql_conn, $sql );

    }