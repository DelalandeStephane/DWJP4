<?php

namespace forteroche;

class AutoLoader {

	 static function register(){
        spl_autoload_register(array(__CLASS__, 'downloadClass'));
    }

	static function downloadClass($file) {
 	$file = str_replace('forteroche', '',$file);
 	require_once('model/'.$file.'.php');
	}

}