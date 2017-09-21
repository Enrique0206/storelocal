<?php
//con este vard_dump vemos que el $_POST alamacena los datos
//var_dump($_POST);

//cuando se carga un archivo lo almacena el $_FILES, que contien ademas el type, tmp_name, el error(para ver si cargo)
// si cargo es 0 y sino es 1. y el size (tamaño del archivo)
//var_dump($_FILES);

require_once './autoload.php';

try{
    //si no existe el pos categoria_id o esta vacio entonces mostrar el die
    if(!isset($_POST['categorias_id']) || $_POST['categorias_id'] == '')
        die('Debe indicar una categoria');
    
	//si la imagen esta cargado y es pesa mas de 1048576
    if($_FILES['imagen']['error']==0 && $_FILES['imagen']['size'] > 1048576)
        die('Archivo demasiado grande ( > 1MiB)');
    
    // queda [pendiente hacer mas validaciones
    
	//instanciando Producto y encapsulando los datos recogidos mediante le metodo post
    $producto = new Producto();
	
    $producto->categorias_id = $_POST['categorias_id'];
    $producto->nombre = $_POST['nombre'];
    $producto->descripcion = $_POST['descripcion'];
    $producto->precio = $_POST['precio'];
    $producto->stock = $_POST['stock'];
    $producto->estado = (isset($_POST['estado']))?1:0; //si existe (esta seteado) el estado sera 1 sino sera 0
    
    if($_FILES['imagen']['error']==0){
        $producto->imagen = $_FILES['imagen']['name']; // el documento tiene el atributo name se puede ver cuando hagamos un var_dump al FILE
        $producto->imagen_tipo = $_FILES['imagen']['type']; // el documento tiene el atributo name
        $producto->imagen_tamanio = $_FILES['imagen']['size']; // el documento tiene el atributo name
        
        if (!file_exists(Constantes::RUTA_IMAGENES)) {
            mkdir(Constantes::RUTA_IMAGENES, 0777, true); 
        }
        //movemos el archivo cargado en la ruta temporal (tmp_name) hacia la constante RUTAS_MAGENES (ver constantes, clases common)
		//podemo cambiarle de carpeta. ver classes common archivo cosntantes. Y con $_FILES['imagen']['name'] definimos el nombe del archivo.
		//entonces se define la ruta y el nombre del archivo
        move_uploaded_file($_FILES['imagen']['tmp_name'], Constantes::RUTA_IMAGENES . $_FILES['imagen']['name']);
    }
    
    ProductosDAO::registrar($producto);
    
	//se ingresa codigo php para la visualizacion del mensaje despues del bloque navegador ver coemntarios de ubicacion
    Flash::success('Registro guardado satisfactoriamente');
    
    // el header nos redireccionara al lugar que le designemos, en este caso a la tabla de la lista para evitar reenviar el registro y se duplique el almacenamiento
	header('location:productos-listar.php');
        
} catch (Exception $ex) {
    die('Error: '  . $ex->getMessage());
}