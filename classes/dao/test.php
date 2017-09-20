<?php
//aca haremos el test que nos servira para mostrar los datos capturados por la clase ProductosDAO
//asociar las clases que vamos a utilizar
require_once '../common/Constantes.php';
require_once '../common/Conexion.php';
require_once './ProductosDAo.php';
require_once '../dto/Producto.php'; //se agrego cuano se creo la class producto en el archivo Producto.php
require_once './CategoriasDAo.php';//se agrego cuando se creo la class Categoria en el archivo Categoria.php
require_once '../dto/Categoria.php'; //se agrego cuando se creo la class Categoria en el archivo Categoria.php

//para mostrar la lista de objetos que recuperamos en ProductosDAO.php
//a la $lista del clase ProductosDAO llamamos (::) al metodo listar
/*$lista = ProductosDAO::listar();

var_dump($lista);*/


//haremos el test para validar el ingreso de objetos
//hacemos la instancia de la clase Producto
/*$producto = new Producto();
//Al objeto producto creado, le asignamos un valor sobre el atributo indicado
$producto->categorias_id = 1;
$producto->nombre = 'Maxtor';
$producto->descripcion = 'Descripcion de maxtor...';
$producto->precio = 200.90;
$producto->stock = 12;
//ojo que no hemos definido atributos al creal la clase producto (Productos.php)
//php nos permite definir los atributos en caliente. Por esa razon esque la estamos definiendo por este lugar.

//todos estos datos encapsulados en un objeto lo pasamos hacia la class ProductoDAO mediante el metodo registrar
ProductosDAO::registrar($producto);

echo 'producto registrado';*/


//llamando a la lista de la base de datos
$lista = CategoriasDAO::listar();

var_dump($lista);

