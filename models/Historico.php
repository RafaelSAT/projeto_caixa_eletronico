<?php

header('Content-Type:'.'text/plain');
require '../config.php';

global $db;		
$id = addslashes($_POST['id']);

	$sql = $db->prepare("SELECT * FROM historico WHERE id_conta = :id ORDER BY data_operacao DESC");
	$sql->bindValue(':id', $id);
	$sql->execute();	
	
	if($sql->rowCount() > 0){
			
		foreach($sql->fetchAll() as $resultado){
			
			$dados[] = array(
				'data_operacao' => date('d/m/Y H:i', strtotime($resultado['data_operacao'])),
				'valor' => $resultado['valor'],
				'tipo' => $resultado['tipo']
			);			
		}
		echo json_encode($dados, JSON_PRETTY_PRINT);
	}
?>