<?php

require_once('model/PostManager.php');
require_once('model/commentManager.php');

/* Récupere la liste des billets à afficher*/
function listChapters($page)
{
	$postManager = new delalande\forteroche\model\PostManager();
	$posts = $postManager->getPosts($page);
	require('view/frontend/chaptersView.php');
}

function chapter()
{
	$postManager = new delalande\forteroche\model\PostManager();
	$chapter = $postManager->getPost($_GET['id']);
    require('view/frontend/singleView.php');
}

function sendComment($chapterId, $author, $comment) {

	$commentManager = new delalande\forteroche\model\CommentManager();
    $affectedLines =$commentManager->postComment($chapterId, $author, $comment);

    if($affectedLines == null) {
    	throw new Exception("Erreur: impossible d'envoyer le formulaire");
    	
    }
    else {
        header('Location: index.php?action=chapter&id='.$chapterId);
    }

}


