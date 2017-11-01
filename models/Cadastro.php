<?php

class Cadastro extends Model{
	
	private $nome;
	private $senha;
	private $conta;
	private $agencia;	
	
	public function __construct(){
		parent::__construct();
		$this->cadastro();
	}

	private function cadastro(){
		
		if(isset($_POST['nome']) && !empty($_POST['nome'])){			
			if(isset($_POST['senha']) && !empty($_POST['senha'])){
				
				$this->nome = addslashes($_POST['nome']);
				$this->senha = md5(addslashes($_POST['senha']));
				$this->agencia = rand(0,9999);
				$this->conta = rand(0,999);
				$saldo = 0;
					
				$sql = $this->db->prepare("INSERT INTO contas (titular, senha, agencia, conta, saldo) VALUES (:titular, :senha, :agencia, :conta, :saldo)");
				$sql->bindValue(':titular', $this->nome);
				$sql->bindValue(':senha', $this->senha);
				$sql->bindValue(':agencia', $this->agencia);
				$sql->bindValue(':conta', $this->conta);
				$sql->bindValue(':saldo', $saldo);
				$sql->execute();
			}
		}		
	}
	
	public function getAgencia(){		
		return $this->agencia;
	}
	
	public function getConta(){		
		return $this->conta;
	}
}
?>