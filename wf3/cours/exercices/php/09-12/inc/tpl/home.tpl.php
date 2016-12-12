<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<div class="container">
    <div class="row">

        <h2 class="text-center">Félicitations <?php echo $_SESSION['user_firstname']; ?> ! Vous êtes connecté !</h2>

    </div>
</div>