<?php

class principalController extends Controller{
	
	public function index(){
		
		if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
			
			$id = addslashes($_SESSION['id']);
			
			$info = new Principal($id);
			$dados = array(
				'titular' => $info->getTitular(),
				'agencia' => $info->getAgencia(),
				'conta' => $info->getConta(),
				'saldo' => $info->getSaldo()
			);
			
			$this->loadView('principal', $dados);
			
		}else{
			$this->loadView('home');
		}	
	}
}

?>