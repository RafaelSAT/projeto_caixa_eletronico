<?php

require 'environment.php';

$config = array();

if(ENVIRONMENT == 'desenvolvimento'){
	
	define("BASE_URL","http://caixa_eletronico.pc/");
	$config['dbname'] = 'caixa_eletronico';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	$config['host'] = 'localhost';
	
}else{
	
	define("BASE_URL","http://caixa_eletronico.pc/");
	$config['dbname'] = 'caixa_eletronico';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	$config['host'] = 'localhost';
	
}

global $db;

try{
	
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	
}catch(PDOException $e){
	echo "ERRO: ".$e->getMessage();
	exit;
}
?>