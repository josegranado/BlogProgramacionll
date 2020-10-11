<?php
	require_once(dirname(dirname(__FILE__)).'/database.php');
	class Producto
	{
		private $table = 'publicaciones';
		public static function all($id, $conn)
		{
			try
			{
				$productos = $conn->prepare("SELECT * FROM producto WHERE usuario_id=:id");
				$productos->bindParam(':id', $id);
    			$productos->execute();
				$results = $productos->fetchAll();
				return $results;
			}
			catch( PDOException $e)
		    {
		    	die('Connection Failed: ' . $e->getMessage());
		    }
		}
		public static function create($producto, $conn)
		{
		    try{
		    	$created = $conn->prepare("INSERT INTO producto (title, description, content, price, usuario_id) VALUES (:title, :description, :content, :price, :usuario_id )");
		    	$created->bindParam(':title', $producto['title']);
		    	$created->bindParam(':description', $producto['description']);
                $created->bindParam(':content', $producto['content']);
                $created->bindParam(':price', $producto['price']);
		    	$created->bindParam(':usuario_id', $producto['usuario_id']);
		    	
		  		return $created->execute();
		    }
		    catch( PDOException $e)
		    {
		    	die('Connection Failed: ' . $e->getMessage());
		    }
		}
		public static function find($id, $conn)
		{
			try
			{
				$records = $conn->prepare('SELECT * FROM producto WHERE id = :id');
    			$records->bindParam(':id', $id);
    			$records->execute();
    			$results = $records->fetch(PDO::FETCH_ASSOC);
    			return $results;
			}
			catch(PDOException $e)
			{
				die('Connection FAiled: '. $e->getMessage());
			}
		}
		public static function update($producto, $id, $conn)
		{
			try
			{
				$updated = $conn->prepare('UPDATE producto SET 
				title = :title, 
				description = :description,
				content = :content,
                price = :price
				WHERE id = :id
				');
				$updated->bindParam(':id', $id);
				$updated->bindParam(':title', $producto['title']);
		    	$updated->bindParam(':description', $producto['description']);
                $updated->bindParam(':content', $producto['content']);
                $updated->bindParam(':price', $producto['price']);
				return $updated->execute();
			}
			catch( PDOEXception $e)
			{
				die('Connection FAiled: '. $e->getMessage());
			}
		}
		public static function delete($id, $conn)
		{
			try
			{
				$deleted = $conn->prepare('DELETE FROM producto WHERE id = :id');
				$deleted->bindParam(':id', $id);
				return $deleted->execute();
			}
			catch(PDOException $e)
			{
				die('Connection failed'. $e->getMessage());
			}
		}
	}