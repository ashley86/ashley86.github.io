<?php
/**
 * -- Consigne --
 * Vous travaillez pour un cinéma et devez créer une base de données de film.
 * Votre base de données s’appellera « exercice_3 ».
 * Vous devrez ensuite créer un script qui permettra d’ajouter et d’afficher des films.
 * Suivez les étapes.
 */



// Inclusion de base
require_once('./inc/init_session.inc.php');

# Inclusion du contenu
$include_page = './inc/tpl/home.tpl.php';

if( ! empty($_GET['p']) )
{
    $page = htmlentities(trim($_GET['p']));

    # Inclusion de la page demandée
    if( file_exists("./inc/{$page}.inc.php" ) )
    {
        $include_page = "./inc/{$page}.inc.php"; # Si le fichier existe
    } else {
        $include_page = "./inc/tpl/404.tpl.php"; # Sinon 404
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?php echo ( ! empty($page) ) ? ucfirst( $page ) . ' | ' : ''; ?><?php echo SITE_NAME; ?></title>

    <!-- Fonts -->
    <link href="assets/css/lobster.fonts.css" media="screen" type="text/css" rel="stylesheet" />

    <!-- Base CSS -->
    <link rel="stylesheet" href="assets/css/sticky-footer.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen" type="text/css" />

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/styles.css" media="screen" type="text/css" />

</head>
<body>

<div class="container-fluid" id="wrapper">

    <?php
        # Inclusion du menu
        include_once('./inc/tpl/menu.tpl.php');
    ?>

    <header>
        <h1><?php echo ( ! empty($page) ) ? $page : SITE_NAME; ?></h1>
    </header>

    <main>
        <?php
        # Inclusion de la page
        include_once( $include_page );
        ?>

    </main>

    <?php
    # Gestion des erreurs
    include('./inc/errors.inc.php');
    ?>
    <div class="push"></div>
</div> <!-- End .wrapper -->

<footer class="footer"></footer>

<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/jquery-2.2.4.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>
</html>