<?php

class Controller_Utilities{
	public function getLink($page, array $data = null){
		$str= 'loc=' . $page;
		if(!is_null($data)){
			$str.='&';
			foreach ($data as $key => $value) {
				$str .= $key . '=' . $value . '&'; 
			}
			$str = substr($str, 0, strlen($str)-1);
		}
		//return ' href="'.$_SERVER['PHP_SELF'].'?' . $str .'" '; 
        return ' href="?' . $str .'" '; 
	}
	public function getDataAttr($accion, $producto = null){
        $str = '';
        if(!is_null($producto)){
            foreach ($producto as $key => $value) {
                if(!is_null($value)){
                    $str .= ' data-'.$key .'="'.$value.'"';
                }
            }
        }
        
        $str .= ' data-accion="'.$accion.'"';
        return $str;
    }
    public function popOver($titulo, $mensaje)
    {
    	return ' data-toggle="popover" title="'.$titulo.'" data-content="'.$mensaje.'" ';
    }
}