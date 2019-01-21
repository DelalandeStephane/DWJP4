<?php
require('controller/frontend.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'listChapters') {
			if( isset($_GET['page'])) {
				listChapters($_GET['page']);
			}
		}
		elseif ($_GET['action'] == 'chapter'){
			chapter();
		}

	}
	else {
		if( isset($_GET['page'])) {
				listChapters($_GET['page']);
			}
		else {
			listChapters(1);
		}
		
	}
}

catch(Exception $e) {
	echo "Erreur : " . $e->getMessage();

}