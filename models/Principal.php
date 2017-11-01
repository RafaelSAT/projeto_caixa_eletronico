<?php

class Principal extends Model{
	
	private $id;
	private $titular;
	private $agencia;
	private $conta;
	private $saldo;
	
	public function __construct($id){
		parent::__construct();
		$this->id = $id;
		$this->info();
	}
	
	private function info(){
		
		$sql = $this->db->prepare('SELECT * FROM contas WHERE id = :id');
		$sql->bindValue(':id', $this->id);
		$sql->execute();
		
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$this->titular = $sql['titular'];
			$this->agencia = $sql['agencia'];
			$this->conta = $sql['conta'];
			$this->saldo = $sql['saldo'];
		}		
	}
	
	public function getTitular(){return $this->titular;}
	public function getAgencia(){return $this->agencia;}
	public function getConta(){return $this->conta;}
	public function getSaldo(){return $this->saldo;}	
}
?>