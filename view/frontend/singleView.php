<?php $title = "Chapitre ". $chapter['chapter_index']; ?>
<?php ob_start();?>
	
	<section id="single-page" class="content">
		<article class="single-content">
			<p class="chapter-time">date de création : <?= $chapter['creation_date_fr'] ?></p>
			<h3><?= $chapter['title']?></h3>
			<p class="chapter-content"><?= $chapter['content'] ?></p>
		</article>
	</section>
	<form method="post" action="index.php?action=sendComment&id=<?= $chapter['id'] ?>#chapter-comment" class="comment-form" id="chapter-comment">
		<h3>Laisser un commentaire : </h3>
		<label>Pseudo : </label>
		<input type="text" name="pseudo" id="pseudo" required="" maxlength="150"><br>
		<label>Votre commentaire</label><br>
		<textarea id="comment" name="comment" required></textarea><br>
		<input type="submit" value="Envoyer" class="form-bt">
	</form>
	<section>
		<h2 class="comment-title">Commentaires</h2>
		<?php
			while ($comment = $comments->fetch()) {
			?> 
			<div class="comment-deco">
			<header>
				<h3><?= $comment['name'] ?></h3>
				<p><?= $comment['comment_date_fr'] ?></p>
			</header>
			<div class="comment-content">	
				<p><?= $comment['comment'] ?></p>
				<a href="?action=chapter&id=<?= $chapter['id'] ?>&report=<?= $comment['id'] ?>" class="comment-alert">Signaler le commentaire</a>
			</div>
			</div>
		<?php
 		} 
 		 $comments->closeCursor();
		?>
	</section>
			

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>