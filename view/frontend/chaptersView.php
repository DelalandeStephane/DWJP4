<?php $title = "Billet simple pour l'Alaska" ?>
<?php ob_start();?><!-- A traduire en php --->
			<div id="nav-bar-index-page" >
				<?php if(isset($_GET['page']) && $_GET['page'] != 1 && !empty($_GET['page'])): ?>
					<a href="index.php?page=<?= $back ?>" class="triangle nav-bar-page" id="triangle-left"></a>
				<?php endif; ?>
				<?php if(isset($_GET['page']) && $_GET['page'] != $nbPage+1 && !empty($_GET['page'])): ?>
					<a href="index.php?page=<?= $next ?>" class="triangle nav-bar-page" id="triangle-right">
					</a>
				<?php endif; ?>	
			</div>
		<section id="index-content" class="content"><!-- Content -->
			<?php
        while ($data = $posts->fetch())
        {
        ?>
        <article class="index-page">
			<h3><?= $data['title'] ?></h3>
			<p><?= substr($data['content'],0,700) ?> ...</p>
			<a href="?action=chapter&id=<?= $data['id'] ?>">Lire plus</a>
		</article>
            
        <?php
        }
        $posts->closeCursor();
        ?>
		</section><!-- Content -->
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>