<?php
require_once('model/PostManager.php');
require_once('model/commentManager.php');

/* Récupere la liste des chapitres à afficher*/
function listChapters($page)
{
	$postManager = new delalande\forteroche\model\PostManager();
	$posts = $postManager->getPosts($page);
	if(!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}	
	/*Pagination*/
	$nbPage = $postManager->getPage();
	if(isset($_GET['page']) && !empty($_GET['page'])){
		if($_GET['page'] == 1 ) {
			$back = $_GET['page'];
			$next = $_GET['page'] +1;
		} 
		else {
			$back = $_GET['page'] - 1 ;
			if($_GET['page'] == $nbPage+1){		
				$next = $_GET['page'];
			} 
			else {
				$next = $_GET['page'] + 1 ;
			}
		}	
	}
	require('view/frontend/chaptersView.php');
}
/* affiche chapitre + commentaires*/
function chapter()
{
	$commentManager = new delalande\forteroche\model\commentManager();
	$postManager = new delalande\forteroche\model\PostManager();

	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$chapter = $postManager->getPost($_GET['id']);
		$comments =$commentManager->getComments($_GET['id']);
	}

    require('view/frontend/singleView.php');
}

function reportCom(){
	$commentManager = new delalande\forteroche\model\commentManager();

	if(isset($_GET['idcom']) && !empty($_GET['idcom'])){
		$report =$commentManager->reportComment($_GET['idcom']);
		 header('Location: index.php?action=chapter&id='.$_GET['id']);
	}	
}


/* envoi commentaire */
function sendComment($chapterId, $author, $comment) 
{
	$commentManager = new delalande\forteroche\model\CommentManager();
    $affectedLines =$commentManager->postComment($chapterId, $author, $comment);
    if($affectedLines == null) {
    	throw new Exception("Erreur: impossible d'envoyer le formulaire");	
    }
    else {
        header('Location: index.php?action=chapter&id='.$chapterId);
    }
}

function authorPage() {
	require('view/frontend/author.php');
}

function securityAcess () {
	if(isset($_SESSION['access'])){
		require('view/backend/home.php');

	} 
	else {
		require('view/frontend/password.php');
	}
}
