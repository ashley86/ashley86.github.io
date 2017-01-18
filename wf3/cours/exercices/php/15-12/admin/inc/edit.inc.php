<?php 
$root_path = '..';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>Backoffice <?php echo SITE_NAME; ?></title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<body>

	<form action="../libs/admin_services.php?action=postArticle" method="post">
		<div>
			<label for="title">Titre</label>
			<input type="text" name="title" id="title" />
		</div>
		<div>
			<label for="text">Texte</label>
			<input type="text" name="text" id="text" />
		</div>

		<div>
			<label for="image">Image</label>
			<input type="file" name="image" id="image" accept="image/*" />
		</div>
	</form>
	
</body>
</html>