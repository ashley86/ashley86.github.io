<?php
    # Le fichier doit être inclus
    if( ! session_id() ) exit;

    require_once( './inc/tools/products.inc.php');

    if( empty($_GET['id']) )
    {
        header('Location: ' . SITE_URL . '?p=products&err=0');
        exit;
    }

    $product_id = (int) $_GET['id'];

    $product = get_products($product_id);

    if( ! $product_id )
    {
        header('Location: ' . SITE_URL . '/?p=produits&err=0');
        exit;
    }

?>
<form class="form-horizontal col-md-4 col-md-offset-4" action="<?php echo SITE_URL; ?>/libs/services-products.php?a=edit" method="post" enctype="multipart/form-data">
<?php
    if (isset($product_id)) {
        echo '<input type="hidden" name="product-id" value="' . $product_id . '">';
    }
?>
    <div class="form-group">
        <label for="product-ref" class="col-sm-4 control-label">Référence</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="product-ref" name="product-ref" placeholder="Référence du produit" required="required" readonly="readonly" value="<?php if (isset($product)) echo $product['product_ref']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="product-label" class="col-sm-4 control-label">Nom</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="product-label" name="product-label" placeholder="Nom du produit" value="<?php if (isset($product)) echo $product['product_label']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="product-price" class="col-sm-4 control-label">Prix</label>
        <div class="col-sm-8">
            <div class="input-group">
                <input type="text" name="product-price" class="form-control" id="" placeholder="Prix du produit" value="<?php if (isset($product)) echo $product['product_price']; ?>" />
                <div class="input-group-addon">&euro;</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="product-stock" class="col-sm-4 control-label">Stock</label>
        <div class="col-sm-8">
            <input type="text" name="product-stock" class="form-control" id="product-stock" placeholder="Référence du produit" value="<?php if (isset($product)) echo $product['product_stock']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="product-description" class="col-sm-4 control-label">Description</label>
        <div class="col-sm-8">
            <textarea name="product-description" class="form-control" id="product-description" placeholder="Description du produit"><?php if (isset($product)) echo $product['product_description']; ?></textarea>
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
        <input class="btn btn-info" type="submit" value="Éditer le produit" />
    </div>
</form>
