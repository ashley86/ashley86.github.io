<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<form class="form-horizontal col-md-4 col-md-offset-4" action="<?php echo SITE_URL; ?>/su/<?php echo ( ! empty( $user_id ) ) ? 'edit' : 'add'; ?>" method="post">
    <?php
    $btn_submit_value = "Ajouter un utilisateur";
    if( ! empty( $user_id ) ){
        echo '<input type="hidden" name="user-id" value="' . $user_id . '" />';
        $btn_submit_value = "Modifier les informations";
    }
    ?>
    <div class="form-group">
        <label for="user-lastname" class="col-sm-4 control-label">Nom</label>
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
            <select name="user-type" id="user-type" class="form-control" <?php echo ( ! empty( $user_id ) ) ? 'disabled="disabled"' : ''; ?>>
                <option value="">Sélectionner un type</option>
                <?php  get_user_types($user_type); ?>
            </select>
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
