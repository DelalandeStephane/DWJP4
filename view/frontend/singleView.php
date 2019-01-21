<?php $title = "" ?>
<?php ob_start();?>
	
	<section id="single-page" class="content">
		<article class="single-content">
			<h3><?= $chapter['title']?></h3>
			<p><?= $chapter['content'] ?></p>
		</article>
	</section>
	<form method="post" action="index.php?action=sendComment&id=<?= $chapter['id'] ?>#chapter-comment" class="comment-form" id="chapter-comment">
		<h3>Laisser un commentaire : </h3>
		<label>Pseudo : </label>
		<input type="text" name="pseudo" id="pseudo"><br>
		<label>Votre commentaire</label><br>
		<textarea id="comment" name="comment"></textarea><br>
		<input type="submit" value="Envoyer" class="form-bt">
	</form>

			

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>