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

function deleteChapter($id) {
	$postManager = new delalande\forteroche\model\PostManager();
	$postManager->adminDelete($id);

	header('Location: index.php?action=adminposts');

}

function updateViewChapter($id) {
	$postManager = new delalande\forteroche\model\PostManager();
	$chapter = $postManager->getPost($id);

	require('view/backend/updateChapterView.php');
}

function updateChapter($title, $content,$id) {
	$postManager= new delalande\forteroche\model\PostManager();
	$sendPost = $postManager->adminUpdate($title, $content,$id);

	header('Location: index.php?action=adminposts');
}

function listComment() {
	$commentManager = new delalande\forteroche\model\CommentManager();
	$comments = $commentManager->adminComment();
	require('view/backend/commentListView.php');
}

function deleteComment($id) {
	$commentManager = new delalande\forteroche\model\CommentManager();
	$commentManager->adminDelete($id);

	header('Location: index.php?action=admincomments');
}



