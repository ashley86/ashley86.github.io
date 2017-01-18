<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="<?php echo SITE_URL; ?>"><?php echo strtoupper( SITE_NAME ); ?></a>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>">Dashboard</a>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>products/">Produits</a>
            <ul>
                <li><a href="<?php echo SITE_URL; ?>products/">Lister</a></li>
<?php if( is_admin() ): ?>
                <li><a href="<?php echo SITE_URL; ?>products/add/">Ajouter</a></li>
<?php endif; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>orders/">Commandes</a>
            <ul>
                <li><a href="<?php echo SITE_URL; ?>orders/">Lister</a></li>
<?php if( is_admin() ): ?>
                <li><a href="<?php echo SITE_URL; ?>orders/add/">Ajouter</a></li>
<?php endif; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>users/">Utilisateurs</a>
            <ul>
                <li><a href="<?php echo SITE_URL; ?>users/">Mon profil (<?php echo $_SESSION['user_firstname']; ?>)</a></li>
<?php if( is_admin() ): ?>
                <li><a href="<?php echo SITE_URL; ?>users/list/">Lister</a></li>
                <li><a href="<?php echo SITE_URL; ?>users/add/">Ajouter</a></li>
<?php endif; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo SITE_URL; ?>libs/services-users.php?a=disconnect">Déconnexion</a>
        </li>
    </ul>

    <span class="copyright">&copy; Ash - <?php echo date('Y'); ?></span>
</div>