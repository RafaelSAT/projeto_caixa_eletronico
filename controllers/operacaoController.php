<?php

class operacaoController extends Controller{
	
	public function index(){
		
		if(isset($_POST['id']) && !empty($_POST['id'])){
						
			$id = addslashes($_POST['id']);		
			$tipo = addslashes($_POST['tipo']);
			$saldo = addslashes($_POST['saldo']);
			
			if($tipo == 1){
				
				$deposito = str_replace(',','.', addslashes($_POST['txtDeposito']));
				$deposito = floatval($deposito);
				
				$operacao = new Operacao($id);
				$operacao->getDeposito($tipo, $deposito);
				
				$info = new Principal($id);
				$dados = array(
					'titular' => $info->getTitular(),
					'agencia' => $info->getAgencia(),
					'conta' => $info->getConta(),
					'saldo' => $info->getSaldo()
				);
				
				$this->loadView('principal', $dados);			
				
			}else{
				
				$saque = str_replace(',','.', addslashes($_POST['txtSaque']));
				$saque = floatval($saque);
				
				if($saldo >= $saque){
					
					$operacao = new Operacao($id);
					$operacao->getSaque($tipo, $saque);
				
					$info = new Principal($id);
					$dados = array(
						'titular' => $info->getTitular(),
						'agencia' => $info->getAgencia(),
						'conta' => $info->getConta(),
						'saldo' => $info->getSaldo()
					);
				
					$this->loadView('principal', $dados);
				}else{
					
					$info = new Principal($id);
					$dados = array(
						'titular' => $info->getTitular(),
						'agencia' => $info->getAgencia(),
						'conta' => $info->getConta(),
						'saldo' => $info->getSaldo()
					);
				
					$this->loadView('principal', $dados);
					echo "<h1 style='color:red;text-align:center;'>Saldo Insuficiente</h1>";
				}	
			}
		}else{
			$this->loadView('home');
		}

	}
}
?>