<?php
require('controller/frontend.php');
require('controller/backend.php');

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
 /* BACKEND*/
 		/* acces zone admin*/
 		elseif ($_GET['action'] == 'admin') {
	 		adminArea();
	 	}
	 	/*page creation article*/
	 	elseif ($_GET['action'] == 'creationarticle') {
	 		creationArticle();
	 	}
	 	/*Envoi de l'article*/
	 	elseif ($_GET['action'] == 'sendpost') {
	 		sendChapter($_POST['title'], $_POST['content']);
	 	}
	 		/*Envoi de l'article*/
	 	elseif ($_GET['action'] == 'adminposts') {
	 			adminListChapters();
	 	}
	 		/*Suprimer article*/
	 	elseif ($_GET['action'] == 'supprchapter') {
	 			deleteChapter($_GET['id']);
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