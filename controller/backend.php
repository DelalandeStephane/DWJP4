<?php

require_once('model/PostManager.php');
require_once('model/commentManager.php');
require_once('model/securityManager.php');

/* Affichage de la vue creation */

function adminRequest($id, $userpw) {
	$securityManager = new delalande\forteroche\model\securityManager();
	$access = $securityManager->reqPassword($id);
	$name= $access['name'];
	$pass = $access['password'];
	if($id == $name && password_verify($userpw, $pass)) {
		$content='<h1>Hello</h1>';
		require('view/backend/template.php');
	} else {
		$error = "Mauvais identifiant";
		require('view/frontend/password.php');
	}
}

function creationArticle(){
	require('view/backend/creationView.php');
}

function sendChapter($chapterIndex,$title, $content) {
	$postManager = new delalande\forteroche\model\PostManager();
	$postManager->sendPost($chapterIndex, $title, $content);
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

function updateChapter($chapterIndex,$title, $content,$id) {
	$postManager= new delalande\forteroche\model\PostManager();
	$sendPost = $postManager->adminUpdate($chapterIndex, $title, $content,$id);

	header('Location: index.php?action=adminposts');
}

function listComment() {
	$commentManager = new delalande\forteroche\model\CommentManager();
	$comments = $commentManager->adminComment();
	require('view/backend/commentListView.php');
}

function listReportComments() {
	$commentManager = new delalande\forteroche\model\CommentManager();
	$comments = $commentManager->adminReportComment();
	require('view/backend/reportCommentsView.php');
}

function deleteComment($id) {
	$commentManager = new delalande\forteroche\model\CommentManager();
	$commentManager->adminDelete($id);

	header('Location: index.php?action=admincomments');
}

function checkComment($id) {
	$commentManager = new delalande\forteroche\model\CommentManager();
	$commentManager-> adminCommentChecked($id);

	header('Location: index.php?action=adminreportcomments');
}



