<?php 
//usaremos autoload una vez creado este archivo
require_once './autoload.php';

//una ves listada los elementos de la lista, inyectaremos los objetos en el html mediante el php
//en la lista categorias
$lista = CategoriasDAO::listar(); //si por error se escribe ProductosDAO la lista sera de los productos en el desplegable de categorias

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
		
		<!--usaremos el bootstrap swicht y usaremos el jquery como indica el tutorial para modificar el checkbox-->
		<script>
			$(function(){
				$('[name="estado"]').bootstrapSwitch();
			});
		</script>
		<!--se coloca name = "estado" como en el input, en el codigo html lineas abajo-->
		
		
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
		
        <!--contenedor-->
        <div class="container-fluid">
            <!--se creara el archivo productos-registrar.php para mostrar la lista ingresada. El enctype es importante para subir archivos-->
            <form action="productos-registrar.php" method="POST" enctype="multipart/form-data">
            
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Registro de Productos</h3>
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <label for="categorias_id">Categoría</label>
                            <select name="categorias_id" id="categorias_id" class="form-control" required="">
                                <option value="" selected="" disabled="">Seleccione una categoría</option>
                                
								<!--ingresamos como valor el id del elemnto categoria y el nombre de la categoria como la lista a seleccionar-->
								<?php foreach ($lista as $categoria) { ?>
								<option value=" <?=$categoria->id?> "><?=$categoria->nombre?></option>
								<?php } ?>
								
								
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required="" maxlength="100" placeholder="Ingrese el nombre">
                        </div>
                        
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                                <div class="input-group-addon">S/.</div>
                                <input type="number" id="precio" name="precio" class="form-control" placeholder="Ingrese el precio">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" id="stock" name="stock" class="form-control" min="0" max="1000" placeholder="Ingrese el nombre">
                        </div>
                        
                        <div class="form-group"><!--se agrega la palabra ckeditor a la classs form control para convertirlo en un editor de texto-->
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control ckeditor"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" id="imagen" name="imagen" class="form-control">
                        </div>
                        
                        <input type="checkbox" name="estado" data-on-text="Activo" data-off-text="Inactivo" value="1" checked="">

                    </div>

                    <div class="panel-footer">
                        <input type="submit" value="Registrar" class="btn btn-primary"/>
                    </div>

                </div>
                
            </form>
            
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
