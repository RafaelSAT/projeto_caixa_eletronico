<?php

class Operacao extends Model{
	
	private $id;
	private $tipo;
	private $deposito;
	private $saque;
	
	public function __construct($id){
		parent::__construct();
		$this->id = $id;
	}
	
	private function deposito(){
		
		$sql = $this->db->prepare('INSERT INTO historico(id_conta, valor, tipo, data_operacao) VALUES(:id_conta, :valor, :tipo, NOW())');
		$sql->bindValue(':id_conta', $this->id);
		$sql->bindValue(':valor', $this->deposito);
		$sql->bindValue(':tipo', $this->tipo);
		$sql->execute();
		
		$sql = $this->db->prepare('UPDATE contas SET saldo = saldo + :valor WHERE id = :id');
		$sql->bindValue(':valor', $this->deposito);
		$sql->bindValue(':id', $this->id);
		$sql->execute();		
	}
	
	private function saque(){
		
		$sql = $this->db->prepare('INSERT INTO historico(id_conta, valor, tipo, data_operacao) VALUES(:id_conta, :valor, :tipo, NOW())');
		$sql->bindValue(':id_conta', $this->id);
		$sql->bindValue(':valor', $this->saque);
		$sql->bindValue(':tipo', $this->tipo);
		$sql->execute();
		
		$sql = $this->db->prepare('UPDATE contas SET saldo = saldo - :valor WHERE id = :id');
		$sql->bindValue(':valor', $this->saque);
		$sql->bindValue(':id', $this->id);
		$sql->execute();		
	}
	
	public function getDeposito($tipo, $deposito){
		$this->tipo = $tipo;
		$this->deposito = $deposito;
		$this->deposito();
	}
	
	public function getSaque($tipo, $saque){
		$this->tipo = $tipo;
		$this->saque = $saque;
		$this->saque();
	}
}
?>