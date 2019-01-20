<?php

namespace delalande\forteroche\model ;
require('manager.php');
class PostManager extends Manager
{
	public function getPosts()
	{
	    $db = $this->dbConnect();
	    $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapter ORDER BY creation_date DESC LIMIT 0, 2');
	    return $posts;
	}
}