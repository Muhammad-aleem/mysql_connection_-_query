<?php
include('connect.php');


class InvoicesData extends Database
{

public function SaveinvoicesData($class,$section,$student,$phone,$rollno,$amount,$date){
 	  $obj="INSERT INTO invoices(`class`,`section`,`student`,`phone`,`rollno`,`amount`,`date`) 
 	 VALUES('$class','$section','$student','$phone','$rollno','$amount','$date')";


	$query=$this->db->prepare($obj);
	$query->execute();
}	

	public function getAllinvoiceData(){
 	
 	$obj="SELECT invoices_id,degree.degreename,section.sectionname,invoices.phone,invoices.rollno,invoices.amount,invoices.date,student.studentname ,paid FROM section INNER JOIN invoices ON section.section_id=invoices.section INNER JOIN degree ON
degree.degree_id=invoices.class INNER JOIN student ON student.student_id=invoices.student";

 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 }
 public function getinvoicesData($degree){

 	
 	 $obj="SELECT * FROM section WHERE degree=$degree";

 	
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 
	}
	public function getinvoicesData2($degreeid,$sectionid){

 	
 	  $obj="SELECT * FROM student WHERE degree=$degreeid AND section=$sectionid"; 	
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
 		public function getAllsectionData(){
 	
 	$obj="SELECT *FROM section";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
  public function getSingleinvoiceData($id){
	 	$obj="SELECT * FROM invoices WHERE invoices_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	  public function getSingleinvoiceData2(){
	 	 // $obj="SELECT * FROM invoices WHERE invoices_id=$viewid";
	  	$obj=" SELECT  invoices_id,degree.degreename,section.sectionname,invoices.phone,invoices.rollno,invoices.amount,invoices.date,student.studentname ,paid FROM section INNER JOIN invoices ON section.section_id=invoices.section INNER JOIN degree ON
degree.degree_id=invoices.class INNER JOIN student ON student.student_id=invoices.student";
	 
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}

	 public function deleteinvoicesData($id)
 	{
	 	$obj="DELETE FROM invoices WHERE invoices_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	 public function editinvoicesData($class,$sectionname,$student,$phone,$rollno,$amount,$date,$invoices_id)
	 {
	 	 $obj="UPDATE invoices SET class='$class',sectionname='$sectionname' student='$student',phone='$phone',rollno='$rollno',amount='$amount',date='$date' WHERE invoices_id=$invoices_id";
	 	 
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }



	
}


?>