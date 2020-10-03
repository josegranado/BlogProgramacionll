<?php
	require_once dirname(dirname(__FILE__)).'/database.php';
	require_once dirname(dirname(__FILE__)).'/models/User.php';
	class UserController
	{
		public function __construct()
		{

		}
		/*public function index()
	    {

	    }*/
	    public static function login($user, $conn)
	    {
	    	$records = $conn->prepare("SELECT * FROM usuarios WHERE login = :login");
		    $records->bindParam(':login', $user['login']);
		    $records->execute();
		    $results = $records->fetch(PDO::FETCH_ASSOC);    
		    if (($results) && (password_verify($user['clave'], $results['clave']))) 
		    {
		      	return $results['id'];
		    } else
		    {
		    	return null;
		    }
		}
	}