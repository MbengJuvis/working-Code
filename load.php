<?php 
require_once "model.php" ;

  class loadInfo { 
      public $dbName;
      public $tableName;

      function __construct($dname,$tname){
            $this->dbName = $dname;
            $this->tableName = $tname;
             
      }

 public function getAllProducts($htmlValue){
  global $connect;
            
                            if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error($connect) );
                            }else{

$query="SELECT  * from {$this->tableName} "; //verify if user name exists 
                          $values = array();    
                          $result=mysqli_query($connect,$query);
                           if(mysqli_num_rows($result) > 0){
                                 while( $row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                  
                                  ?>
                                 <?php echo $htmlValue; ?>
                  

 <?php }
}else{
    echo "An error occured". mysqli_error($connect);
                              die('Failed:' .mysqli_error($connect) );

  } 
 }

}
public function getBasedCondition($id){

   global $connect;
             
                            if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error() );
                            }else{

$query="SELECT  * from {$this->tableName} Where UserID= ? "; //verify if user name exists     
                         $stmt = mysqli_prepare($connect,$query);
                          mysqli_stmt_bind_param($stmt,"i",$id);
                          mysqli_stmt_execute($stmt);
                          $result=mysqli_stmt_get_result($stmt);
                           if(mysqli_num_rows($result) > 0){
                                  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>

                                    <div>html goes here</div>

                                   
                                 
   <?php                               
 }
                                

  }else{
   echo "<span class=\"w3-large\"><b>The row requested does not exist</b></span>" .mysqli_error($connect);
                              

  } 
 }


}

}


$loader = new loadInfo('course','user_info');
$loader->getAllProducts('<b>I am html</b>');
//$loader->getBasedCondition(2);


?>
