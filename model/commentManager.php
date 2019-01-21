<?php
namespace delalande\forteroche\model ;
require_once('model/Manager.php');

class CommentManager extends Manager 
{
	public function postComment($chapterId, $author, $comment)
	{
		$db= $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comment(chapter_id, name, comment, comment_date) VALUES (?,?,?, NOW())');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));
	    return $affectedLines;
	}
}