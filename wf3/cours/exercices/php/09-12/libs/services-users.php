<?php

    require_once(dirname(__FILE__) . '/../inc/init_session.inc.php');

    # Verification des identifiants
    function verifConnect($login, $password)
    {
        global $sql_conn;

        // Requête SQL pour tester l'utilisateur qui essaie de se connecter est connu ET est de type admin
        $sql = "SELECT * FROM users WHERE user_email = '" . $login . "' AND user_password = '" . $password . "'";// AND user_type = 'admin'";

        $q = mysqli_query( $sql_conn, $sql ) or die( mysqli_error($sql_conn) ) ;

        if(mysqli_num_rows($q) === 1) {
            while ($resp = mysqli_fetch_assoc($q))
            {
                return $resp;
            }
        } else {
            return false;
        }
    }

    if (isset($_GET['a']) && $_GET['a'] != '')
    {
        switch($_GET['a'])
        {
            # L'utilisateur veut se connecter
            case 'login':

                # Si les champs n'ont pas été remplis
                if( empty($_POST['user-email']) || empty($_POST['user-pwd']) )
                {
                    # Redirection vers la home
                    header('Location: ' . SITE_URL . '?err=1');
                    exit;
                }

                # Parsing des identifiants
                $login = htmlentities(trim($_POST['user-email']));
                $pwd = md5(htmlentities(trim($_POST['user-pwd'])));

                # On vérifie les identifiants
                $resp_conn = verifConnect($login,$pwd);

                # Si la connexion à échoué
                if( $resp_conn === false )
                {
                    # Redirection vers la home
                    header('Location: ' . SITE_URL . '?err=2');
                    exit;
                }

                # Si on n'est pas redirigé, on connecte l'utilisateur
                $_SESSION['connected'] = true;
                $_SESSION['user_email'] = $resp_conn['user_email'];
                $_SESSION['user_firstname'] = $resp_conn['user_firstname'];
                $_SESSION['user_lastname'] = $resp_conn['user_lastname'];
                $_SESSION['user_type'] = $resp_conn['user_type'];

                # Redirection vers la home
                header('Location: ' . SITE_URL . '?conn=1');
                exit;

            break;

            # L'utilisateur veut se déconnecter
            case 'disconnect':

                # On détruit la session, ce qui aura
                # pour conséquence de supprimer toutes les variables de session
                # et donc de nous déconnecter
                session_destroy();

                # Redirection vers la home
                header('Location: ' . SITE_URL . '?conn=0');
                exit;

            break;

            # L'utilisateur ne sait pas ce qu'il veut... Nous non plus !
            default:
                # Redirection vers la home
                header('Location: index.php');
                exit;
            break;
        }
    } else {
        # Redirection vers la home
        header('Location: ' . SITE_URL . '?err=0');
        exit;
    }