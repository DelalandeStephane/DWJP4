<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/responsive.css">
</head>
<body>
	<div class="main">
		<div class="container">
			<header>
				<h1><a href="index.php">Billet simple pour l'Alaska</a></h1>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="?action=author">L'auteur</a></li>
					<li><a href="?action=admin">Administration</a></li>
				</ul>
			</header>
				<?= $content ?>
		</div>
	</div>
	<footer>
		<p>Delalande Stephane -Dans le cadre du projet 4  DWJ -OpenClass room-</p>
	</footer>


</body>
</html>