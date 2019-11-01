<?php
include('connect.php');

class Data extends Database
{

	public function saveStudentData($session, $degree, $section, $studentname, $fathername, $address, $rollno, $student_image)
	{
		$obj = " INSERT INTO student(`session`,`degree`,`section`,`studentname`,`fathername`,`address`,`rollno`,`student_image`) VALUES('$session','$degree','$section','$studentname','$fathername','$address','$rollno','$student_image')";

		$query = $this->db->prepare($obj);
		$query->execute();
	}
	public function getAllstudentData()
	{

		$obj = " SELECT student.student_id,SESSION.sessionname, degree.degreename,section.sectionname,student.studentname,student.fathername,student.address,student.rollno,student.student_image FROM session INNER JOIN student ON session.session_id=student.session INNER JOIN degree ON student.degree=degree.degree_id INNER JOIN section ON section.section_id=student.section";
		$query = $this->db->prepare($obj);
		$query->execute();
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}




	public function getAllsessionData()
	{

		$obj = "SELECT *FROM session";
		$query = $this->db->prepare($obj);
		$query->execute();
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}
	public function getAlldegreeData()
	{

		$obj = "SELECT *FROM degree";
		$query = $this->db->prepare($obj);
		$query->execute();
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}
	public function getAllsectionData()
	{

		$obj = "SELECT *FROM section";
		$query = $this->db->prepare($obj);
		$query->execute();
		$result = $query->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}




	public function getSinglestudentData($id)
	{
		$obj = "SELECT * FROM student WHERE student_id=$id";
		$query = $this->db->prepare($obj);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public function deletestudentData($id)
	{
		$obj = "DELETE FROM student WHERE student_id=$id";
		$query = $this->db->prepare($obj);
		$query->execute();
	}



	public function deleteimage($id)
	{
		$obj = "UPDATE student SET student_image='' WHERE student_id=$id";

		$query = $this->db->prepare($obj);
		$query->execute();
	}

	public function updatestudentData($session, $degree, $section, $studentname, $fathername, $address, $rollno, $image, $id)
	{
		if (!empty($image)) {
			$obj = "UPDATE student SET session='$session',degree='$degree',section='$section',studentname='$studentname',fathername='$fathername',address='$address',rollno='$rollno',
	 	student_image='$image' WHERE student_id=$id";

			$query = $this->db->prepare($obj);
			$query->execute();
		} else {
			$obj = "UPDATE student SET session='$session',degree='$degree',section='$section',studentname='$studentname',fathername='$fathername',address='$address',rollno='$rollno',
	 	student_image='$image' WHERE student_id=$id";

			$query = $this->db->prepare($obj);
			$query->execute();
		}
	}
}
