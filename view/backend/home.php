<?php $title = "administration"; ?>
<?php ob_start();?>
<div class="button home-admin">
	<h1>Bienvenue sur votre interface d'administration</h1>
	<p>Ici vous pouvez laisse cour à votre créativité et gérer votre travail</p>
	<p>Vous pouvez également Gérer les commentaires laissés par vos lecteurs</p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>