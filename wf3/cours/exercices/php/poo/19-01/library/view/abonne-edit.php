<?php
    require 'layout/top.php';
?>
<?php
    if( ! isset( $_GET['id'] ) )
    {
?>
        <h2>Éditer un abonné</h2>
<?php
    } else {
?>
        <h2>Éditer un abonné</h2>
<?php
    }
?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <?php
        var_dump( $abonne->getId() );
            if( isset( $success_msg ) ) {
                ?>
                <p class="alert alert-success">
                    <strong>Félicitations !</strong> <?=$success_msg ?> <br />
                    <a href="<?=ABS_PATH ?>abonne.php">Retour à la liste des abonnés</a>
                </p>
                <?php
            }
        ?>
        <form action="<?=ABS_PATH ?>abonne-edit.php" method="post" class="form-horizontal">
            <?php if( ! is_null( $abonne->getId() ) ){ ?>
                <input type="hidden" name="id" value="<?=$abonne->getId() ?>">
            <?php } ?>
            <div class="form-group<?php echo isset( $errors['nom'] ) ? ' has-error' : ''; ?>">
                <label for="nom" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?=$abonne->getNom() ?>" />
                    <?php
                        if( isset( $errors['nom'] ) ) {
                            ?>
                            <span class="help-block"><?= $errors['nom'] ?></span>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="prenom" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10<?php echo isset( $errors['prenom'] ) ? ' has-error' : ''; ?>">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?=$abonne->getPrenom() ?>" />
                    <?php
                    if( isset( $errors['prenom'] ) ) {
                        ?>
                        <span class="help-block"><?= $errors['prenom'] ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <button type="reset" class="btn btn-default btn-md btn-block pull-left">Annuler</button>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-md btn-block pull-right">Editer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    require 'layout/bottom.php';
?>