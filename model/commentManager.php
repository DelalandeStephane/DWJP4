<?php
namespace delalande\forteroche\model ;
require_once('model/Manager.php');

class CommentManager extends Manager 
{
	public function postComment($chapterId, $author, $comment)
	{
		$db= $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comment(chapter_id, name, comment, comment_date, report) VALUES (?,?,?, NOW(),0)');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));
	    return $affectedLines;
	}
	public function getComments($chapterId)
	{
		$db= $this->dbConnect();
	    $comments = $db->prepare('SELECT id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE chapter_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($chapterId));

	    return $comments;
	}
	public function reportComment($id) {
		$db = $this->dbConnect();
		$comment = $db->prepare('UPDATE comment SET report = ? WHERE id=?');
		$comment->execute(array(1,$id));
		return $comment;
	}
}