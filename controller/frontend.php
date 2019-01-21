<?php

require_once('model/PostManager.php');
require_once('model/commentManager.php');

/* Récupere la liste des chapitres à afficher*/
function listChapters($page)
{
	$postManager = new delalande\forteroche\model\PostManager();
	$posts = $postManager->getPosts($page);
	require('view/frontend/chaptersView.php');
}
/* affiche chapitre + commentaires*/
function chapter()
{
	$commentManager = new delalande\forteroche\model\commentManager();
	$postManager = new delalande\forteroche\model\PostManager();
	$chapter = $postManager->getPost($_GET['id']);
	$comments =$commentManager->getComments($_GET['id']);
    require('view/frontend/singleView.php');
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
