<?php
 
class CategoriasDAO {	
	
	public static function listar (){		
		
		$con = Conexion::getConexion();		
	
		$sql ="select * from  categorias";		
		
		$stmt = $con->prepare($sql);
		$stmt->execute();
		
		$registro = [];
		while($registro = $stmt->fetchObject('Categoria')){			
			$lista []= $registro; 
		}		
		
		return $lista ;		
		
	}	

}


		
	
