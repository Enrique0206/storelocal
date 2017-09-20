<?php
//aca haremos el test que nos servira para mostrar los datos capturados por la clase ProductosDAO
//asociar las clases que vamos a utilizar
require_once '../common/Constantes.php';
require_once '../common/Conexion.php';
require_once './ProductosDAo.php';

//para mostrar la lista de objetos que recuperamos en ProductosDAO.php
//a la $lista del clase ProductosDAO llamamos (::) al metodo listar
$lista = ProductosDAO::listar();

var_dump($lista);
