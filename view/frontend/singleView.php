<?php $title = "Chapitre ". $chapter->getChapter_index(); ?>
<?php ob_start();?>
	
	<section id="single-page" class="content">
		<article class="single-content">
			<p class="chapter-time">date de création : <?= $chapter->getCreationDate() ?></p>
			<h3><?= $chapter->getTitle()?></h3>
			<p class="chapter-content"><?= $chapter->getContent() ?></p>
		</article>
	</section>
	<form method="post" action="index.php?action=sendComment&id=<?= $chapter->getId() ?>#chapter-comment" class="comment-form" id="chapter-comment">
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
		  if($comments != null)
        {	
			foreach ($comments as $comment) {
			?> 
			<div class="comment-deco">
			<header>
				<h3><?= $comment->getName(); ?></h3>
				<p><?= $comment->getCommentDate() ?></p>
			</header>
			<div class="comment-content">	
				<p><?= $comment->getComment() ?></p>
				<a href="?action=report&idcom=<?= $comment->getId() ?>&id=<?= $chapter->getId() ?>#chapter-comment" class="comment-alert">Signaler le commentaire</a>
			</div>
			</div>
		<?php
			}
 		} 
		?>
	</section>
			

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>