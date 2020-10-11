<?php
	require_once(dirname(dirname(__FILE__)).'/database.php');
	class Tag
	{
		public static function all($conn)
		{
			try
			{
				$tags = $conn->prepare("SELECT * FROM etiquetas");
    			$tags->execute();
				$results = $tags->fetchAll();
				return $results;
			}
			catch( PDOException $e)
		    {
		    	die('Connection Failed: ' . $e->getMessage());
		    }
		}
		public static function create($tag, $conn)
		{
		    try
		    {
		    	$created = $conn->prepare("INSERT INTO etiquetas (nombre, description) VALUES (:nombre, :description )");
		    	$created->bindParam(':nombre', $tag['nombre']);
		    	$created->bindParam(':description', $tag['description']);
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
				$records = $conn->prepare('SELECT * FROM etiquetas WHERE id = :id');
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
		public static function update($tag, $id, $conn)
		{
			try
			{
				$updated = $conn->prepare('UPDATE etiquetas SET 
				nombre = :nombre, 
				description = :description
				WHERE id = :id
				');
				$updated->bindParam(':id', $id);
				$updated->bindParam(':nombre', $tag['nombre']);
                $updated->bindParam(':description', $tag['description']);
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
				$deleted = $conn->prepare('DELETE FROM etiquetas WHERE id = :id');
				$deleted->bindParam(':id', $id);
				return $deleted->execute();
			}
			catch(PDOException $e)
			{
				die('Connection failed'. $e->getMessage());
			}
		}
	}