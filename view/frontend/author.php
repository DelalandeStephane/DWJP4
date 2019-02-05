<?php $title = "Auteur" ?>
<?php ob_start();?>
	<section class="content-author">
		<img src="public/img/portrait.jpg">
		<h2>Jean Forteroche</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor odio ipsum, sed facilisis urna convallis a. Mauris ultrices euismod bibendum. Vivamus mollis enim non tempus pellentesque. Aliquam non diam eu mi semper malesuada. Integer id malesuada orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc egestas augue sed aliquet cursus. Nunc a sodales tellus. Cras quis fringilla justo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor odio ipsum, sed facilisis urna convallis a. Mauris ultrices euismod bibendum. Vivamus mollis enim non tempus pellentesque. Aliquam non diam eu mi semper malesuada. Integer id malesuada orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc egestas augue sed aliquet cursus. Nunc a sodales tellus. Cras quis fringilla justo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor odio ipsum, sed facilisis urna convallis a. Mauris ultrices euismod bibendum. Vivamus mollis enim non tempus pellentesque. Aliquam non diam eu mi semper malesuada. Integer id malesuada orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc egestas augue sed aliquet cursus. Nunc a sodales tellus. Cras quis fringilla justo.</p>
	</section>


<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>