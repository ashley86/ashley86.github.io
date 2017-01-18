<?php

if( isset($_GET['err']) || isset($_GET['conn']) || isset($_GET['msg']) )
{
    $message = [];

    if( isset($_GET['err']) )
    {
        $message['type'] = 'danger';

        switch($_GET['err'])
        {
            case '0':
                $message['message'] = 'Une erreur est survenue';
            break;

            case '1':
                $message['message'] = 'Veuillez insérer des identifiants';
            break;

            case '2':
                $message['message'] = 'Les identifiants sont incorrects';
            break;

            case '3':
                $message['message'] = 'Une erreur est survenue lors de l\'ajout du produit';
            break;

            default:
                $message['message'] = '';
            break;
        }
    }
    else
    {
        $message['type'] = 'success';

        if(isset($_GET['conn'])) {
            $message['message'] = ($_GET['conn'] === '1') ? 'Vous connecté !' : (($_GET['conn'] === '0') ? 'Vous avez été déconnecté !' : '');
        } else {
            switch($_GET['msg'])
            {
                case '0':
                    $message['message'] = 'Le produit à bien été ajouté !';
                    $message['message'] .= ' <a href="' . SITE_URL . 'products/add/">Ajouter un nouveau produit</a>';
                    break;

                case '1':
                    $message['message'] = 'Le produit a bien été modifié !';
                    break;

                case '2':
                    $message['message'] = 'Le produit a bien été supprimé !';
                    break;

                case '3':
                    $message['message'] = "L'utilisateur a bien été modifié";
                    break;

                case '4':
                    $message['message'] = "L'utilisateur a bien été ajouté";
                    break;

                case '5':
                    $message['message'] = "L'utilisateur a bien été supprimé";
                    break;

                case '6':
                    $message['message'] = "Cet utilisateur n'existe pas";
                    break;

                default:
                    $message['message'] = '';
                    break;
            }
        }
    }
}

if( ! empty($message['message']) ) {
    ?>
    <div id="box-error">
        <div class="alert alert-<?php echo $message['type']; ?> text-center">
            <strong><?php echo $message['message']; ?></strong>
        </div>
    </div>
    <?php
}