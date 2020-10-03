<?php
$database = [
	'DB_HOST' => 'localhost',
	'DB_USERNAME' => 'root',
	'DB_PORT' => '3306',
	'DB_PASSWORD' => '',
	'DB_NAME' => 'proyecto',
];

try {
	//PDO('mysql:host=localhost:3306;dbname=fernandologin','root','');
  $conn = new PDO('mysql:host='
  					.$database['DB_HOST'].':'
  					.$database['DB_PORT'].';dbname='
  					.$database['DB_NAME'],
  					 $database['DB_USERNAME'],
  					 $database['DB_PASSWORD']);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>