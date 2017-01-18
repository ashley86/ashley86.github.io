<?php

    require_once(dirname(__FILE__) . '/../inc/init_session.inc.php');
    require_once(dirname(__FILE__) . '/../inc/tools/orders.inc.php');

    if (isset($_GET['a']) && $_GET['a'] != '')
    {
        switch($_GET['a'])
        {
            # Ajoute un utilisateur
            case 'add':
                if( ! empty($_POST['user-firstname']) && ! empty($_POST['user-lastname']) && ! empty($_POST['user-email']) && ! empty($_POST['user-type']) && ! empty($_POST['user-password']) )
                {
                    $user_firstname = $_POST['user-firstname'];
                    $user_lastname = $_POST['user-lastname'];
                    $user_email = $_POST['user-email'];
                    $user_type = $_POST['user-type'];
                    $user_password = $_POST['user-password'];
                    $new_user_id = user_add( $user_firstname, $user_lastname, $user_email, $user_type, $user_password);

                    if( is_int($new_user_id) )
                    {
                        header('Location: ' . SITE_URL . 'users/edit/' . $new_user_id . '/msg-4/');
                        exit;
                    } else {
                        header('Location: ' . SITE_URL . 'users/msg-0/');
                        exit;
                    }
                }
                break;

            # Edite les informations d'un utilisateur
            case 'edit':

                if( ! empty($_POST['user-id']) && ! empty($_POST['user-firstname']) && ! empty($_POST['user-lastname']) && ! empty($_POST['user-email'])  )
                {
                    $user_id = (int) $_POST['user-id'];
                    $user_firstname = $_POST['user-firstname'];
                    $user_lastname = $_POST['user-lastname'];
                    $user_email = $_POST['user-email'];
                    $user_type = ( ! empty($_POST['user-type']) ) ? $_POST['user-type'] : null ;

                    if( user_edit($user_id, $user_firstname, $user_lastname, $user_email, $user_type) )
                    {
                        if( $_SESSION['user_id'] === $user_id )
                        {
                            $_SESSION['user_firstname'] = $user_firstname;
                            $_SESSION['user_lastname'] = $user_lastname;
                            $_SESSION['user_email'] = $resp_conn['user_email'];

                            header('Location: ' . SITE_URL . 'users/msg-3/');
                            exit;
                        }

                        header('Location: ' . SITE_URL . 'users/list/msg-3/');
                        exit;
                    } else {
                        header('Location: ' . SITE_URL . 'users/msg-0/');
                        exit;
                    }
                } else {
                    header('Location: ' . SITE_URL . 'users/list/err-0/');
                    exit;
                }
                break;

            case 'delete':

                if( ! empty( $_GET['id'] ) )
                {
                    $user_id = (int) $_GET['id'];
                    if( user_delete( $user_id ) )
                    {
                        header('Location: ' . SITE_URL . 'users/list/msg-5/');
                        exit;
                    } else {
                        header('Location: ' . SITE_URL . 'users/msg-0/');
                        exit;
                    }
                }

                break;

            # L'utilisateur ne sait pas ce qu'il veut... Nous non plus !
            default:
                # Redirection vers la home
                header('Location: ' . SITE_URL . 'err-0/');
                exit;
            break;
        }
    } else {
        # Redirection vers la home
        header('Location: ' . SITE_URL . '?err=0');
        exit;
    }