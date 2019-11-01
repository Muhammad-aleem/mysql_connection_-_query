<?php
include('connect.php');

class Data extends Database
{
	public function savefees($feestype){
		$obj="INSERT INTO fees(`feestype`) VALUES ('$feestype')";
		 $query=$this->db->prepare($obj);
   $query->execute();
	}


	public function getAllfeesData(){

 	
 	$obj="SELECT *FROM fees";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 
	}


public function getSinglefeesData($id){
	 	$obj="SELECT * FROM fees WHERE fees_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	 public function deletefeesData($id)
 	{
	 	$obj="DELETE FROM fees WHERE fees_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

	   public function updatefeesData($feestype,$id)
	 {
	 	$obj="UPDATE fees SET feestype='$feestype' WHERE fees_id=$id";

	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	
}


?>