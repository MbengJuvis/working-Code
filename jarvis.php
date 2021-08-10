<?php
   include ("pages/model.php");

 function checkOut(){

 if (isset($_POST['checkout'])) {

 	 $selected=$_POST['selected'];
 	$values= json_decode($selected, true);
 	
 	array_walk($values, "queryDatabase");
 	$sum=0;

 	


 }

 }

  function queryDatabase($value,$key){
				global $connect,$sum;
				if(!mysqli_select_db($connect,'gunshopdb')){
					die('Failed:' .mysqli_error() );
					};

				$query= "SELECT pdt_name, pdt_price FROM products where pdt_id='$key' ";
				$result=mysqli_query($connect,$query);
				if(mysqli_num_rows($result) > 0){
				 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				 		?>
				 			
				 			<tr><td><?php echo $row["pdt_name"]; ?></td><td><?php echo $value; ?></td><td><?php echo ($row["pdt_price"] * $value) ; ?></td></tr>
				 			<?php 
				 					
				 					$sum+=($row["pdt_price"]*$value);
				 					
				 			?>

				<?php  return $sum; }
					

				}else{
					echo "alert ('An error occured');";
				}

				

		} 

 function notify(){
 		  if (isset($_POST['placeorder'])) {

 		
 		  $query_str = $_SERVER['QUERY_STRING'];
		parse_str($query_str,$query_param);
		echo var_dump($query_param);

		array_walk($query_param, "addRecord");

 		  
 }

 }

 notify();

 function addRecord($value,$key){ #i know there will be duplication of data.Am just tired

 				global $connect;
 				  $name=$_POST['fname'];
		 		  $phone=$_POST['number'];
		 		  $city=$_POST['city'];
		 		  $email=$_POST['email'];
		 		  $address=$_POST['address'];
		 		  $country=$_POST['country'];
		 		  $payment=$_POST['payment'];
		 		  $submitdate=date("Y-m-d");
				if(!mysqli_select_db($connect,'gunshopdb')){
					die('Failed:' .mysqli_error() );
					};

					$query1= "SELECT pdt_name FROM products where pdt_id='$key' ";
					$result1=mysqli_query($connect,$query1);
					$row=mysqli_fetch_array($result1,MYSQLI_ASSOC);

					$query= "INSERT INTO orders  (Name,Phone,City,Email,Address,Country,Payment,Pdt_name,Pdt_qty,submitDate) VALUES ('{$name}','{$phone}','{$city}','{$email}','{$address}','{$country}','{$payment}','{$row["pdt_name"]}', '{$value}', '{$submitdate}' )";
					$result=mysqli_query($connect,$query);
					if (mysqli_affected_rows($connect) > 0) {
						echo "<script> alert ('Your Order was succesfully made'); </script>";

					}else{

						echo "<script> alert ('An error occured.Please try Again'); </script>";
					}




 }
?>
<?php 
 function retrieveOrder(){
 			global $connect,$sum;
				if(!mysqli_select_db($connect,'gunshopdb')){
					die('Failed:' .mysqli_error() );
					};

				$query= "SELECT * FROM orders";
				$result=mysqli_query($connect,$query);
				if(mysqli_num_rows($result) > 0){
				 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				 		?>
				 			<tr>
				 				<td><?php echo $row["Name"]; ?></td>
				 				<td><?php echo $row["Phone"]; ?></td>
				 				<td><?php echo $row["City"]; ?></td>
				 				<td><?php echo $row["Email"]; ?></td>
				 				<td><?php echo $row["Address"]; ?></td>
				 				<td><?php echo $row["Country"]; ?></td>
				 				<td><?php echo $row["Payment"]; ?></td>
				 				<td><?php echo $row["Pdt_name"]; ?></td>
				 				<td><?php echo $row["Pdt_qty"]; ?></td>
				 				<td><?php echo $row["submitDate"]; ?></td>

				 			</tr>


<?php }
}

}

 ?>
