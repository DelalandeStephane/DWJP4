<?php
require('controller/frontend.php');

try {
	if(isset($_GET['acrion'])) {
		if($_GET['action'] == 'listChapters') {
			listChapters();
		}

	}
	else {
		listChapters();
	}

}

catch(Exception $e) {
	echo "Erreur : " . $e->getMessage();

}