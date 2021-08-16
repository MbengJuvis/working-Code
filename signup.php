<?php 
 require_once 'login.php';
 require_once 'model.php';

 class signUp extends loginHandler{

 	public function  userSignUp($dbName,$tableName){
 		global $connect;
			if(!mysqli_select_db($connect,$dbName)){
		die('Failed:' .mysqli_error() );
			}else{

				$password=password_hash($this->final['pwd'], PASSWORD_DEFAULT); //hash the user password
				$check=password_verify($this->final['c_pwd'], $password);
				if ($check == 1) {
					# code...
					$query="SELECT * from {$tableName} WHERE Name = ? ";
					$stmt = mysqli_prepare($connect,$query);
	                  mysqli_stmt_bind_param($stmt,"s",$this->final['username']);
	                  mysqli_stmt_execute($stmt);
	                  $result=mysqli_stmt_get_result($stmt);
					if(mysqli_num_rows($result) > 0){ //If Username already exists
				 	echo "<script> alert ('user already exists ,try another Username') </script>";
				 } else{
				 	$query="INSERT INTO {$tableName} (Name,Password,Phone,Email,Address) VALUES (?,?,?,?,?) ";
					 	$stmt = mysqli_prepare($connect,$query);
					 	mysqli_stmt_bind_param($stmt,"ssiss",$this->final['username'],$password,$this->final['contact'],$this->final['email'],$this->final['address']);
					 		
					 		if(mysqli_stmt_execute($stmt)){
					 		echo "<script> alert ('user succesfully registered') </script>";
					 		//start Session
					 		session_start();
					 		$_SESSION['UserID']=mysqli_insert_id($connect);
					 		echo $_SESSION['UserID'];
					 		//header("location:login.php");
					 		# code...
					 	}
					 	else{
					 		echo "<script> alert ('Sorry an error occurred?') </script>";
					 		 die(mysqli_error($connect));
					 	}
				 }
				


				}else{
					echo "<script> alert ('Password and Confrim Password do not Match') </script>";
					//header("location: ./test.html");
				}

			}
					


 	}
 

 }


  $tmp = getData('send','fieldnames');
 $jarvis = new signUp($tmp);
 $jarvis->userSignUp('proguidedb','userinfo');

?>