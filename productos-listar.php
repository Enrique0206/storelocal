<?php 
//llammso a todas las clases creadas para poder traer toda la lista ($lista)
/*require_once './classes/common/Constantes.php';
require_once './classes/common/Conexion.php';
require_once './classes/dao/ProductosDAO.php';
require_once './classes/dto/Producto.php';*/

require_once './autoload.php'; //usaremos autoload

//obteniendo cada elemento de la $lista mediante la clases ProductosDAO y el metodo listar
//para poder llevarlos a la vista en html
$lista = ProductosDAO::listar();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>storelocal</title>
		
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
		
		<!--Adicionando el jquery para el colorbox-->
		<script>
			$(function(){
				$('a.colorbox').colorbox({
					photo: true	
				});				
			});		
		</script>
		<!--Adicionando el jquery para el colorbox-->	
		
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
		
		
		<!--bloque de alertas-->
		<!--llamamos a la clase Flash y al metodo show para mostrar el mensaje-->
		<div class="container-fluid"><?= Flash::show() ?></div>
		<!--bloque de alertas-->
		
        
		<!--contenedor-->
        <div class="container-fluid">
            
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Productos</h3>
                </div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CATEGORÍA</th>
                            <th>MODELO</th>
                            <th>PRECIO</th>
                            <th>IMAGEN</th>
                            <th>ESTADO</th>
                            <th width="50"></th>
                            <th width="50"></th>
                            <th width="50"></th>
                        </tr>
                    </thead>
					<!--aca se ingresara la informacion de los elementos de la lista extraidos en el php con el metodo listar -->
                    <tbody>
                   	<?php foreach ($lista as $producto){ ?>
						<tr>							
							<td><?=$producto->id?></td>
                            <td><?=$producto->categorias_nombre?></td>
                            <td><?=$producto->nombre?></td>
                            <td><?=$producto->precio?></td>
                            <!--<td><?=$producto->imagen?></td>-->
							<!--enlazo la imagen paa que aparezca en la lista  y le agrego ?id= (get) para que me traiga el id progrmamado
							pero el id que yo quiero es <?=$producto->id?>
							luego agregamos un enlace con la misma ruta de la imagen ademas agregando la clase colorbox y el jquery en el bloque head-->
							<td><a href="productos-imagen.php?id=<?=$producto->id?>" class="colorbox"><img src="productos-imagen.php?id=<?=$producto->id?>" height="32"/></a></td>
							<td><?=$producto->estado?></td>
                            
                            <td><a href="" class="btn btn-info">Mostrar</a></td>
                            <td><a href="" class="btn btn-warning">Editar</a></td>
                            <td><a href="" class="btn btn-danger">Eliminar</a></td>
						</tr>
						
					<?php } ?>
                    </tbody>
                </table>
            
                <div class="panel-footer">
                    <a href="productos-nuevo.php" class="btn btn-primary">Nuevo</a>
                </div>
                
            </div>
                
        </div>
		<!--contenedor-->
        
		<!--pie de pagina-->
        <footer class="footer">
            <div class="container-fluid">
                <p class="text-muted text-center">Lima, Tecsup.</p>
            </div>
        </footer>
        <!--pie de pagina-->
    </body>
</html>


<!--insertando objetos en un bloque php
<tbody>
<?php { ?>
<?php } ?>
</tbody>

<tbody>
<?php foreach ($lista as $producto){ ?>
<?php } ?>
</tbody>
se hace un foreach (recorrido) de la $lista y cada elemento se representara en una variable $producto (puede ser cualquier nombre, no necesariamente producto, pero convien que sea igual que la clase creada para personalizar los eventos)
luego llamamos al objeto de esa variable producto mediante una flecha
<?=$producto->id?> por ejemplo el id.
-->