<?php $title = " Modification chapitre ". $chapter->getChapter_index(); ?>
<?php ob_start(); ?>
<h2>Creation d'article</h2>
<form method="post" action="index.php?action=updatepost&id=<?= $chapter->getId()?>">
	<label class="creation-label" for="title">Titre du chapitre</label>
	<input type="text" name="title" value="<?= $chapter->getTitle() ?>" id="title" class="title-field" required="" maxlength='255'>
	<br>
	<label class="creation-label" for="chapter-index">Index du chapitre</label>
	<input type="number" name="chapter-index" id="chapter-index" value="<?= $chapter->getChapter_index() ?>" min="1" max="1000"> 
	<textarea id="write-area" name="content" required=""> <?= $chapter->getContent() ?></textarea>
	<input type="submit" value="Envoyer" class="form-bt backend-bt">
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php');?>