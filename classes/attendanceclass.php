<?php
include('connect.php');

class Data extends Database
{
	public function SaveAttendanceData($class,$section,$student_id,$present)
	{
		$date=Date('Y-m-d');
  $obj="INSERT INTO attendance(`class`,`section`,`student_id`,`date`,`present`) values('$class','$section',
'$student_id','$date','$present') ";



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
 		 public function getAlldegree1Data(){
 	
 	$obj="SELECT *FROM degree";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 		public function getAllsectionData(){
 	
 	$obj="SELECT *FROM section";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 	
 	public function getattendanceData($degree){

 	
 	 $obj="SELECT * FROM section WHERE degree=$degree";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 
	}
		public function getAllAttendanceData($degree_id,$section_id){

 	
 			 $obj="SELECT * FROM student WHERE degree=$degree_id AND section=$section_id";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 
	}
		public function getStudentsAttendanceData($degree){

 	
 		 $obj="SELECT * FROM student WHERE degree=$degree";

 			
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 
	}
	
		 public function getSingleattendanceData($student_id){
	   $obj="SELECT * FROM student WHERE student_id=$student_id";
	  
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	 public function getSingleStudentAttendance($student_id){
		 	$date = date('Y-m-d');
	 $obj="SELECT * FROM attendance WHERE MONTH(date) = MONTH('$date') AND student_id=$student_id";
	  
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetchAll(PDO::FETCH_ASSOC);
	
	 return $result;
	}


	

 


	
}




?>