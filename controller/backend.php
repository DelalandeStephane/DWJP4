<?php

/* Affichage de la vue creation */

function adminRequest($username, $userpw) {
	$securityManager = new forteroche\securityManager();
	$access = $securityManager->reqPassword($username);
	$name= $access['name'];
	$pass = $access['password'];
	if($username == $name && password_verify($userpw, $pass)) {
		$_SESSION['access'] = true;
		require('view/backend/home.php');
	} else {
		$error = "Mauvais identifiant";
		require('view/frontend/password.php');
	}
}

function creationArticle(){
	require('view/backend/creationView.php');
}

function sendChapter($chapterIndex,$title, $content) {
	$postManager = new forteroche\PostManager();
	$postManager->sendPost($chapterIndex, $title, $content);
	header('Location: index.php?action=creationarticle');
} 

function adminListChapters()
{
	$postManager = new forteroche\PostManager();
	$posts = $postManager->adminPosts();
	require('view/backend/chapterListView.php');
}

function deleteChapter($id) {
	$postManager = new forteroche\PostManager();
	$postManager->adminDelete($id);
	header('Location: index.php?action=adminposts');
}

function updateViewChapter($id) {
	$postManager = new forteroche\PostManager();
	$chapter = $postManager->getPost($id);
	require('view/backend/updateChapterView.php');
}

function updateChapter($chapterIndex,$title, $content,$id) {
	$postManager= new forteroche\PostManager();
	$sendPost = $postManager->adminUpdate($chapterIndex, $title, $content,$id);
	header('Location: index.php?action=adminposts');
}

function listComment() {
	$commentManager = new forteroche\CommentManager();
	$comments = $commentManager->adminComment();
	require('view/backend/commentListView.php');
}

function listReportComments() {
	$commentManager = new forteroche\CommentManager();
	$comments = $commentManager->adminReportComment();
	require('view/backend/reportCommentsView.php');
}

function deleteComment($id) {
	$commentManager = new forteroche\CommentManager();
	$commentManager->adminDelete($id);
	header('Location: index.php?action=admincomments');
}

function checkComment($id) {
	$commentManager = new forteroche\CommentManager();
	$commentManager-> adminCommentChecked($id);
	header('Location: index.php?action=adminreportcomments');
}

function adminExit() {
	session_destroy();
	header('Location: index.php');
}