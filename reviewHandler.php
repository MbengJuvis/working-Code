<?php 

require_once 'login.php';
 require_once "pages/model.php";

class handle extends loginHandler{

	function view($dbName){

		global $connect;
		if(!mysqli_select_db($connect,$dbName)){
                              die('Failed:' .mysqli_error() );
                          }else{

				$submitdate=date("Y-m-d");
				
				$query="INSERT INTO review (review_name,review_star,review_email,review_msg,pdt_id,review_date) VALUES (?,?,?,?,?,?) ";
				$stmt = mysqli_prepare($connect,$query);
				mysqli_stmt_bind_param($stmt, "sissis",$this->final['fname'],$this->final['star'],$this->final['email'],$this->final['message'],$this->final['pdtId'],$submitdate );

						if(mysqli_stmt_execute($stmt)){
									   echo "<script> alert('Review added succefully'); </script>";
 								header("location:product.php?id=".$this->final['pdtId']);
									}
									// else data not inserted
									else{
									    echo "<script> alert('Sorry an error occured'); </script>" ;
   											die(mysqli_error($connect));
									}


            }                
                                



	}
}






 $tmp = getData('review','fieldnames');

           $addReview = new handle($tmp);
          
           $addReview->view('gunshopdb');


?>

