<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=workshop-indra",
			            "root",
			            "Colombia.2022");

		$link->exec("set names utf8");

		return $link;

	}

}