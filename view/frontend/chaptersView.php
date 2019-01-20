<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start();?><!-- A traduire en php --->
		<section id="index-content"><!-- Content -->
			<?php
        while ($data = $posts->fetch())
        {
        ?>
        <article class="index-page">
			<h3><?= $data['title'] ?></h3>
			<p><?= $data['content'] ?></p>
			<a href="#">Lire plus</a>
		</article>
            
        <?php
        }
        $posts->closeCursor();
        ?>
		</section><!-- Content -->
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>