<?php ob_start() ?>
<form>
	<input type="text" name="title" id="title"> 
	<textarea id="write-area"></textarea>
	<input type="submit" value="Envoyer" class="form-bt backend-bt">
</form>


   
 <script src='http://cloud.tinymce.com/5-testing/tinymce.min.js'></script>
 <script>
  tinymce.init({
    selector: '#write-area',
    height:800,
    resize:false
  });
  </script>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');?>