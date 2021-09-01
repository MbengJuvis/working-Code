<?php
require_once "../php/load.php";
require_once "../page/item.php";

if( isset($_REQUEST["value"]) ) { 


$code = validate_input_text($_REQUEST['value']);
$getInfo = new loadInfo("proguidedb","course");

		$deptNames=$getInfo-> getBasedNameCondition(" SELECT *  FROM course,additional_info WHERE course.Course_code = additional_info.Course_code  AND course.Course_code = '{$code}' ");
		if (!empty($deptNames)) {
			// code...
		
		foreach ($deptNames as  $value) {
			updateForm($value['Faculty'],$value['Department'],$value['Course_title'],$value['Level'],$value['Course_link'],$value['Course_code'],);
		}
	}else{
		echo "The Course Code requested is not available";
	}



}else{

}

?>
