<?php

class Controller{
	
	public function loadView($nomeView, $viewDados = array()){
		extract($viewDados);
		require 'views/'.$nomeView.'.html';
	}	
}
?>