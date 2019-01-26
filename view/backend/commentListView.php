<?php ob_start();?>
		<h2>Liste des commentaires</h2>
		<table>
			<tr>
				<th>ID</th>
                <th>identifiant chapitre</th>
				<th>pseudo</th>
				<th>Commetaire</th>
				<th>date de publication</th>
				<th>suprimmer</th>
			</tr>
		<?php	
        while ($data = $comments->fetch())
        {
        ?>
     	<tr>
     		<td><?= $data['id'] ?></td>
            <td><?= $data['chapter_id']?></td>
     		<td><?= $data['name'] ?></td>
     		<td><?= $data['comment'] ?></td>
     		<td><?= $data['comment_date_fr'] ?></td>
     		<td><a href="?action=supprcomment&id=<?= $data['id'] ?>"><img src="public/img/close-cross.png"></a></td>
     	</tr>
            
        <?php
        }
        $comments->closeCursor();
        ?>
		</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>