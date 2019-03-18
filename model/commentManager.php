<?php
namespace forteroche;
require_once('model/manager.php');

class CommentManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}

	//envoi des commentaires en base de données
	public function postComment($data)
	{
	    $req =$this->db->prepare('INSERT INTO comment(chapter_id, name, comment, comment_date, report) VALUES (:chapterId,:name,:comment, NOW(),0)');
	    $req->bindValue(':chapterId', $data->getChapter_id());
	    $req->bindValue(':name', $data->getName());
	    $req->bindValue(':comment', $data->getComment());
	    $req->execute();
		return $req;
	}
	// affichage des commentaires
	public function getComments($chapterId)
	{
	    $req =$this->db->prepare('SELECT id, name, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comment WHERE chapter_id = :id ORDER BY comment_date DESC');
	    $req->bindValue(':id',$chapterId, \PDO::PARAM_INT);
	    $req->execute();

	    while ($data = $req->fetch())
        {
        	$comments[]= new Comment($data);  
        }
        if(isset($comments)){
      		return $comments;  	
        }
	
	}
	//reporter commentaire
	public function reportComment($id) {
		$comment =$this->db->prepare('UPDATE comment SET report = ? WHERE id=?');
		$comment->execute(array(1,$id));
		return $comment;
	}
	//affichage backend des commentaires
	public function adminComment () {
		$req = $this->db->query('SELECT * , DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comment');
		while ($data = $req->fetch())
        {
        	$comments[]= new Comment($data);  
        }
        if(isset($comments)){
        	return $comments;
        }
	   
	}
		//affichage des commentaires reportés
		public function adminReportComment () {
		$req = $this->db->query('SELECT * , DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE report = 1');
		
			while ($data = $req->fetch())
	        {
	        	$comments[]= new Comment($data);  
	        }
	        if(isset($comments)){
					return $comments;        	
	        }


	}
	//suppression des commentaires
	public function adminDelete ($id) {
		$req=$this->db->prepare('DELETE FROM comment WHERE id = ?');
		$deleted = $req->execute(array ($id));
		return $deleted;
	}
	// désignaler les commentaires
	public function adminCommentChecked ($id) {
		$req=$this->db->prepare('UPDATE comment SET report = 0  WHERE id = ?');
		$checked = $req->execute(array ($id));
		return $checked;
	}
}