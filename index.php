<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

try {
	if(isset($_GET['action'])) {
		/* Affiche la liste des chapitres*/
		if($_GET['action'] == 'listchapters') {
			if( isset($_GET['page']) && $_GET['page'] > 0 /* et supperieur a nb page*/) {
				listChapters($_GET['page']);
			} else {
				throw new Exception(" page non existante");	
			}
		}
		/*Affiche un chapitre selectionné + commentaires*/
		elseif ($_GET['action'] == 'chapter') {
			chapter();
		}

		/* Envoyer un commentaire */
		elseif ($_GET['action'] == 'sendComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    sendComment($_GET['id'], htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['comment']));
                }
            else {
                throw new Exception('Erreur : aucun identifiant de chapitre envoyé');
            }
        }
        /* Commentaire signalé*/
        elseif ($_GET['action'] == 'report') {
        	if (isset($_GET['id'])) {
        		reportCom();
        	}
		}
        /*page auteur*/
		elseif ($_GET['action'] == 'author') {
			authorPage();
		}

        /* acces zone admin*/
 		elseif ($_GET['action'] == 'admin') {
	 		securityAcess();
	 	}

 /*------------------------- BACKEND----------------------------*/

	 	/* Authentification utilisateur*/
	 	elseif($_GET['action'] == 'adminrequest') {
	 		if(isset($_POST['user-name']) && isset($_POST['user-pw'])) {
				adminRequest(htmlspecialchars($_POST['user-name']),htmlspecialchars($_POST['user-pw']));
			 } else {
			 	throw new Exception("Erreur :pas d'identifiant ou de mot de passe envoyé");
			 }
		}
			/*Verifie l'acces à la zone d'administration*/
		elseif( isset($_SESSION['access']) && $_SESSION['access'] == true ) {

		 	/*page creation article*/
		 	if ($_GET['action'] == 'creationarticle') {
		 		creationArticle();
		 	}
		 	/*Envoi de l'article*/
		 	elseif ($_GET['action'] == 'sendpost') {
		 		sendChapter(htmlspecialchars($_POST['chapter-index']), htmlspecialchars($_POST['title']), html_entity_decode($_POST['content']));
		 	}
		 		/* vu liste des chapitres*/
		 	elseif ($_GET['action'] == 'adminposts') {
		 			adminListChapters();
		 	}
		 		/*Suprimer article*/
		 	elseif ($_GET['action'] == 'supprchapter') {
		 		if(isset($_GET['id'])){
		 			deleteChapter($_GET['id']);
		 		} 
		 		else {
		 			throw new Exception("aucun identifiant envoyé");	
		 		}
		 	}
		 	/* affichage de la vue update */
		 	elseif ($_GET['action'] == 'updatepage') {
		 		if(isset($_GET['id'])){
		 			updateViewChapter($_GET['id']);
		 		} 
		 		else {
		 			throw new Exception("aucun identifiant envoyé");
		 		}		
		 	}
		 	/* Modification d'un post*/
			elseif ($_GET['action'] == 'updatepost') {
				if(isset($_GET['id'])){
		 			updateChapter(htmlspecialchars($_POST['chapter-index']), htmlspecialchars($_POST['title']), html_entity_decode($_POST['content']), $_GET['id']);
		 		}
		 		else {
		 			throw new Exception("aucun identifiant envoyé");
		 		}	
		 	}
		 	/* affiche la liste des commentaires*/
		 	elseif ($_GET['action'] == 'admincomments') {
		 		listComment();
		 	}
		 	/* supprimer un commentaire*/
		 	elseif ($_GET['action'] == 'supprcomment') {
		 		if(isset($_GET['id'])){
		 			deleteComment($_GET['id']);
		 		} 
		 		else {
		 			throw new Exception("aucun identifiant envoyé");
		 		}
		 	}
		 	/* affiche la liste des commentaire signalés*/
		 	elseif ($_GET['action'] == 'adminreportcomments') {
		 		listReportComments();
		 	}
		 	/* Enleve le signalement du commentaire*/
		 	elseif ($_GET['action'] == 'checkcomment') {
		 		if(isset($_GET['id'])){
		 			checkComment($_GET['id']);
		 		} 
		 		else {
		 			throw new Exception("aucun identifiant envoyé");
		 		}
		 	}
		 	/* Deconnexion session*/
		 	elseif($_GET['action'] == 'adminexit') {
		 		adminExit();
		 	}
		}
	}
	/* fin condition action*/
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