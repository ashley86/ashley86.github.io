<?php
    # Le fichier doit être inclus
    if( ! session_id() ) exit;
?>
<div class="col-md-4 col-md-offset-4">

    <h2 class="text-center">Connexion</h2>


    <form class="form-horizontal" action="<?php echo SITE_URL ?>su/login/" method="post">
        <div class="form-group">
            <label for="user-email" class="col-sm-4 control-label">Login</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="user-email" name="user-email" placeholder="E-mail" required="required" />
            </div>
        </div>
        <div class="form-group">
            <label for="user-pwd" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="user-pwd" name="user-pwd" placeholder="Mot de passe" required="required" />
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-info">Connexion</button>
        </div>
    </form>

</div>