<?php
namespace forteroche ;
class Comment 
{
	private $id;
	private $chapter_id;
	private $name;
	private $comment;
	private $commentDate;


	public function __construct(array $data)
  	{
    $this->hydrate($data);
  	}


	public function hydrate(array $data)
	{
  		foreach ($data as $key => $value)
	  	{
		    // On récupère le nom du setter correspondant à l'attribut.
		    $method = 'set'.ucfirst($key);
		    // Si le setter correspondant existe.
		    if (method_exists($this, $method))
		    {
		      // On appelle le setter.
		      $this->$method($value);
		    }
	  	}
	}

	public  function getId() {
		return $this->id;
	}
	public  function getChapter_id() {
		return $this->chapter_id;
	}
	public  function getName() {
		return $this->name;
	}
	public  function getComment() {
		return $this->comment;
	}
	public  function getCommentDate() {
		return $this->commentDate;
	}
	

	public  function setId($id) {
		$this->id = $id;
	}
	public  function setChapter_id($chapterId) {
		$this->chapter_id = $chapterId;
	}
	public  function setName($name) {
		$this->name = $name;
	}
	public  function setComment($comment) {
		$this->comment = $comment;
	}
	public  function setCommentDate($commentDate) {
		$this->commentDate = $commentDate;
	}

}