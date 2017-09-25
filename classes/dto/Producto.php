<?php

//personalizando nuestra clase con el nombre Producto para poder manejar los eventos como el resultado
//por ejemplo colocar el simbolo dolar al precio cosa que no se podria con la clase stdclass
class Producto {
	//una vez creada la clase lo agregamos en fetchObject() del archivo ProductosDAO, entonces queda
//fetchObject('Producto')
//asi personalizamos nuestra clase
	
	public function getPrecioAsString() {
        //$formatter = new NumberFormatter("es-PE", NumberFormatter::CURRENCY);
       // return $formatter->format($this->precio);
        return 'S/' . $this->precio;
    }

	//creando la funcion activo dentro de la clase producto
	public function getEstado() {
        return $this->estado == 1?"Activo":"Inactivo"; //si el estado es igual a1 es activo sino inactivo
    }
	

}