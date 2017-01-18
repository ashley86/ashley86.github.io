<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<form class="form-horizontal col-md-4 col-md-offset-4" action="<?php echo SITE_URL; ?>/so/<?php echo ( ! empty( $user_id ) ) ? 'edit' : 'add'; ?>" method="post">
    <?php
    $btn_submit_value = "Ajouter une commande";
    if( ! empty( $user_id ) ){
        echo '<input type="hidden" name="order-id" value="' . $user_id . '" />';
        $btn_submit_value = "Modifier une commande";
    }
    ?>

    Produits | Quantité | Prix U. HT | Prix U. TTC
    Prix Total HT
    Prix Total TTC
    Livraison Offert





    <div class="form-group">
        <label for="user-lastname" class="col-sm-4 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="user-lastname" name="user-lastname" placeholder="Nom" <?php echo ( ! empty( $user_lastname ) ) ? 'value="' . $user_lastname . '"': ''; ?> />
        </div>
    </div>
    <div class="form-group">
        <label for="user-firstname" class="col-sm-4 control-label">Prénom</label>
        <div class="col-sm-8">
            <input type="text" name="user-firstname" class="form-control" id="user-firstname" placeholder="Prénom" <?php echo ( ! empty( $user_firstname ) ) ? 'value="' . $user_firstname . '"': ''; ?> />
        </div>
    </div>
    <div class="form-group">
        <label for="user-email" class="col-sm-4 control-label">E-mail</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="user-email" name="user-email" placeholder="E-mail" required="required" <?php echo ( ! empty( $user_email ) ) ? 'value="' . $user_email . '"': ''; ?> />
        </div>
    </div>
    <div class="form-group">
        <label for="user-type" class="col-sm-4 control-label">Type</label>
        <div class="col-sm-8">
            <?php
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
            };
            ?>
            <select name="user-type" id="user-type" class="form-control" <?php echo ( ! empty( $user_id ) ) ? 'disabled="disabled"' : ''; ?>>
                <option value="">Sélectionner un type</option>
                <?php  get_user_types($user_type); ?>
            </select>
<!--            <input type="text" name="user-type" class="form-control" id="user-type" placeholder="admin, reader" --><?php //echo ( ! empty( $user_type ) ) ? 'value="' . $user_type . '"': ''; ?><!-- />-->
        </div>
    </div>
    <?php if( ! isset( $user_type ) ): ?>
        <div class="form-group">
            <label for="user-password" class="col-sm-4 control-label">Mot de passe</label>
            <div class="col-sm-8">
                <input type="text" name="user-password" class="form-control" id="user-password" placeholder="mot de passe" />
            </div>
        </div>
    <?php endif; ?>
    <div class="text-center">
        <?php ?>
        <input class="btn btn-info" type="submit" value="<?php echo $btn_submit_value; ?>" />
    </div>
</form>
