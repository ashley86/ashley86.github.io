<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<form class="form-horizontal col-md-4 col-md-offset-4" action="<?php echo SITE_URL; ?>/libs/services-products.php?a=add" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product-ref" class="col-sm-4 control-label">Référence</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="product-ref" name="product-ref" placeholder="Référence du produit" required="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="product-label" class="col-sm-4 control-label">Nom</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="product-label" name="product-label" placeholder="Nom du produit" />
        </div>
    </div>



    <div class="form-group">
        <label for="product-price" class="col-sm-4 control-label">Prix</label>
        <div class="col-sm-8">
            <div class="input-group">
                <input type="text" name="product-price" class="form-control" id="" placeholder="Prix du produit" />
                <div class="input-group-addon">&euro;</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="product-stock" class="col-sm-4 control-label">Stock</label>
        <div class="col-sm-8">
            <input type="text" name="product-stock" class="form-control" id="product-stock" placeholder="Référence du produit" />
        </div>
    </div>
    <div class="form-group">
        <label for="product-description" class="col-sm-4 control-label">Description</label>
        <div class="col-sm-8">
            <textarea name="product-description" class="form-control" id="product-description" placeholder="Description du produit"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="product-illustration" class="col-sm-4 control-label">Illustration</label>
        <div class="col-sm-8">
            <span class="btn btn-default btn-file">
                Parcourir <input type="file" name="product-illustration" class="form-control" id="product-illustration" accept="image/jpeg" />
            </span>
        </div>
    </div>
    <div class="text-center">
        <input class="btn btn-info" type="submit" value="Ajouter le produit" />
    </div>
</form>
