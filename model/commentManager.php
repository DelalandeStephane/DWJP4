<?php
namespace delalande\forteroche\model ;
require_once('model/Manager.php');

class CommentManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}
	public function postComment($chapterId, $author, $comment)
	{
		
	    $comments =$this->db->prepare('INSERT INTO comment(chapter_id, name, comment, comment_date, report) VALUES (?,?,?, NOW(),0)');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));
	    return $affectedLines;
	}
	public function getComments($chapterId)
	{
	    $comments =$this->db->prepare('SELECT id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE chapter_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($chapterId));

	    return $comments;
	}
	public function reportComment($id) {
		$comment =$this->db->prepare('UPDATE comment SET report = ? WHERE id=?');
		$comment->execute(array(1,$id));
		return $comment;
	}
	public function adminComment () {
		$req = $this->db->query('SELECT * , DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment');

		return $req;
	}

	public function adminDelete ($id) {
		$req=$this->db->prepare('DELETE FROM comment WHERE id = ?');
		$deleted = $req->execute(array ($id));
		return $deleted;
	}
	public function adminCommentChecked ($id) {
		$req=$this->db->prepare('UPDATE comment SET report = 0  WHERE id = ?');
		$checked = $req->execute(array ($id));
		return $checked;
	}
}