<?php
namespace forteroche ;
class Article 
{
	private $id;
	private $Chapter_index;
	private $title;
	private $content;
	private $creationDate;
	private $UpdateDate;


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
	public  function getChapter_index() {
		return $this->Chapter_index;
	}
	public  function getTitle() {
		return $this->title;
	}
	public  function getContent() {
		return $this->content;
	}
	public  function getCreationDate() {
		return $this->creationDate;
	}
	public  function getUpdateDate() {
		return $this->UpdateDate;
	}

	public  function setId($id) {
		$this->id = $id;
	}
	public  function setChapter_index($chapIndex) {
		$this->Chapter_index = $chapIndex;
	}
	public  function setTitle($title) {
		$this->title = $title;
	}
	public  function setContent($content) {
		$this->content = $content;
	}
	public  function setCreationDate($creaDate) {
		$this->creationDate = $creaDate;
	}
	public  function setUpdateDate($upDate) {
		$this->UpdateDate = $upDate;
	}
}