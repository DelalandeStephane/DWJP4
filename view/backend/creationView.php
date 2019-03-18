<?php 

$title = "Creation article";
 ?>
<?php ob_start(); ?>

<h2>Creation d'article</h2>
<form method="post" action="index.php?action=sendpost">
	<?php if(isset($_GET['error'])){ ?> <p class="error">Vous n'avez pas saisi tout les champs</p>   <?php } ?>
  <label class="creation-label" for="title" >Titre du chapitre</label>
  <input  type="text" name="title" value="<?php if(isset($_SESSION['title'])) { echo $_SESSION['title']; } ?>"  id="title" class="title-field" maxlength='255' > 
  <br>
  <label class="creation-label" for="chapter-index">Index du chapitre</label>
  <input type="number" name="chapter-index" value="<?php if(isset($_SESSION['chapterIndex'])){echo  $_SESSION['chapterIndex']; } ?>" id="chapter-index" min="1" max="1000">
  <textarea  id="write-area" name="content"><?php if(isset($_SESSION['content'])) { echo $_SESSION['content']; } ?></textarea>
  <input type="submit" value="Envoyer" class="form-bt backend-bt">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');?>