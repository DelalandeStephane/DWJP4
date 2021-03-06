<?php $title = "Billet simple pour l'Alaska" ?>
<?php ob_start();?>
			<div id="nav-bar-index-page" >
				<?php if(isset($_GET['page']) && $_GET['page'] != 1 && !empty($_GET['page'])): ?>
					<a href="index.php?page=<?= $back ?>" class="triangle nav-bar-page" id="triangle-left"></a>
				<?php endif; ?>
				<?php if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] != $nbPage ): ?>
					<a href="index.php?page=<?= $next ?>" class="triangle nav-bar-page" id="triangle-right"></a>
				<?php endif; ?>	
			</div>
		<section id="index-content" class="content">
			<?php
		  if($posts != null)
        {	
	        foreach ($posts as $data) 
	        {
	        	
	        ?>
	        <article class="index-page">
				<h3><?= $data->getTitle() ?></h3>
				<p><?= substr($data->getContent(),0,600) ?> ...</p>
				<a href="?action=chapter&id=<?= $data->getId() ?>">Lire plus</a>
			</article>
            
        <?php
        	}
        }
        ?>
        <div id="nav-bar-mobile" >
				<?php if(isset($_GET['page']) && $_GET['page'] != 1 && !empty($_GET['page'])): ?>
					<a href="index.php?page=<?= $back ?>" >Précédent</a>
				<?php endif; ?>
				<?php if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] != $nbPage ): ?>
					<a href="index.php?page=<?= $next ?>">Suivant</a>
				<?php endif; ?>	
			</div>
		
		</section>

		
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>
