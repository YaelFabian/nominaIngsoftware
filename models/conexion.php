<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost:3308;dbname=nomina","root","yolo1234");
		//var_dump($link);

		return $link;

	}

}
/*
$a = new Conexion();
$a->conectar();
*/
?>