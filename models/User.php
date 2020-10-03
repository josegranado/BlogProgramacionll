<?php
	require_once(dirname(dirname(__FILE__)).'/database.php');
	class User
	{
		private $table = 'usuarios';
		private  $labels = [
			'id' => 'id',
			'nombre' => 'nombre',
			'apellido' => 'apellido',
			'login' => 'login',
			'clave' => 'clave',
			'createdAt' => 'createdAt',
			'updatedAt' => 'updatedAt'
		];
		public static function create($user, $conn)
		{
		    try
		    {
		    	$created = $conn->prepare("INSERT INTO usuarios (nombre, apellido, login, clave, type) VALUES (:nombre, :apellido, :login, :clave, :type )");
		    	$created->bindParam(':nombre', $user['nombre']);
		    	$created->bindParam(':apellido', $user['apellido']);
		    	$created->bindParam(':login', $user['login']);
		    	$password = password_hash($user['clave'], PASSWORD_BCRYPT);
		    	$created->bindParam(':clave', $password );
		    	$created->bindParam(':type', $user['type']);
		    	
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
				$records = $conn->prepare('SELECT * FROM usuarios WHERE id = :id');
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
		public function list()
		{

		}
		public function update()
		{

		}
		public function delete()
		{

		}
	}