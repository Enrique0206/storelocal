<?php
require_once './autoload.php';



$action = $_GET['action'];
switch ($action){
	case 'A':
		
		//recuperamos el producto de la bd
		$id = $_GET['id'];
		$producto = ProductosDAO::obtener($id);

		//iniciamos el carrito nueva session
		$carrito = new Carrito();
		if (isset($_SESSION['carrito'])) 	
			$carrito = $_SESSION['carrito'];

		//añadimos un nuevo producto
		$carrito->agregarProducto($producto);

		//actualizamos el carrito de la sesion
		$_SESSION['carrito'] = $carrito;
		
		$productos = $carrito->obtenerProductos();
		
		break;
		
	case 'v';
		//iniciamos carrito nueva session
		$carrito = new Carrito();
		if(isset($_SESSION['carrito']))
			$carrito = $_SESSION['carrito'];
		
		$productos = $carrito->obtenerProductos();
		
		break;
		
	case 'R':		
		//iniciamos carrito nueva session
		$carrito = new Carrito();
		if(isset($_SESSION['carrito']))
			$carrito = $_SESSION['carrito'];
		
		$carrito->vacear();
		
		$productos = $carrito->obtenerProductos();
		
		break;
		
	default :
		break;
		
	
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
		<!--bootstrap css-->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/> 
		<!--bootstrap css-->	
        
        <!--bootstrap js mas jquery-->
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
		<!--bootstrap js mas jquery-->		
		
		<!--bootstrapswitch-->
		<link href="css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
		<script src="js/bootstrap-switch.min.js" type="text/javascript"></script>
		<!--bootstrapswitch-->
		
		<!--ckeditor-->
		<script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>
		<!--ckeditor-->
		
		<!--Bootstrap daterpicker-->
		<link href="css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker-locales/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
		<!--Bootstrap daterpicker-->
		
		<!--colorbox-->
		<link href="css/colorbox.css" rel="stylesheet" type="text/css"/>
		<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>
		<!--colorbox-->
		
		<!--colorbox-->
		<script src="js/bootbox.min.js" type="text/javascript"></script>
		<!--bootbox-->	
        
    </head>
	
    <body>
        
         <!--navegador-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- logo -->
                <div class="navbar-header">
                    <!-- boton para el menu desplegable -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img alt="Brand" src="img/logo.png" height="24">
                      </a>
                </div>
                
                <!-- menu de opciones -->
                <div class="collapse navbar-collapse" id="top-menu">
                    
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="contactos.php">Contacto</a></li>
                        
                        <!-- dropdown -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="roles-listar.php">Roles</a></li>
                                <li><a href="usuarios-listar.php">Usuarios</a></li>
                                <li><a href="categorias-listar.php">Categorias</a></li>
                                <li><a href="productos-listar.php">Productos</a></li>
                                <li><a href="clientes-listar.php">Clientes</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Configuración</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="productos-reporte.php">Reporte de Stock</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="logout.php">Salir</a></li>
                    </ul>
                    <p class="navbar-text navbar-right">Bienvenido</p>
                    
                </div>
                
            </div>
        </nav>
		<!--navegador-->
        
         <div class="container-fluid">
			 
			 <div class="well">
				 <a href="catalogo-carrito.php?action=R" class="btn btn-danger">vacear</a>
			 </div>
			 
		
			 <table class="table">
				 <thead>
					<th>ID</th> 
					<th>Nombres</th>
					<th>Precios</th>
				 </thead>
				 <tbody>
					 <?php foreach ($productos as $producto){?>
					 <tr>
						 <td><?=$producto->id?></td>
						 <td><?=$producto->nombre?></td>
						 <td><?=$producto->getPrecioAsString()?></td>
					 </tr>
					 <?php }?>
				 </tbody>
			 </table>
			 
			 
            
		
		 </div>

				  
        <footer class="footer">
            <div class="container-fluid">
                <p class="text-muted text-center">Lima, Tecsup <?= date('Y') ?>.</p>
            </div>
        </footer>
			 
		 </div>
        
    </body>
</html>

