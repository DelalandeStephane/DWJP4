<?php
namespace forteroche ;
class User 
{
	private $id;
	private $name;
	private $password;


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
	public  function getName() {
		return $this->name;
	}
	public  function getPassword() {
		return $this->password;
	}


	public  function setId($id) {
		$this->id = $id;
	}

	public  function setName($name) {
		$this->name = $name;
	}
	public  function setPassword($password) {
		$this->password = $password;
	}

}