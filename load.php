<?php 
require_once "model.php" ;

  class loadInfo { 
      public $dbName;
      public $tableName;

      function __construct($dname,$tname){
            $this->dbName = $dname;
            $this->tableName = $tname;
             
      }

 public function getAllProducts(){
  global $connect;
            
                            if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error($connect) );
                            }else{

$query="SELECT  * from {$this->tableName} "; //verify if user name exists 
                          $values = array();  $i = 0;  
                          $result=mysqli_query($connect,$query);
                           if(mysqli_num_rows($result) > 0){
                                 while( $row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                    $values[$i] = $row;
                                    $i++;                                
              }
              return $values;
}else{
    echo "An error occured". mysqli_error($connect);
                              die('Failed:' .mysqli_error($connect) );

  } 
 }

}
public function getBasedCondition($id,$query){
   global $connect;
                            if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error() );
                            }else{

//$query="SELECT  * from {$this->tableName} Where UserID= ? "; verify if user name exists 
  $values = array();  $i = 0;      
                         $stmt = mysqli_prepare($connect,$query);
                         // mysqli_stmt_bind_param($stmt,"i",$id);
                          mysqli_stmt_execute($stmt);
                          $result=mysqli_stmt_get_result($stmt);
                           if(mysqli_num_rows($result) > 0){
                                  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                      $values[$i] = $row;
                                    $i++;
              }
              return $values;                            

  }else{
   echo "<span class=\"w3-large\"><b>The row requested does not exist</b></span>" .mysqli_error($connect);
   echo "<br>";
  } 
 }

}

public function getRows($dept, $level){
   global $connect;
                            if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error() );
                            }else{

$query="SELECT  Course_code from {$this->tableName} Where Department= ? and Level = ? "; //verify if user name exists 
  $values = array();  $i = 0;      
                         $stmt = mysqli_prepare($connect,$query);
                          mysqli_stmt_bind_param($stmt,"si",$dept,$level);
                          mysqli_stmt_execute($stmt);
                          $result=mysqli_stmt_get_result($stmt);
                           if(mysqli_num_rows($result) > 0){
                                  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                      $values[$i] = $row;
                                    $i++;
              }
              return $values;                            

  }else{
   echo "<span class=\"w3-large\"><b>Sorry the Course requested is not yet available</b></span> 1" .mysqli_error($connect);
  } 
 }

}


public function getBasedNameCondition($query){
   global $connect;
                            if(!mysqli_select_db($connect,$this->dbName)){
                              die('Failed:' .mysqli_error() );
                            }else{

//$query="SELECT distinct  * from {$this->tableName} Where {$columnName} = ? "; //verify if user name exists 
  $values = array();  $i = 0;      
                         $stmt = mysqli_prepare($connect,$query);
                         
                          mysqli_stmt_execute($stmt);
                          $result=mysqli_stmt_get_result($stmt);
                           if(mysqli_num_rows($result) > 0){
                                  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                      $values[$i] = $row;
                                    $i++;
              }
              return $values;                            

  }else{
   echo "<span class=\"w3-large\"><b>Sorry the Course requested is not yet available</b></span>" .mysqli_error($connect);
  } 
 }

}

}


//$loader = new loadInfo('proguidedb','userinfo');

//$loader->getBasedCondition(2);


?>



