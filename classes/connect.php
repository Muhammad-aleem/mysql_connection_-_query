<?php
class Database{
 private $username;
 private $host;
 private $password;
 private $dbname;
 protected $db;
 public function __construct(){
 	$this->username='root';
 	$this->host='localhost';
 	$this->password='';
 	$this->dbname='smg';

 	$this->db=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
 	if (!$this->db) {
 		echo "not connected";
 		
 	}
 }
}




?>