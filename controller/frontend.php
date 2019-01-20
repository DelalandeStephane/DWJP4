<?php

require_once('model/PostManager.php');

/* Récupere la liste des billets à afficher*/
function listChapters()
{
	$postManager = new delalande\forteroche\model\PostManager();
	$posts =$postManager->getPosts();
	require('view/frontend/chaptersView.php');
}
