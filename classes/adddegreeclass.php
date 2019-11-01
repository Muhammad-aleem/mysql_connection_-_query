<?php
include('connect.php');

class DegreeData extends Database
{
	public function SavedegreeData($degreename){
      $obj=" INSERT INTO degree(`degreename`) VALUES ('$degreename')";

     $query=$this->db->prepare($obj);
   $query->execute();
 
	}
	public function getAlldegreeData(){
 	
 	$obj="SELECT *FROM degree";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 }
 public function getSingledegreeData($id){
	 	$obj="SELECT * FROM degree WHERE degree_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
  	 public function deletedegreeData($id)
 	{
	 	$obj="DELETE FROM degree WHERE degree_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	  public function updatedegreeData($degreename,$id)
	 {
	 	$obj="UPDATE degree SET degreename='$degreename' WHERE degree_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

}
?>