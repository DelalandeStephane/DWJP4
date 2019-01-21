<?php $title = "" ?>
<?php ob_start();?>
	
	<section id="single-page" class="content">
		<article class="single-content">
			<h3><?= $chapter['title']?></h3>
			<p><?= $chapter['content'] ?></p>
		</article>
		
	</section>

			

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>