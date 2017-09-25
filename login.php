<?php
require_once './autoload.php';

try {
	
if(isset($_POST['username'])){
	
	$username = $_POST['username'];
	$userpass = $_POST['userpass'];
	
	$usuario = UsuarioDAO::validar($username, $userpass);
	
	if($usuario !=null){
		$_SESSION['usuario'] = $usuario; // Guardar en la sesión
                Flash::success('Bienvenido al sistema');
                header('location:index.php');
                exit();
            }else{
                Flash::error('Usuario y/o clave inválido');
                header('location:login.php');
                exit();
            }
		
		}
	
	} catch (Exception $ex) {
		echo 'Error General:' . $e->getMessage();
}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Store Local</title>
		
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
        
        <div class="container">
            
            <form action="login.php" method="post"><!--lo vamos a mandar a este mismo archivo el post, para eso creartemos un php arriba-->
                
                <div style="margin-top: 50px" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2 class="panel-title">Ingreso al sistema</h2>
                        </div>
                        <div class="panel-body">   
							
							<?=Flash::show()?>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Ingrese su nombre de usuario" autocomplete="off"/>
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name="userpass" class="form-control" placeholder="Ingrese su contraseña"/>
                            </div>
                            
                            <input type="submit" value="Ingresar" class="btn btn-success btn-block"/>
                            
                        </div>
                    </div>
                    
                </div>
                
            </form>
            
        </div>
        
    </body>
</html>
