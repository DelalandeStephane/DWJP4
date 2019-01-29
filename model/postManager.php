<?php

namespace delalande\forteroche\model ;
require('manager.php');
class PostManager extends Manager
{
	public function __construct() {
		$this->db= $this->dbConnect();
	}

	public function adminPosts () {
		$req = $this->db->query('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%i\') AS update_date_fr FROM chapter ORDER BY chapter_index');
		 return $req;
	}

	public function adminDelete ($id) {
		$req=$this->db->prepare('DELETE FROM chapter WHERE id = ?');
		$deleted = $req->execute(array ($id));
		return $deleted;
	}

		public function adminUpdate ($chapterIndex, $title, $content, $id) {
		$req=$this->db->prepare('UPDATE chapter SET chapter_index = ?, title = ?,content = ?,update_date = NOW() WHERE id = ? ');
		$updated = $req->execute(array ($chapterIndex, $title, $content, $id));
		return $updated;
	}

	public function getPosts($page)
	{	
		$nbPages = 6;	
		$start = ($page-1) * $nbPages;
	    $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter ORDER BY chapter_index  LIMIT '.$start.' , 2');
	    return $req;
	}
	public function getPost($chapterId)
	{
	    $req = $this->db->prepare('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter WHERE id = ?');
	    $req->execute(array($chapterId));
	    $post = $req->fetch();
	    return $post;
	}
	public function sendPost($chapterIndex, $title, $content){
		$chapter = $this->db->prepare('INSERT INTO chapter(chapter_index, title, content, creation_date) VALUES(?, ?, ?, NOW())');
		$send = $chapter->execute(array($chapterIndex, $title, $content));
	    return $send;
	}
	public function getPage() {
		$count = $this->db->query('SELECT COUNT(*) AS total from chapter');
		$result = $count->fetch();
		$nbPages = ceil($result['total']/3);
		return $nbPages;
	}

}