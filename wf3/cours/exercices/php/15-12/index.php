<?php 
$root_path = '.';
require_once($root_path . '/inc/init_session.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title><?php echo SITE_NAME; ?></title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<body>

	<?php include($root_path . '/inc/header.inc.php'); ?>

	<?php 
		// On appelle la Vue correspondant à la page demandée
		if (!empty($_GET['page'])) { // Si l'utilisateur cherche à atteindre une page...
			if (file_exists($root_path . '/inc/' . $_GET['page'] . '.inc.php')) { // On vérifie si elle existe : si oui, on l'inclut
				include($root_path . '/inc/' . $_GET['page'] . '.inc.php');		
			} else { // Sinon, on inclut la page erreur 404
				include($root_path . '/inc/404.inc.php');		
			}
		} else { // Sinon, c'est que l'utilisateur est sur la page d'accueil
			include($root_path . '/inc/home.inc.php');
		}
	?>

	<?php include($root_path . '/inc/footer.inc.php'); ?>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/main.js"></script>
	
</body>
</html>