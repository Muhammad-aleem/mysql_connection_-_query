<?php
include('connect.php');



class Type extends Database
{
	 public function SavepaymentData($amount,$paymenttype,$date,$invoiceid ){
		 $obj="INSERT INTO payment(`amount`,`paymenttype`,`date`,`invoiceid`) VALUES ('$amount','$paymenttype','$date','$invoiceid')";
		

		$query=$this->db->prepare($obj);
	$query->execute();

	$obj="UPDATE invoices SET paid=1 WHERE invoices_id=$invoiceid";
		

		$query=$this->db->prepare($obj);
	$query->execute();


	}
	

		public function getAllpaymentData(){
 	$obj="SELECT  degree.degreename,student.studentname,section.sectionname,fees.feestype,payment.amount,payment.date,payment_id FROM degree INNER JOIN invoices ON degree.degree_id=invoices.class INNER JOIN student ON student.student_id=invoices.student INNER JOIN section ON section.section_id=invoices.section INNER JOIN payment ON payment.invoiceid = invoices.invoices_id INNER JOIN fees ON fees.fees_id=payment.paymenttype";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		

 
	}

	// 	public function getAllpaymentData2(){
 // 	$obj=" SELECT payment_id, fees.feestype,payment.amount,payment.date FROM fees INNER JOIN payment ON fees.fees_id=payment.paymenttype";
 // 			$query=$this->db->prepare($obj);
 // 			$query->execute();
 // 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 // 			return $result;
 			

 
	// }
	// SELECT payment_id, fees.feestype,payment.amount,payment.date FROM fees INNER JOIN payment ON fees.fees_id=payment.paymenttype
	//{






			 	
//  	$obj="SELECT invoices_id,degree.degreename,section.sectionname,invoices.phone,invoices.rollno,invoices.amount,invoices.date,student.studentname FROM section INNER JOIN invoices ON section.section_id=invoices.section INNER JOIN degree ON
// degree.degree_id=invoices.class INNER JOIN student ON student.student_id=invoices.student";

//  			$query=$this->db->prepare($obj);
//  			$query->execute();
//  			$result=$query->fetchALL(PDO::FETCH_ASSOC);
//  			return $result;
//  }
	

	public function getAllfeesData(){

 	
 	$obj="SELECT *FROM fees";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 
	}
	 public function getSinglepaymentData($id){
	 	$obj="SELECT * FROM payment WHERE payment_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	 public function deletepaymentData($id)
 	{
	 	$obj="DELETE FROM payment WHERE payment_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

 public function editpaymentData($amount,$date,$paymenttype,$id)
	 {
	 	 $obj="UPDATE payment SET amount='$amount',date='$date', paymenttype='$paymenttype' WHERE payment_id=$id";
	 	
	 	 
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }


	
}






?>