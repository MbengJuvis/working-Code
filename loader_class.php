<?php 
 require_once "model.php";
 class loader{
 	 global $connect;
 

 	function __constructor($dbName,$tableName){
 		if(mysqli_connect_errno($connect))
                      {
                          echo 'Failed to connect';
                      }
                  else{
                  	if(!mysqli_select_db($connect,$dbName)){
                              die('Failed:' .mysqli_error() );

                        }
                        }


 	}
 }
?>
<?php

 class review_loader extends loader{

 	public function display($query,$key_id){

 		
                        	// $query="SELECT * from {$tableName} WHERE pdt_id = '$key_id' " ;
                                $result=mysqli_query($connect,$query);
                          

                                if(mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>

     <div class="w3-container w3-col m3" style=" min-height: 100px;" id="<?php echo "item".$row["review_id"]; ?>" >
        <i class="fa fa-star checked "></i>
        <i class="fa fa-star checked "></i>
        <i class="fa fa-star checked "></i>
        <i class="fa fa-star checked"></i>
        <i class="fa fa-star checked "></i> &nbsp;
        <span style="font-style: italic;"> <?php echo $row["review_name"] ;?></span>
        <span style="font-size: 10px;" class="w3-text-grey"><?php echo $row["review_email"] ;?></span><br>

        <span style="font-style: italic;" class="w3-panel"> <?php echo $row["review_msg"] ;?></span>
        <span class="w3-right w3-small"><?php echo $row["review_date"] ;?></span>
      </div>
      <script type="text/javascript">
        myFunction(<?php echo $row["review_star"]; ?>,'<?php echo "item".$row["review_id"]; ?>');
      </script>


    
 <?php	}

 }else{
 	echo "THERE ARE NO REVIEWS FOR THIS PRODUCT";
 }
 
 }
}

?>