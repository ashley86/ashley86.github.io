<?php
    // Inclusion de base
    require_once('./inc/init_session.inc.php');

    # Inclusion du contenu
    $include_page = './inc/tpl/connexion.tpl.php';

    if( isset( $_SESSION['connected'] ) && $_SESSION['connected'] === true )
    {
        $include_page = './inc/tpl/home.tpl.php';

        if( ! empty($_GET['p']) )
        {
            $page = htmlentities(trim($_GET['p']));
            if( ! empty($_GET['a']) )
            {
                $page .= '/' . $_GET['a'];
            }

            if( file_exists("./inc/tpl/{$page}.tpl.php" ) )
            {
                $include_page = "./inc/tpl/{$page}.tpl.php";
            }
        }

        $include_page = ( ! empty($include_page) ) ? $include_page : 'home';
    }


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo ( ! empty($page) ) ? ucfirst( $page ) . ' | ' : ''; ?><?php echo SITE_NAME; ?></title>

        <!-- Fonts -->
        <link href="/assets/css/lobster.fonts.css" media="screen" type="text/css" rel="stylesheet" />

        <!-- Base CSS -->
        <link rel="stylesheet" href="/assets/css/sticky-footer.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css" media="screen" type="text/css" />

        <!-- Styles -->
        <link rel="stylesheet" href="/assets/css/styles.css" media="screen" type="text/css" />

    </head>
    <body class="<?php echo (is_connected()) ? 'is-connected' : '' ?> <?php echo (is_admin()) ? 'is-admin' : '' ?>">

        <div class="container-fluid" id="wrapper">

            <?php

            if(is_connected())
            {
                include_once('./inc/tpl/menu.tpl.php');
            }

            ?>

            <header>
                <h1><?php echo ( ! empty($page) ) ? $page : SITE_NAME; ?></h1>
                <p>Des Boolls, des petites Boolls, toujours des petites Boolls...</p>
            </header>

            <main>
<?php
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
        <script src="/assets/js/jquery-2.2.4.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/scripts.js"></script>

    </body>
</html>