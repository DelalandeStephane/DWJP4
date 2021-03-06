<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/backend.css">
</head>
<body>
	<a href="index.php" class="back">Retour au site</a>
	<div class="container container-backend">
		<nav>
			<div class="backend-nav-deco-square"></div>
			<ul>
				<li><a href="?action=creationarticle">Création d'article</a></li>
				<li><a href="?action=adminposts">Liste des articles</a></li>
				<li><a href="?action=admincomments">Vos commentaires</a></li>
				<li><a href="?action=adminreportcomments">Commentaires signalés</a></li>
				<li><a href="?action=adminexit">Déconnexion</a></li>
			</ul>
		</nav>
		<section class="backend-content">
			<?= $content ?>
		</section>
	</div>
	<footer>
		<p>Delalande Stephane -Dans le cadre du projet 4  DWJ -OpenClass room-</p>
	</footer>
	 <script src='http://cloud.tinymce.com/5-testing/tinymce.min.js'></script>
	 <script src='public/js/main.js'></script>
</body>
</html>