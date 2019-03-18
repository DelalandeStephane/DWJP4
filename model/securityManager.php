<?php
namespace forteroche;
require_once('manager.php');

class SecurityManager extends Manager {

	public function __construct() {
		$this->db= $this->dbConnect();
	}

	public function reqPassword ($name) {
		$req=$this->db->prepare('SELECT * FROM password WHERE name=?');
		$req->execute(array($name));
		$data = $req->fetch();
		$access = new User($data);
		return $access;
	}
	public function updatePassword () {
		
	}
}		







