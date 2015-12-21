<?php
	error_reporting(0);
	function db(){
		$db = new Mysqli("localhost","root","","main");						
		if($db->errno)
			die("Error al conectar");	
		return $db;
	}