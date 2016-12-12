<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="<?php echo SITE_URL; ?>index.php">Projet PHP</a>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>index.php">Dashboard</a>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>index.php?p=products">Produits</a>
            <ul>
                <li><a href="<?php echo SITE_URL; ?>index.php?p=products">Lister</a></li>
<?php if( is_admin() ): ?>
                <li><a href="<?php echo SITE_URL; ?>index.php?p=products&a=add">Ajouter</a></li>
<?php endif; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>index.php?p=users">Utilisateurs</a>
            <ul>
                <li><a href="<?php echo SITE_URL; ?>index.php?p=users">Mon profil</a></li>
<?php if( is_admin() ): ?>
                <li><a href="<?php echo SITE_URL; ?>index.php?p=users&a=list">Lister</a></li>
                <li><a href="<?php echo SITE_URL; ?>index.php?p=users&a=add">Ajouter</a></li>
<?php endif; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>libs/services-users.php?a=disconnect">Déconnexion</a>
        </li>
    </ul>
</div>