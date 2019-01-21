<?php
require('controller/frontend.php');

try {
	if(isset($_GET['action'])) {
		/* Affiche la liste des chapitres*/
		if($_GET['action'] == 'listChapters') {
			if( isset($_GET['page'])) {
				listChapters($_GET['page']);
			}
		}
		/*Affiche un chapitre selectionné + commentaires*/
		elseif ($_GET['action'] == 'chapter') {
			chapter();
		}
		/* Envoyer un commentaire */
		elseif ($_GET['action'] == 'sendComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    sendComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
                }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
	}
	else {
		if( isset($_GET['page'])) {
				listChapters($_GET['page']);
			}
		else {
			listChapters(1);
		}
		
	}
}

catch(Exception $e) {
	echo "Erreur : " . $e->getMessage();

}