<?php

class UsuarioDAO{
	
	public static function validar($username, $userpass) {
        
        $con = Conexion::getConexion();
        
        $sql = "select u.id, username, nombres, roles_id, nombres as roles_nombre
                from usuarios u
                inner join roles r on r.id=u.roles_id
                where username=:username and password=:userpass";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userpass', $userpass);
        $stmt->execute();
        
        if($objeto = $stmt->fetchObject('Usuario')){
            return $objeto;
        }
        
        return null;
	}
	
}