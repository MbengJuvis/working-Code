<?php

require_once "model.php" ;
require_once "login.php" ;

class login extends loginHandler{

public function verifyLogin($dbName,$tableName){
	global $connect;
if(!mysqli_select_db($connect,$dbName)){  //Selects the db
		die('Failed:' .mysqli_error() );
			}else{
											
$query="SELECT  Password,UserID from {$tableName} WHERE Name = ? "; //verify if user name exists
$stmt = mysqli_prepare($connect,$query);
mysqli_stmt_bind_param($stmt,"s",$this->final['username']);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);



				 if(mysqli_num_rows($result) > 0){
				 	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				 	if (password_verify($this->final['pwd'], $row['Password'])) { //To be hashed
				 		echo "<script> alert ('you have an account') </script>"; 
				 		   session_start();
				 			$_SESSION['UserID']=$row['UserID'];
				 			print_r($_SESSION);
				 			#header("location:profile.php");	
				 	}
				 	
				 else{
				 	echo "<script> alert ('Sorry ,your credidentials are invalid') </script>";
				 }

		}else{
				echo "<script> alert ('Sorry ,There is no such Username in our Database') </script>";
		} 

	}
}

}



 $tmp = getData('send','fieldnames');
 $log = new login($tmp);

 $log->verifyLogin('course','user_info');

?>