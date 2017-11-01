<?php
require '../config.php';
session_start();

global $db;

if(isset($_POST['agencia']) && !empty($_POST['agencia'])){
	
	if(isset($_POST['conta']) && !empty($_POST['conta'])){
		
		if(isset($_POST['senha']) && !empty($_POST['senha'])){
			
			$agencia = addslashes($_POST['agencia']);
			$conta = addslashes($_POST['conta']);
			$senha = md5(addslashes($_POST['senha']));
			
			$sql = $db->prepare('SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha');
			$sql->bindValue(':agencia', $agencia);
			$sql->bindValue(':conta', $conta);
			$sql->bindValue(':senha', $senha);
			$sql->execute();						
			
			if($sql->rowCount() > 0){				
				$sql = $sql->fetch();				
				$_SESSION['id'] = $sql['id'];
				$status = 1;				
				echo $status;
			}else{
				$status = 2;
				echo $status;
			}
			
		}else{
			echo 'Campo de Senha em branco!';
		}
		
	}else{
		echo 'Campo Conta em branco!';
	}
	
}else{
	echo 'Campo Agencia em branco!';
}
?>