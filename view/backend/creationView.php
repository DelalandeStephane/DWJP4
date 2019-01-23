<?php ob_start() ?>
<h2>Creation d'article</h2>
<form method="post" action="index.php?action=sendpost">
	<label class="creation-label" for="title">Titre du chapitre</label>
	<input type="text" name="title" id="title" class="title-field"> 
	<textarea id="write-area" name="content"></textarea>
	<input type="submit" value="Envoyer" class="form-bt backend-bt">
</form>


   
 <script src='http://cloud.tinymce.com/5-testing/tinymce.min.js'></script>
 <script>
  tinymce.init({
    selector: '#write-area',
    height:720,
    resize:false
  });
  </script>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');?>