<?php
namespace delalande\forteroche\model ;
class Manager {
	protected function dbConnect ()
		{
	        $db = new \PDO('mysql:host=localhost;dbname=book1;charset=utf8', 'root', '');
	        return $db;
		}
		
}