<?php $title = "Administration" ?>
<?php ob_start();?>

	 <?php 
	    	if(isset($error)){
	   ?>
	   		<p><?= $error ?></p>
	   <?php
	    	}
	    ?>
	<form class="password-area" method="post" action="?action=adminrequest">
		<h3>Zone administration</h3>
		<label for="user-name">Identifiant</label>
		<br>
	    <input type="text" id="user-name" name="user-name" required="">
	    <br>
	    <label for="user-pw">Mot de passe</label>
	    <br>
	    <input type="password" id="user-pw" name="user-pw" required="">
	    <br>
	    <input type="submit" name="" class="form-bt">

	</form>


<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>