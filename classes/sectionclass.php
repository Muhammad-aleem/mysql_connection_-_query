<?php
include('connect.php');

class SectionData extends Database
{
	public function SavesectionData($sectionname,$degree,$student){
    $obj=" INSERT INTO section(`sectionname`,`degree`,`student`) VALUES ('$sectionname','$degree','$student')"; 

      

     $query=$this->db->prepare($obj);
   $query->execute();
 
	}
	public function getAllsectionData(){
 	
 	$obj="SELECT *FROM section";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 }
 	public function getAlldegreeData(){
 	
 	$obj="SELECT *FROM degree";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 }
 	 public function getAllstudentData(){
 	
 	$obj="SELECT *FROM student";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 public function getSinglesectionData($id){
	 	$obj="SELECT * FROM section WHERE section_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
  	 public function deletesectionData($id)
 	{
	 	$obj="DELETE FROM section WHERE section_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	  public function updatesectionData($sectionname,$id)
	 {
	 	 $obj="UPDATE section SET sectionname='$sectionname' WHERE section_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

}
?>