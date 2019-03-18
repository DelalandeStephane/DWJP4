<?php $title = "Commentaires signalés"; ?>
<?php ob_start();?>
		<h2>Commentaires signalés</h2>
		<table>
			<tr>
				<th>ID</th>
                <th>identifiant chapitre</th>
				<th>pseudo</th>
				<th>Commentaire</th>
				<th>date de publication</th>
                <th>valider</th>
				<th>supprimer</th>
			</tr>
		<?php
        if($comments != null)
        {	
        foreach ($comments as $data) {
             ?>
        <tr>
            <td><?= $data->getId() ?></td>
            <td><?= $data->getChapter_id() ?></td>
            <td><?= $data->getName() ?></td>
            <td><?= $data->getComment() ?></td>
            <td><?= $data->getCommentDate() ?></td>
            <td><a class="agree-alert" href="?action=checkcomment&id=<?=  $data->getId() ?>"><img src="public/img/checked.png"></a></td>
            <td><a class="delete-alert" href="?action=supprcomment&id=<?=  $data->getId() ?>"><img src="public/img/close-cross.png"></a></td>
        </tr>
            
        <?php
        }
        }
        ?>
		</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>