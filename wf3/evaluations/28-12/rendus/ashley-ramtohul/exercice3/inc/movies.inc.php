<?php

require_once './inc/tools.inc.php';

$include_path = './inc/tpl/movies.tpl.php';

if( ! empty($_GET['a']) )
{
    $action = htmlentities(trim( $_GET['a'] ));

    switch($action)
    {
        # Ajout d'un fichier
        case 'add':
            $total_errors = $error_title = $error_actors = $error_director = $error_producer = $error_year = $error_language = $error_category = $error_storyline = $error_video = false;

            # Vérification des données du formulaire
            if( isset($_GET['form']) && $_GET['form'] == 'true' )
            {
                if( empty( $_POST['movie-title'] ) || strlen( $_POST['movie-title'] ) < 5 )
                {
                    $error_title = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-actors'] ) || strlen( trim( $_POST['movie-actors'] ) ) < 5 )
                {
                    $error_actors = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-director'] ) || strlen( trim( $_POST['movie-director'] ) ) < 5 )
                {
                    $error_director = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-producer'] ) || strlen( trim( $_POST['movie-producer'] ) ) < 5 )
                {
                    $error_producer = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-year'] ) )
                {
                    $error_year = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-language'] ) )
                {
                    $error_language = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-category'] ) )
                {
                    $error_category = true;
                    $total_errors = true;
                }

                if( empty( $_POST['movie-storyline'] ) || strlen( trim( $_POST['movie-storyline'] ) ) < 5 )
                {
                    $error_storyline = true;

                    $total_errors = true;
                }

                if( empty( $_POST['movie-video'] ) || ! filter_var( $_POST['movie-video'], FILTER_VALIDATE_URL) )
                {
                    $error_video = true;
                    $total_errors = true;
                }

                if( ! $total_errors )
                {
                    $success_add = add_movie( $_POST['movie-title'], $_POST['movie-actors'], $_POST['movie-director'], $_POST['movie-producer'], $_POST['movie-year'], $_POST['movie-language'], $_POST['movie-category'], $_POST['movie-storyline'], $_POST['movie-video'] );

                    if( $success_add )
                    {
                        unset($_POST);
                        $message['message'] = 'Le film a bien été ajouté';
                        $message['type'] = 'success';
                    } else {
                        $message['message'] = 'Une erreur est survenue';
                        $message['type'] = 'danger';
                    }
                }


            }

            # Inclusion du formulaire HTML
            $include_path = './inc/tpl/movies-add.tpl.php';
            break;

        case 'details':
            # L'id doit être spécifié
            if( empty( $_GET['id'] ) )
            {
                header('Location: index.php?p=movies&err=0');
                exit;
            }

            $movie_id = (int) $_GET['id'];

            $include_path = './inc/tpl/movies-details.tpl.php';

            break;

        default:
            $include_path = $include_path;
            break;
    }
}

include $include_path;