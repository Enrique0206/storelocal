<?php
    require_once './autoload.php';
	//aca se restringe el acceso. Solo se permite al hacer login 
	require_once './includes/security.php';
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
            
            <h1>Bienvenido</h1>
            
        </div>
        
           <footer class="footer">
            <div class="container-fluid">
                <p class="text-muted text-center">Lima, Tecsup <?= date('Y') ?>.</p>
            </div>
        </footer>

        
    </body>
</html>
