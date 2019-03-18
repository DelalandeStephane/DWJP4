<?php

namespace forteroche ;
require_once('manager.php');
require_once('article.php');
class PostManager extends Manager
{
	public function __construct() {
		$this->db= $this->dbConnect();
	}
	//affichage articles zone admin
	public function adminPosts () {
		$req = $this->db->query('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDate, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%i\') AS updateDate FROM chapter ORDER BY chapter_index');

		while ($data = $req->fetch())
        {
        	$chapters[] = new Article($data);  
        }
        if(isset($chapters)){
   			 return  $chapters;     	
        } 
	}
	//Suprimmer un chapitre
	public function adminDelete ($id) {
		$req=$this->db->prepare('DELETE FROM chapter WHERE id = ?');
		$deleted = $req->execute(array ($id));
		return $deleted;
	}
	//modification d'un article
	public function adminUpdate ($data) {

		$req=$this->db->prepare('UPDATE chapter SET chapter_index = :chapterIndex, title = :title ,content = :content ,update_date = NOW() WHERE id = :id ');

		$req->bindValue(':chapterIndex', $data->getChapter_index(), \PDO::PARAM_INT);
		$req->bindValue(':title', $data->getTitle(), \PDO::PARAM_STR);
		$req->bindValue(':content', $data->getContent(), \PDO::PARAM_STR);
		$req->bindValue(':id', $data->getid(), \PDO::PARAM_INT);

		$req->execute();
	}
	//Récuperer les articles 'home'
	public function getPosts($page)
	{	
		$start = ($page-1) * 2;
	    $req = $this->db->prepare('SELECT * FROM chapter ORDER BY chapter_index  LIMIT :start,2');
		$req->bindValue(':start', $start, \PDO::PARAM_INT);
		$req->execute();

		while ($data = $req->fetch())
        {
        	$chapters[]= new Article($data);  
        }
        if(isset($chapters)){
     		return  $chapters;   	
        }
	}
	//affichage page single
	public function getPost($chapterId)
	{
	    $req = $this->db->prepare('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDate FROM chapter WHERE id = ?');
	    $req->execute(array($chapterId));
	   
		$data = $req->fetch();
        	$chapter = new Article($data);       	
	    return $chapter;
	}
	//envoi des chapitres dans la base de données
	public function sendPost($data){
		$req = $this->db->prepare('INSERT INTO chapter(chapter_index, title, content, creation_date) VALUES(:chapterIndex, :title, :content, NOW())');
		$req->bindValue(':chapterIndex', $data->getChapter_index(), \PDO::PARAM_INT);
		$req->bindValue(':title', $data->getTitle(), \PDO::PARAM_STR);
		$req->bindValue(':content', $data->getContent(), \PDO::PARAM_STR);

		 $req->execute();
	}
	//retourne le nombre de page
	public function getPage() {
		$count = $this->db->query('SELECT COUNT(*) AS total from chapter');
		$result = $count->fetch();
		$nbPages = ceil($result['total']/2);
		return $nbPages;
	}
}
