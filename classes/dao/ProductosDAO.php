<?php
//creando clase ProductosDAO - la clase DAO solo hace la consulta y devuelve la lista de objetos 
class ProductosDAO {
	
	//creando metodo listar
	public static function listar (){
		
		//llamamos a la clase conexion. Crea o utiliza la que ya existe
		$con = Conexion::getConexion();
		
		// se introduce el query para listar
		$sql ="select p.id, p.categorias_id,c.nombre as categorias_nombre, p.nombre, precio, stock, imagen, creado, estado
				from productos p
				inner join categorias c on c.id=p.categorias_id";
		
		//preparamos la consulta y ejecutamos
		$stmt = $con->prepare($sql);
		$stmt->execute();
		
		//recuperamos cada registro en una la lista y la asociamos en un array $registro		
		$registro = [];
		while($registro = $stmt->fetchObject('Producto')){			
			$lista []= $registro; // no olvidar colocar el [] para que devuelva todo el array de objetos (toda la lista)
		}
		
		//retornamos lista
		return $lista ;
		
		//agregar 'Producto'(nombre de la clase) en el fetchObject solosi se a creado la class Producto en Producto.php (solo para personalizar y crear eventos)
	}
	
	
	
	//creando metodo registar para un nuevo ingreso
	//se debe definir $producto, es el elemento que se definio en el foreach de productos-listar para nombrar al objeto
	public static function registrar($producto) {
        
        $con = Conexion::getConexion();
        
		//los values ingresar como parametro no como cadena o numero, con dos puntos antes del nombre del isert into
        $sql = "insert into productos (categorias_id, nombre, descripcion, precio, stock, estado, imagen, imagen_tipo, imagen_tamanio)
                values (:categorias_id, :nombre, :descripcion, :precio, :stock, :estado, :imagen, :imagen_tipo, :imagen_tamanio)";
        
        $stmt = $con->prepare($sql);
		
        $stmt->bindParam(':categorias_id', $producto->categorias_id);
        $stmt->bindParam(':nombre', $producto->nombre);
        $stmt->bindParam(':descripcion', $producto->descripcion);
        $stmt->bindParam(':precio', $producto->precio);
        $stmt->bindParam(':stock', $producto->stock);
		$stmt->bindParam(':estado', $producto->estado);
		$stmt->bindParam(':imagen', $producto->imagen);
		$stmt->bindParam(':imagen_tipo', $producto->imagen_tipo);
		$stmt->bindParam(':imagen_tamanio', $producto->imagen_tamanio);
                
        $stmt->execute();
        
    }
	
	public static function obtener($id) {
        
        $con = Conexion::getConexion();
        
		//los values ingresar como parametro no como cadena o numero, con dos puntos antes del nombre del isert into
        $sql = "select p.id, p.categorias_id,c.nombre as categorias_nombre, p.nombre, precio, stock, imagen, imagen_tipo, imagen_tamanio, creado, estado
				from productos p
				inner join categorias c on c.id=p.categorias_id
				where p.id = :id"; // la condicion para obtener solo un id
        
        $stmt = $con->prepare($sql);	
		
        $stmt->bindParam(':id', $id);      
                
        $stmt->execute();
		
		//si existe regirstro retornara el primero sino es asi retornara nulo
		if($registro = $stmt->fetchObject('Producto')){			
			return $registro;			
		}
		      
    }
	
	

}


		
	
