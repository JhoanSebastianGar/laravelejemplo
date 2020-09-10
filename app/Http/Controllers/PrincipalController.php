<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class PrincipalController extends Controller{
	public function prueba($variable){
		return "hola ".$variable ;
	}

}