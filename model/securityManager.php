<?php
namespace delalande\forteroche\model ;
require_once('manager.php');

class SecurityManager extends Manager {

	public function __construct() {
		$this->db= $this->dbConnect();
	}

	public function reqPassword ($name) {
		$req=$this->db->prepare('SELECT * FROM password WHERE name=?');
		$req->execute(array($name));
		$access = $req->fetch();
		return $access;
	}
	public function updatePassword () {
		
	}
}		







