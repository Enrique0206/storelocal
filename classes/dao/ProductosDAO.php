<?php
//creando clase ProductosDAO - la clase DAO solo hace la consulta y devuelve la lista de objetos 
class ProductosDAO {
	
	public static function listar (){
		
		//llamamos a la clase conexion. Crea o utiliza la que ya existe
		$con = Conexion::getConexion();
		
		// se introduce el query para listar
		$sql ="select p.id, p.categorias_id,c.nombre as categorias_nombre, p.nombre, precio, stock, imagen, creado
				from productos p
				inner join categorias c on c.id=p.categorias_id";
		
		//preparamos la consulta y ejecutamos
		$stmt = $con->prepare($sql);
		$stmt->execute();
		
		//recuperamos cada registro en una la lista y la asociamos en un array $registro		
		$registro = [];
		while($registro = $stmt->fetchObject()){			
			$lista []= $registro; // no olvidar colocar el [] para que devuelva todo el array de objetos (toda la lista)
		}
		
		//retornamos lista
		return $lista ;
	}
}
		
	
