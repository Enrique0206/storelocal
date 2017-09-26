<?php

class Carrito{
	
	private $lista;
	
	public function __construct() {
		$this->lista = [];
	}
	
	public function agregarProducto ($producto){
		$this->lista[] = $producto;
	}
	
	public function obtenerProductos(){
		return $this->lista;
	}
}