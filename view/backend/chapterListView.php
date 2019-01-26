<?php ob_start();?>
		<h2>Liste des articles</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>titre</th>
				<th>date de creation</th>
				<th>derniere modification</th>
				<th>modifier</th>
				<th>suprimmer</th>
			</tr>
		<?php	
        while ($data = $posts->fetch())
        {
        	if($data['update_date_fr'] == null) {
        		$data['update_date_fr'] = 'pas de modification';
        	}
        ?>
     	<tr>
     		<td><?= $data['id'] ?></td>
     		<td><?= $data['title'] ?></td>
     		<td><?= $data['creation_date_fr'] ?></td>
     		<td><?= $data['update_date_fr'] ?></td>
     		<td><a href="#"><img src="public/img/refresh-button.png"></a></td>
     		<td><a href="#"><img src="public/img/close-cross.png"></a></td>
     	</tr>
            
        <?php
        }
        $posts->closeCursor();
        ?>
		</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>