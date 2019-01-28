<?php ob_start(); ?>
<h2>Creation d'article</h2>
<form method="post" action="index.php?action=updatepost&id=<?= $chapter['id']?>">
	<label class="creation-label" for="title">Titre du chapitre</label>
	<input type="text" name="title" value="<?= $chapter['title'] ?>" id="title" class="title-field" required="" maxlength='255'> 
	<textarea id="write-area" name="content" required=""> <?= $chapter['content']?></textarea>
	<input type="submit" value="Envoyer" class="form-bt backend-bt">
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php');?>