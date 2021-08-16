<?php 
session_start();
require_once "load.php";
require_once "model.php" ;
require_once "../page/item.php";


class dropCourse extends loadInfo{

	public function drop($id,$level,$dept){
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
							 			$query ="DELETE FROM {$this->tableName}  WHERE UserID = ? AND Department = ? AND level = ?";
                          	    $stmt = mysqli_prepare($connect,$query);
							mysqli_stmt_bind_param($stmt, "isi",$id,$dept,$level );
							mysqli_stmt_execute($stmt);
							$result=mysqli_stmt_get_result($stmt);

							 if(mysqli_num_rows($result) > 0){
							echo "<script> alert(' Course already added to the Question Bank'); </script>";
							 }else{
							 			echo "<script> console.log('Sorry an error occured'); </script>" ;
   											die(mysqli_error($connect));

							 }


							 }else{

							echo "<script> alert(' Course already removed from Question Bank'); </script>";
                          

							}

                          }
	}
}


$dropper = new dropCourse("proguidedb","payment");


if (isset($_REQUEST['ID'])){

	$id  = $_REQUEST['ID'];
	 $level = substr($id,0,3);
 $dept = substr($id,3);

	$dropper -> drop($_SESSION['UserID'],$level,$dept);


} else{
	echo "Choose course to drop";
}

?>