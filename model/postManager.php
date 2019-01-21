<?php

namespace delalande\forteroche\model ;
require('manager.php');
class PostManager extends Manager
{
	public function getPosts($page)
	{
		$db= $this->dbConnect();
		$count = $db->query('SELECT COUNT(*) AS total from chapter');
		$result = $count->fetch();
		$total = $result['total'];
		$nbPages = ceil($total/3);
		$current = $page;
		$start = ($current-1)*$nbPages;
		$p=$start;
	    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter ORDER BY creation_date  LIMIT '.$p.' , 2');
	    return $req;
	}
	public function getPost($chapterId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM chapter WHERE id = ?');
	    $req->execute(array($chapterId));
	    $post = $req->fetch();
	    return $post;
	}

}