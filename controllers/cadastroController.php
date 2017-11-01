<?php

class cadastroController extends Controller{
	
	public function index(){			
						
			$cadastro = new Cadastro();
		
			$dados = array(
			'agencia' => $cadastro->getAgencia(),
			'conta' => $cadastro->getConta()
			);
	
			$this->loadView('cadastro', $dados);
	}	
}
?>