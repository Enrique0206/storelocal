<?php
require_once './autoload.php';
try {
    
    $id = $_GET['id'];//obtener el id seleccionado 
	
    $producto = ProductosDAO::obtener($id);
    //este file va a estar constituido por la constante que tiene la ruta y se aplicar el metodo y funcion sobre imagen
    $filename = Constantes::RUTA_IMAGENES . $producto->imagen;
    
    header("Content-type: ".$producto->imagen_tipo);
    header("Content-Length: ".$producto->imagen_tamanio); 
    header("Content-Disposition: inline; filename=".$producto->imagen); //'Content-Disposition: attachment' si se quiere forzar la descarga

    echo file_get_contents($filename);
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}