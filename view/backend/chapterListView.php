<?php $title = "Gestion chapitres"; ?>
<?php ob_start();?>
		<h2>Liste des articles</h2>
		<table>
			<tr>
				<th>ID</th>
                <th>index chapitre</th>
				<th>titre</th>
				<th>date de creation</th>
				<th>derniere modification</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		<?php
          if($posts != null)
        {   
            foreach ($posts as $data) {

                if($data->getUpdateDate() == null) {
                     $updateDate = 'pas de modification';
                } 
                else {
                      $updateDate = $data->getUpdateDate();
                }
            ?>
        
         	<tr>
         		<td><?= $data->getId() ?></td>
                <td><?= $data->getChapter_index() ?></td>
         		<td><?= $data->getTitle() ?></td>
         		<td><?= $data->getCreationDate() ?></td>
         		<td><?= $updateDate ?></td>
         		<td><a href="?action=updatepage&id=<?= $data->getId() ?>"><img src="public/img/refresh-button.png"></a></td>
         		<td><a class="delete-alert" href="?action=supprchapter&id=<?= $data->getId() ?>"><img src="public/img/close-cross.png"></a></td>
         	</tr>
            
        <?php
            }
        }
        ?>
		</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>