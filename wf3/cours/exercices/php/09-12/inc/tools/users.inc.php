<?php

    // Affiche le profil de l'utilisateur courant
    function view_my_profile()
    {

    }

    // Selectionne un ou les produits
    function view_users($user_id = false)
    {
        $users = get_users($user_id);

        if($users)
        {
?>
        <table>
            <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th>Type</th>
            <?php if( is_admin() ): ?>
            <th>Actions</th>
            <?php endif; ?>
            </thead>
            <tbody>
            <?php
            foreach($users as $user_id => $user)
            {

                echo '<tr>';
                echo    "<td>{$user['user_lastname']}</td>";
                echo    "<td>{$user['user_firstname']}</td>";
                echo    "<td>{$user['user_email']}</td>";
                echo    "<td>{$user['user_type']}</td>";
                if( is_admin() ) {
                    echo '<td>' .
                        '<a href="index.php?p=users&a=edit&id=' . $user_id . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' .
                        ' <a href="' . SITE_URL . 'libs/services-users.php?a=delete&id=' . $user_id . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' .
                        '</td>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
<?php
        }

    return true;
    }

    // Retour un ou plusieurs produits
    function get_users($user_id = false)
    {
        global $sql_conn;

        $where = ( $user_id ) ? ' WHERE product_id = ' . $user_id : '';
        $sql = "SELECT * FROM users $where";

        $q = mysqli_query($sql_conn, $sql);

        $users = false;

        if( mysqli_num_rows($q) > 0 )
        {
            while ($resp = mysqli_fetch_assoc($q))
            {
                if( $users )
                {
                    $users['user_id'] = $resp['user_id'];
                    $users['user_firstname'] = $resp['user_firstname'];
                    $users['user_lastname'] = $resp['user_lastname'];
                    $users['user_type'] = $resp['user_type'];
                } else {
                    $users[$resp['user_id']]['user_id'] = $resp['user_id'];
                    $users[$resp['user_id']]['user_firstname'] = $resp['user_firstname'];
                    $users[$resp['user_id']]['user_lastname'] = $resp['user_lastname'];
                    $users[$resp['user_id']]['user_type'] = $resp['user_type'];
                }
            }
        }

        return $users;
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
            echo 'dfsfds';
            unlink($dir_img_big .'/'. $img_name);
        }

        // Suppresion du fichier miniature
        if( file_exists($dir_img_th .'/'. $img_name) ) {
            echo 'pouet';
            unlink($dir_img_th .'/'. $img_name);
        }
        d($dir_img_big .'/'. $img_name);
        d($dir_img_th .'/'. $img_name);

        // Ajout de la nouvelle image
        createImage($product_id, $img_name, $file);

    }
