<?php

require_once('model/PostManager.php');

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


