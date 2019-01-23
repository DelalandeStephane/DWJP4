<?php

require_once('model/PostManager.php');
require_once('model/commentManager.php');


/* Affichage de la vue creation */

function adminArea(){

	
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