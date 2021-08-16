<?php

require_once "load.php";
require_once "../page/item.php";

if (isset($_REQUEST['deptName']) && isset($_REQUEST['levelValue'])) {
	$dept = $_REQUEST['deptName'];
	$level = $_REQUEST['levelValue'];
			$loader = new loadInfo('proguidedb','additional_info');
		$courses = $loader->getRows($dept,$level);
		if (empty($courses)) {
					
					exit();
					
				}else { 

			foreach ($courses as $key => $value) {
			$courseBox = new loadInfo('proguidedb','course');
				$deptNames=$courseBox-> getBasedNameCondition("SELECT * from course Where Course_code ='{$value['Course_code']}'");
				
						foreach ($deptNames as $key => $value) { 
						
								 registeredCourse($value['Course_title'],$value['Course_code'],$value['Course_link'],$value['Image_link']);
					}
			}
			}

}else{
	echo "Not set";
}

?>