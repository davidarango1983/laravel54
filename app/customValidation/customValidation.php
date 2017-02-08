<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 class customValidation {
  
     
     
     public function dni($value,$parameters){
  
         $letra = strtoupper(substr($parameters, -1));
	$numeros = substr($parameters, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		return true;
	}else{
		return false;
	}
}
         


 }