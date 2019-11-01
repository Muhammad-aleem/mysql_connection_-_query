<?php
include('connect.php');

class SessionData extends Database
{
	public function SavesessionData($sessionname){
      $obj=" INSERT INTO session(`sessionname`) VALUES ('$sessionname')";

     $query=$this->db->prepare($obj);
   $query->execute();
 
	}
	public function getAllsessionData(){
 	
 	$obj="SELECT *FROM session";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 }
 public function getSinglesessionData($id){
	 	$obj="SELECT * FROM session WHERE session_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
  	 public function deletesessionData($id)
 	{
	 	$obj="DELETE FROM session WHERE session_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	  public function updatesessionData($sessionname,$id)
	 {
	 	$obj="UPDATE session SET sessionname='$sessionname' WHERE session_id=$id";

	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

}
?>