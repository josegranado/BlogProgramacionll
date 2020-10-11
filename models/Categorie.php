<?php
	require_once(dirname(dirname(__FILE__)).'/database.php');
	class Categorie
	{
		public static function all($conn)
		{
			try
			{
				$categories = $conn->prepare("SELECT * FROM categorias");
    			$categories->execute();
				$results = $categories->fetchAll();
				return $results;
			}
			catch( PDOException $e)
		    {
		    	die('Connection Failed: ' . $e->getMessage());
		    }
		}
		public static function create($categorie, $conn)
		{
		    try
		    {
		    	$created = $conn->prepare("INSERT INTO categorias (nombre, description) VALUES (:nombre, :description )");
		    	$created->bindParam(':nombre', $categorie['nombre']);
		    	$created->bindParam(':description', $categorie['description']);
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
				$records = $conn->prepare('SELECT * FROM categorias WHERE id = :id');
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
		public static function update($categorie, $id, $conn)
		{
			try
			{
				$updated = $conn->prepare('UPDATE categorias SET 
				nombre = :nombre, 
				description = :description
				WHERE id = :id
				');
				$updated->bindParam(':id', $id);
				$updated->bindParam(':nombre', $categorie['nombre']);
                $updated->bindParam(':description', $categorie['description']);
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
				$deleted = $conn->prepare('DELETE FROM categorias WHERE id = :id');
				$deleted->bindParam(':id', $id);
				return $deleted->execute();
			}
			catch(PDOException $e)
			{
				die('Connection failed'. $e->getMessage());
			}
		}
	}