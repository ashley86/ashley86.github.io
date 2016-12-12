<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<form class="form-horizontal col-md-4 col-md-offset-4" action="<?php echo SITE_URL; ?>/libs/services-users.php?a=add" method="post">
    <div class="form-group">
        <label for="user-email" class="col-sm-4 control-label">E-mail</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="user-email" name="user-email" placeholder="E-mail" required="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="user-label" class="col-sm-4 control-label">Nom</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="user-label" name="user-label" placeholder="Nom du produit" />
        </div>
    </div>
    <div class="form-group">
        <label for="user-price" class="col-sm-4 control-label">Prénom</label>
        <div class="col-sm-8">
            <div class="input-group">
                <input type="text" name="user-price" class="form-control" id="" placeholder="Prix du produit" />
                <div class="input-group-addon">&euro;</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="user-stock" class="col-sm-4 control-label">Type</label>
        <div class="col-sm-8">
            <input type="text" name="user-stock" class="form-control" id="user-stock" placeholder="Référence du produit" />
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label for="user-description" class="col-sm-4 control-label">Description</label>-->
<!--        <div class="col-sm-8">-->
<!--            <textarea name="user-description" class="form-control" id="user-description" placeholder="Description du produit"></textarea>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="user-illustration" class="col-sm-4 control-label">Illustration</label>-->
<!--        <div class="col-sm-8">-->
<!--            <span class="btn btn-default btn-file">-->
<!--                Parcourir <input type="file" name="user-illustration" class="form-control" id="user-illustration" accept="image/jpeg" />-->
<!--            </span>-->
<!--        </div>-->
<!--    </div>-->
    <div class="text-center">
        <input class="btn btn-info" type="submit" value="Ajouter l'utilisateur" />
    </div>
</form>
