<?php

require_once('model/PostManager.php');
require_once('model/commentManager.php');


/* Affichage de la vue creation */

function adminArea(){
	$content='<h1>Hello</h1>';
	
	require('view/backend/template.php');
}

function creationArticle(){
	require('view/backend/creationView.php');
}

function sendChapter($title, $content) {
	$postManager= new delalande\forteroche\model\PostManager();
	$sendPost = $postManager->sendPost($title, $content);
	header('Location: index.php?action=creationarticle');
}

function adminListChapters()
{
	$postManager = new delalande\forteroche\model\PostManager();
	$posts = $postManager->adminPosts();

	require('view/backend/chapterListView.php');
}