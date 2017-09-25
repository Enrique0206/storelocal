<?php
require_once './autoload.php';

//aca se restringe el acceso. Solo se permite al hacer login 
	require_once './includes/security.php';
	
try {
    
    $id = $_GET['id'];
    $estado = $_GET['estado'];
    
    ProductosDAO::cambiarEstado($id, $estado); // se le da los parametros    
	
    Flash::success('Estado de registro actualizado');//aviso de cambio de estado
    
    header('location:productos-listar.php');//se redirecciona una vez actualizado
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
