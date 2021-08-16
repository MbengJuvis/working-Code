<?php
session_start();
require_once "../page/item.php";
require_once "load.php";

 $loader = new loadInfo('proguidedb','payment');
		 $query = "select A.Course_code from payment P, additional_info A where P.level=A.Level  and P.Department= A.Department and P.UserID = '{$_SESSION['UserID']}' ";
		$courses = $loader->getBasedCondition($_SESSION['UserID'],$query);
		if (empty($courses)) {
			echo "<span><b>No Course has been selected yet</b></span>";
			exit();
		}else { 
			foreach ($courses as $key => $value) {
			$courseBox = new loadInfo('proguidedb','course');
				$deptNames=$courseBox-> getBasedNameCondition("SELECT * from course Where Course_code ='{$value['Course_code']}'");		foreach ($deptNames as $key => $value) { 
						
								 registeredCourse($value['Course_title'],$value['Course_code'],$value['Course_link'],$value['Image_link']);
					}
			
			}

		}




?>