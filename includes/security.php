<?php
//creando este archivo para la seguridad de accesos a ciertas partes de la pagina
if(!isset($_SESSION['usuario'])){
    Flash::error('No tiene permiso para acceder a este sitio');
    header('location:login.php');
    exit();
}

// incluir solo el require_once './includes/security.php' solo en losa archivos donde se donde se desee mantener la seguridad