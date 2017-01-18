<?php


    // Verification des identifiants
    function verifConnect($login, $password)
    {
        global $sql_conn;

        // Requête SQL pour tester l'utilisateur qui essaie de se connecter est connu ET est de type admin
        $sql = "SELECT * FROM users WHERE user_email = '" . $login . "'";

        $q = mysqli_query( $sql_conn, $sql ) or die( mysqli_error($sql_conn) ) ;

        if(mysqli_num_rows($q) === 1) {
            while ($resp = mysqli_fetch_assoc($q))
            {
                if( password_verify($password, $resp['user_password']) ) {
                    return $resp;
                } else return false;
            }
        } else {
            return false;
        }
    }

    // Affiche le profil de l'utilisateur courant
    function view_profile($user_id = false)
    {
        global $sql_conn;

        $user_id = ( ! $user_id ) ? $_SESSION['user_id'] : $user_id;

        $sql = 'SELECT * FROM users WHERE user_id = ' . $user_id;

        $q = mysqli_query($sql_conn, $sql);

        if( mysqli_num_rows($q) === 1 ) {

            $r = mysqli_fetch_all($q, MYSQLI_ASSOC);
           // extract($r[0]);
            return $r[0];
        }
    }

    // Selectionne un ou les produits
    function view_users($user_id = false)
    {
        $users = get_users($user_id);

        if($users)
        {
?>
        <table class="users">
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
                        '<a href="/users/edit/' . $user_id . '/"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' .
                        ' <a href="' . SITE_URL . 'libs/services-users.php?a=delete&id=' . $user_id . '" class="delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' .
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
                $users[$resp['user_id']]['user_id'] = $resp['user_id'];
                $users[$resp['user_id']]['user_firstname'] = $resp['user_firstname'];
                $users[$resp['user_id']]['user_lastname'] = $resp['user_lastname'];
                $users[$resp['user_id']]['user_email'] = $resp['user_email'];
                $users[$resp['user_id']]['user_type'] = $resp['user_type'];
            }
        }

        return $users;
    }


    // Ajoute un utilisateur
    function user_add($user_firstname, $user_lastname, $user_email, $user_type, $user_pwd)
    {
        global $sql_conn;

        $user_firstname = mysqli_real_escape_string( $sql_conn, htmlentities( $user_firstname ) );
        $user_lastname = mysqli_real_escape_string( $sql_conn, htmlentities( $user_lastname ) );
        $user_email = mysqli_real_escape_string( $sql_conn, htmlentities( $user_email ) );
        $user_type = mysqli_real_escape_string( $sql_conn, htmlentities( $user_type ) );
        $user_pwd = password_hash( $user_pwd, PASSWORD_BCRYPT );

        $sql = "INSERT INTO users (user_firstname, user_lastname, user_email, user_type, user_password) VALUES('" . $user_firstname . "', '" . $user_lastname . "', '" . $user_email . "', '" . $user_type . "', '" . $user_pwd . "')";

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
    function user_edit($user_id, $user_firstname, $user_lastname, $user_email, $user_type)
    {
        global $sql_conn;

        $user_id = mysqli_real_escape_string( $sql_conn, htmlentities( $user_id ) );
        $user_firstname = mysqli_real_escape_string( $sql_conn, htmlentities( $user_firstname ) );
        $user_lastname = mysqli_real_escape_string( $sql_conn, htmlentities( $user_lastname ) );
        $user_email = mysqli_real_escape_string( $sql_conn, htmlentities( $user_email ) );
        $user_type = ( ! is_null( $user_type ) ) ? mysqli_real_escape_string( $sql_conn, htmlentities( $user_type ) ) : null;

        $sql_user_type = ( ! is_null( $user_type ) ) ? ", user_type = '" . $user_type . "'" : '';

        $sql = "UPDATE users SET user_firstname = '" . $user_firstname . "', user_lastname = '" . $user_lastname . "', user_email = '" . $user_email . "'" . $sql_user_type . " WHERE user_id = " . $user_id;

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return true;
    }

    // Supprimer un produit
    function user_delete($id)
    {
        global $sql_conn;

        $sql = "DELETE FROM users WHERE user_id = '{$id}'";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return true;
    }


    # Retourne les types d'utilisateurs
    function get_user_types($user_type = false)
    {
        global $sql_conn;

        $q = mysqli_query($sql_conn, "SHOW COLUMNS FROM users WHERE Field = 'user_type'");
        $resp = mysqli_fetch_all($q);

        foreach($resp[0] as $r)
        {
            if(strpos($r, 'enum') !== FALSE)
            {
                preg_match("/^enum\(\'(.*)\'\)$/", $r, $matches);
                $enum = preg_split("/','/", $matches[1]);

                foreach($enum as $elt)
                {
                    $selected = ( $user_type !== FALSE && $user_type === $elt ) ? 'selected="selected"' : '';
                    echo '<option value="' . $elt . '" ' . $selected . '>' . ucfirst($elt) . '</option>';
                }

                break;
            }
        }
    }