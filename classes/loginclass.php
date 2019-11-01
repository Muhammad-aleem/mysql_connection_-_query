<?php
include('connect.php');

class User extends Database
{
	
	
	public function userLogin($username,$password){
 			$obj="SELECT * FROM admin WHERE username='$username' AND password='$password'";

 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetch(PDO::FETCH_ASSOC);
 			$row = $query->rowCount();
 			
 			if($row>0)
 			{
 				session_start();
 				$_SESSION['login'] = $result['username'];
 				header("Location:student.php");
 				exit;
 			}
 			else
 			{
 				return false;
 			}
 		}

}
?>