<?php
 session_start();
require_once "load.php";
require_once "model.php" ;
require_once "../page/item.php";

class addToCourse extends loadInfo{

	public function addCourse($id,$dept,$stat,$level){
		global $connect;
		if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error() );
                          }else{

                          	$query1 ="SELECT * from {$this->tableName}  WHERE UserID = ? AND Department = ? AND level = ? ";
                          	    $stmt = mysqli_prepare($connect,$query1);
							mysqli_stmt_bind_param($stmt, "isi",$id,$dept,$level );
							mysqli_stmt_execute($stmt);
							$result=mysqli_stmt_get_result($stmt);

							 if(mysqli_num_rows($result) > 0){
							echo "<script> alert(' Course already added to the Question Bank'); </script>";
							 }else{



                          	$query="INSERT INTO {$this->tableName} (UserID,Department,stat,level) VALUES (?,?,?,?) ";
                          	$stmt = mysqli_prepare($connect,$query);
							mysqli_stmt_bind_param($stmt, "issi",$id,$dept,$stat,$level );
							if(mysqli_stmt_execute($stmt)){
									   echo "<script> console.log('Courses added succefully'); </script>";
									}
									// else data not inserted
									else{
									    echo "<script> console.log('Sorry an error occured'); </script>" ;
   											die(mysqli_error($connect));

   											
									}

								}

                          }

	}
}

$adder = new addToCourse("proguidedb","payment");

if (isset($_REQUEST['deptName']) && isset($_REQUEST['levelValue'])) {
	$dept = $_REQUEST['deptName'];
	$level = $_REQUEST['levelValue'];
	$paid = 'pending';
			
		 $adder->addCourse($_SESSION['UserID'] ,$dept,$paid,$level);
		 $loader = new loadInfo('proguidedb','payment');
		 $query = "select A.Course_code from payment P, additional_info A where P.level=A.Level  and P.Department= A.Department and P.UserID = '{$_SESSION['UserID']}' ";
		$courses = $loader->getBasedCondition($_SESSION['UserID'],$query);

			foreach ($courses as $key => $value) {
			$courseBox = new loadInfo('proguidedb','course');
				$deptNames=$courseBox-> getBasedNameCondition("SELECT * from course Where Course_code ='{$value['Course_code']}'");
				if (empty($deptNames)) {
					echo "The requested courses are not yet available";
					
				}else { 
						foreach ($deptNames as $key => $value) { 
						
								 registeredCourse($value['Course_title'],$value['Course_code'],$value['Course_link'],$value['Image_link']);
					}
			}
			}

}else{
	echo "Not set";
}


?>