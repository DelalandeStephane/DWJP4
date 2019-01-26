<?php

namespace delalande\forteroche\model ;
require('manager.php');
class PostManager extends Manager
{
	public function __construct() {
		$this->db= $this->dbConnect();
	}

	public function adminPosts () {
		$req = $this->db->query('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%i\') AS update_date_fr FROM chapter');
		 return $req;
	}

	public function getPosts($page)
	{	
		$count = $this->db->query('SELECT COUNT(*) AS total from chapter');
		$result = $count->fetch();
		$total = $result['total'];
		$nbPages = ceil($total/3);	
		$start = ($page-1) * $nbPages;
	    $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter ORDER BY creation_date  LIMIT '.$start.' , 2');
	    return $req;
	}
	public function getPost($chapterId)
	{
	    $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter WHERE id = ?');
	    $req->execute(array($chapterId));
	    $post = $req->fetch();
	    return $post;
	}
	public function sendPost($title, $content){
		$chapter =$this->db->prepare('INSERT INTO chapter(title , content, creation_date) VALUES(?,?, NOW())');
		$send = $chapter->execute(array($title,$content));
	    return $send;
	}
	public function getPage() {
		$count = $this->db->query('SELECT COUNT(*) AS total from chapter');
		$result = $count->fetch();
		$nbPages = ceil($result['total']/3);
		return $nbPages;
	}

}