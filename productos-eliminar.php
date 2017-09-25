<?php
require_once './autoload.php';

//aca se restringe el acceso. Solo se permite al hacer login 
	require_once './includes/security.php';
	
try {
    
    $id = $_GET['id'];    
    
    ProductosDAO::eliminar($id); // le damos el parametro a eliminar
	
    Flash::success('Producto eliminado satisfactoriamente');//aviso de cambio de estado
    
    header('location:productos-listar.php');//se redirecciona una vez actualizado
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


