<?php 
class Controller_Controller{
	public function sendToView($vista, $data = null){
		if(file_exists('./View/' . $vista . '.php')){
			
			require './View/' . $vista . '.php';	
		}
		
	}
}

?>