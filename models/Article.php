<?php
	require_once(dirname(dirname(__FILE__)).'/database.php');
	class Article
	{
		private $table = 'publicaciones';
		public static function all($id, $conn)
		{
			try
			{
				$articles = $conn->prepare("SELECT * FROM publicaciones WHERE usuario_id=:id");
				$articles->bindParam(':id', $id);
    			$articles->execute();
				$results = $articles->fetchAll();
				return $results;
			}
			catch( PDOException $e)
		    {
		    	die('Connection Failed: ' . $e->getMessage());
		    }
		}
		public static function create($article, $conn)
		{
		    try
		    {
		    	$created = $conn->prepare("INSERT INTO publicaciones (title, description, content, usuario_id) VALUES (:title, :description, :content, :usuario_id )");
		    	$created->bindParam(':title', $article['title']);
		    	$created->bindParam(':description', $article['description']);
		    	$created->bindParam(':content', $article['content']);
		    	$created->bindParam(':usuario_id', $article['usuario_id']);
		    	
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
				$records = $conn->prepare('SELECT * FROM publicaciones WHERE id = :id');
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
		public static function update($article, $id, $conn)
		{
			try
			{
				$updated = $conn->prepare('UPDATE publicaciones SET 
				title = :title, 
				description = :description,
				content = :content
				WHERE id = :id
				');
				$updated->bindParam(':id', $id);
				$updated->bindParam(':title', $article['title']);
		    	$updated->bindParam(':description', $article['description']);
				$updated->bindParam(':content', $article['content']);
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
				$deleted = $conn->prepare('DELETE FROM publicaciones WHERE id = :id');
				$deleted->bindParam(':id', $id);
				return $deleted->execute();
			}
			catch(PDOException $e)
			{
				die('Connection failed'. $e->getMessage());
			}
		}
	}