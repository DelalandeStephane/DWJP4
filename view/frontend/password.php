<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
</head>
<body>
	 <?php 
	    	if(isset($error)){
	   ?>
	   		<p><?= $error ?></p>
	   <?php
	    	}
	    ?>
	<form class="password-area" method="post" action="?action=adminrequest">
		<label for="user-name">Identifiant : </label>
	    <input type="text" id="user-name" name="user-name" required="">
	    <label for="user-pw">Mot de passe : </label>
	    <input type="password" id="user-pw" name="user-pw" required="">
	    <input type="submit" name="">

	</form>

</body>
</html>


