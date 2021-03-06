<?php

    // Selectionne un ou les produits
    function view_products($product_id = false, $show_add_product_btn = false)
    {
        $products = get_products($product_id);

        if($products)
        {
    ?>
        <table class="products">
            <thead>
                <th>Image</th>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Stock</th>
                <?php if( is_admin() ): ?>
                <th>Actions</th>
                <?php endif; ?>
            </thead>
            <tbody>
            <?php
            foreach($products as $product_id => $product)
            {

                echo '<tr>';
                if( ! is_null($product['product_illustration'] ) )
                {
                    $reload_cache = time(); // Force à reload le cache
                    echo    "<td><img src=\"/assets/img/produits/th/{$product['product_illustration']}?t={$reload_cache}\" alt=\"Produits ref {$product['product_ref']}\" /></td>";
                } else {
                    echo    "<td></td>";
                }
                echo    "<td>{$product['product_ref']}</td>";
                echo    "<td>{$product['product_label']}</td>";
                echo    "<td>{$product['product_description']}</td>";
                echo    "<td>{$product['product_price']}</td>";
                echo    "<td>{$product['product_stock']}</td>";
                if( is_admin() ) {
                    echo '<td>' .
                        '<a href="/products/edit/' . $product_id . '/"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' .
                        ' <a href="' . SITE_URL . 'libs/services-products.php?a=delete&id=' . $product_id . '" class="delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' .
                        '</td>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    <?php
        } else {
            $message['type'] = "danger";
            $message['message'] = "Il n'y aucun produit dans la base de données";
        }

        if( $show_add_product_btn )
        {
            echo '<div class="text-center"><a href="/products/add/" class="btn btn-info">Ajouter un produit</a></div>';
        }

        return true;
    }

    // Retour un ou plusieurs produits
    function get_products($product_id = false)
    {
        global $sql_conn;

        $where = ( $product_id ) ? ' WHERE product_id = ' . $product_id : '';
        $sql = "SELECT * FROM products $where";

        $q = mysqli_query($sql_conn, $sql);

        $products = false;

        if( mysqli_num_rows($q) > 0 )
        {
            while ($resp = mysqli_fetch_assoc($q))
            {
                if( $product_id )
                {
                    $products['product_id'] = $resp['product_id'];
                    $products['product_ref'] = $resp['product_ref'];
                    $products['product_label'] = $resp['product_label'];
                    $products['product_description'] = $resp['product_description'];
                    $products['product_price'] = $resp['product_price'];
                    $products['product_stock'] = $resp['product_stock'];
                    $products['product_illustration'] = $resp['product_illustration'];
                } else {
                    $products[$resp['product_id']]['product_id'] = $resp['product_id'];
                    $products[$resp['product_id']]['product_ref'] = $resp['product_ref'];
                    $products[$resp['product_id']]['product_label'] = $resp['product_label'];
                    $products[$resp['product_id']]['product_description'] = $resp['product_description'];
                    $products[$resp['product_id']]['product_price'] = $resp['product_price'];
                    $products[$resp['product_id']]['product_stock'] = $resp['product_stock'];
                    $products[$resp['product_id']]['product_illustration'] = $resp['product_illustration'];
                }
            }
        }

        return $products;
    }


    // Ajoute un produit
    function product_add($ref, $label, $price, $description, $stock)
    {
        global $sql_conn;

        $sql = "INSERT INTO products (product_ref, product_label, product_description, product_price, product_stock) VALUES( '{$ref}', '{$label}', '{$description}', '{$price}', '{$stock}' )";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return mysqli_insert_id($sql_conn);
    }

    function product_set_image($product_id, $img_name)
    {
        global $sql_conn;

        $sql = "UPDATE products SET product_illustration = '$img_name' WHERE product_id = {$product_id}";

        $q = mysqli_query( $sql_conn, $sql );
d($q);
        return $q;
    }


    // Editer un produit
    function product_edit($id, $ref, $label, $price, $description, $stock)
    {
        global $sql_conn;

        $sql = "UPDATE products SET product_ref = '{$ref}', product_label = '{$label}', product_description = '{$description}', product_price = '{$price}', product_stock = '{$stock}' WHERE product_id = '{$id}'";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return true;
    }

    // Supprimer un produit
    function product_delete($id)
    {
        global $sql_conn;

        $sql = "DELETE FROM products WHERE product_id = '{$id}'";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return true;
    }

    // Ajoute une image
    function createImage($product_id, $img_name, $file)
    {
        $dir_img_big = $_SERVER['DOCUMENT_ROOT'] . '/' . PRODUCTS_IMG_DIR;
        $dir_img_th = $_SERVER['DOCUMENT_ROOT'] . '/' . PRODUCTS_IMG_THUMB_DIR;

        if( file_exists($dir_img_big) && is_dir($dir_img_big) && ! file_exists( $dir_img_big . '/' . $img_name ) )
        {
            if( move_uploaded_file($file['product-illustration']['tmp_name'], $dir_img_big . '/' . $img_name ) ) {

                createThumbnail($img_name, 50, 50, $dir_img_big, $dir_img_th);

                product_set_image($product_id, $img_name);

                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Possible file upload attack!\n";
            }

        } else {
            echo 'pb file';
        }
    }

    // Génère une image miniature
    function createThumbnail($image_name,$new_width,$new_height,$uploadDir,$moveToDir)
    {
        $path = $uploadDir . '/' . $image_name;

        $mime = getimagesize($path);

        if($mime['mime']=='image/png'){ $src_img = imagecreatefrompng($path); }
        if($mime['mime']=='image/jpg'){ $src_img = imagecreatefromjpeg($path); }
        if($mime['mime']=='image/jpeg'){ $src_img = imagecreatefromjpeg($path); }
        if($mime['mime']=='image/pjpeg'){ $src_img = imagecreatefromjpeg($path); }

        $old_x          =   imageSX($src_img);
        $old_y          =   imageSY($src_img);

        if($old_x > $old_y)
        {
            $thumb_w    =   $new_width;
            $thumb_h    =   $old_y*($new_height/$old_x);
        }

        if($old_x < $old_y)
        {
            $thumb_w    =   $old_x*($new_width/$old_y);
            $thumb_h    =   $new_height;
        }

        if($old_x == $old_y)
        {
            $thumb_w    =   $new_width;
            $thumb_h    =   $new_height;
        }

        $dst_img        =   ImageCreateTrueColor($thumb_w,$thumb_h);

        if($mime['mime']=='image/png') {
            imagealphablending($dst_img, false);
            imagesavealpha($dst_img, true);
        }

        imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);


        // New save location
        $new_thumb_loc = $moveToDir . '/' . $image_name;

        if($mime['mime']=='image/png'){ $result = imagepng($dst_img,$new_thumb_loc,8); }
        if($mime['mime']=='image/jpg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
        if($mime['mime']=='image/jpeg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
        if($mime['mime']=='image/pjpeg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }

        imagedestroy($dst_img);
        imagedestroy($src_img);

        return $result;
    }

    // Édite une image
    function editImage($product_id, $img_name, $file)
    {
        $dir_img_big = $_SERVER['DOCUMENT_ROOT'] . '/' . PRODUCTS_IMG_DIR;
        $dir_img_th = $_SERVER['DOCUMENT_ROOT'] . '/' . PRODUCTS_IMG_THUMB_DIR;

        // Suppresion du fichier BIG
        if( file_exists($dir_img_big .'/'. $img_name) ) {
            unlink($dir_img_big .'/'. $img_name);
        }

        // Suppresion du fichier miniature
        if( file_exists($dir_img_th .'/'. $img_name) ) {
            unlink($dir_img_th .'/'. $img_name);
        }
//        d($dir_img_big .'/'. $img_name);
//        d($dir_img_th .'/'. $img_name);

        // Ajout de la nouvelle image
        createImage($product_id, $img_name, $file);
    }

    // Retourne l'extension du fichier
    function get_file_type($file)
    {
        $authorized_image_type = ['jpg', 'jpeg', 'png'];

        $file_type = preg_split('/\//',$_FILES['product-illustration']['type'])[1];

        return ( ! in_array( $file_type, $authorized_image_type ) ) ? '.jpg' : '.' . $file_type;
    }