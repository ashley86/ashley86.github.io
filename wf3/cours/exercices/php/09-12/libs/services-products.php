<?php

require_once( dirname(__FILE__) . '/../inc/init_session.inc.php');

require_once( dirname(__FILE__) . '/../inc/tools/products.inc.php');

if (isset($_GET['a']) && $_GET['a'] != '')
{
    switch ($_GET['a'])
    {
        case 'add':

            // Ajout dans la BDD
            $new_product_id = product_add($_POST['product-ref'],$_POST['product-label'],$_POST['product-price'],$_POST['product-description'],$_POST['product-stock']);

            if( is_int($new_product_id) && $new_product_id > 0)
            {
                if( ! empty( $_FILES['product-illustration'] ) && $_FILES['product-illustration']['size'] > 0 )
                {
                    $img_name = 'ref-' . $_POST['product-ref'] . get_file_type( $_FILES['product-illustration']['type'] );
                    createImage($new_product_id, $img_name, $_FILES);
                }

                header('Location: ' . SITE_URL . 'products/msg-0/');
                exit;
            } else {
                header('Location: ' . SITE_URL . 'products/err-3/');
                exit;
            }

            break;

        case 'edit':

            if( ! empty( $_POST['product-id'] ) ) {

                // MAJ de la BDD
                product_edit($_POST['product-id'], $_POST['product-ref'], $_POST['product-label'], $_POST['product-price'], htmlentities($_POST['product-description']), $_POST['product-stock']);

                if (!empty($_FILES['product-illustration']) && $_FILES['product-illustration']['size'] > 0) {
                    $img_name = 'ref-' . $_POST['product-ref'] . get_file_type($_FILES['product-illustration']['type']);
                    editImage($_POST['product-id'], $img_name, $_FILES);
                }

                header('Location: ' . SITE_URL . 'products/msg-1/');
                exit;
            } else {
                header('Location: ' . SITE_URL . 'products/err-0/');
                exit;
            }

            break;

        case 'delete':
            $product_id = product_delete($_GET['id']);

            header('Location: ' . SITE_URL . 'products/msg-2/');
            exit;

            break;

        default:
            header('Location: ' . SITE_URL . 'products/err-0/');
            exit;
            break;
    }
}

