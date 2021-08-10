<?php 
require_once "model.php" ;
/* 
	Dear future user, to enjoy this wonderful functions use the following names for the following input fields:

	username = User Name
	pwd = Password
	c_pwd = Confirm Password
	contact = Contact
	email = Email

*/

 class loginHandler{
 	private $names;
 	public $final;
 	

 	function __construct($values){

 		 $this->names =json_decode($values,true); //decodes the JSON Entry containing Field names and Values
 		 $this->final = array_map(array($this,'toConvertAndSanitize') ,$this->names ); // Sanitizes every input with array_map

 	}
		protected  function toConvertAndSanitize($key){ //Security not complete. Sanitizer function
			
			$trim_text=trim($key);
			if (filter_var($trim_text,FILTER_VALIDATE_EMAIL)) {
					$sanitize_text=filter_var($trim_text,FILTER_SANITIZE_EMAIL);
					return $sanitize_text;
			}else{
				$sanitize_text=preg_replace('/[^A-Za-z0-9\-]/','',  filter_var($trim_text,FILTER_SANITIZE_STRING));
				return $sanitize_text;
			}
		}

	
			
			
		}




 

 function getData($submitName,$hiddenName){

 	if (isset($_POST[$submitName])) {
 		$values = $_POST[$hiddenName];

 		return $values;
 	}
 }




 
?>