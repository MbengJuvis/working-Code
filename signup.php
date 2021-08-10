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
					$query="SELECT * from {$tableName} WHERE Name = '{$this->final['username']}' ";
					$result=mysqli_query($connect,$query);
					if(mysqli_num_rows($result) > 0){ //If Username already exists
				 	echo "<script> alert ('user already exists ,try another Username') </script>";
				 } else{
				 	$query="INSERT INTO {$tableName} ( UserID,Name,Email,Password,Contact,Address) VALUES ('','{$this->final['username']}','{$this->final['email']}','{$password}','{$this->final['contact']}','{$this->final['address']}') ";
					 	$result=mysqli_query($connect,$query);

					 		if ($result) {
					 		echo "<script> alert ('user succesfully registered') </script>";
					 		//start Session
					 		session_start();
					 		$_SESSION['UserID']=mysqli_insert_id($connect);
					 		//header("location:login.php");
					 		# code...
					 	}
					 	else{
					 		echo "<script> alert ('Sorry an error occurred?') </script>";
					 		 echo "Error: " . $result . "<br>" . $connect->error;
					 	}
				 }
				


				}else{
					echo "<script> alert ('Password and Confrim Password do not Match') </script>";
				}

			}
					


 	}
 

 }


  $tmp = getData('send','fieldnames');
 $jarvis = new signUp($tmp);
 $jarvis->userSignUp('course','user_info');

?>