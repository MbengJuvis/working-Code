<?php
session_start();
	require_once "page/item.php ";
	require_once "page/nav.php ";
	require_once "page/footer.php ";
	require_once "php/load.php ";
	 
	$getName = new loadInfo('proguidedb','userinfo');
	 $value = $getName->getBasedCondition($_SESSION['UserID'],"SELECT Name from userinfo Where UserID= '{$_SESSION['UserID']}' ");
	 
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Page | ProGuide </title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
.imgtxt{
	font-size: 50px;
}
		@media only screen and (max-width: 600px){
			.main{
				display : none;
			}
			.imgtxt{
	font-size: 40px;
}
		}
</style>

</head>
<body>
	<?php sbar("mbengjuvis0@gmail.com", "+237 682898606" ,"Douala , Cameroon"); ?>
	<!-- header_new($logo,$about,$contact,$login,$qb,$td,$faculty) -->
	<?php header_new("images/no-bg.png","#","#","php/logout.php","Log Out","#","#","#","Manage Courses"); ?>
	<div style="height: 300px; " class="w3-display-container">
		<?php intro_text( $value[0]['Name'],"images/architect.jpg"); ?>
	</div>
	  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Drop Courses</h2>
      </header>
      <div class="w3-container">
        <table class="w3-table-all">
		      <tr>
		        <th>Department</th>
		        <th>Level</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		      		<?php 

		      				 $value = $getName->getBasedCondition($_SESSION['UserID'],"SELECT * from payment Where UserID= '{$_SESSION['UserID']}' ");
		      				 		if (empty($value)) {
												echo "<span><b>No Course has been selected yet</b></span>";
																							
										}else{

		      				 foreach ($value as $key => $value) {
		      				 	CourseTable($value['Department'],$value['level'],$value['stat'],$_SESSION['UserID']);
		      				 }
		      				 }

		      		?>

  		</table>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>



	<div class="w3-container w3-padding-large ">
		<h3 style="font-family: 'big';">Your Courses</h3>
		<button class="w3-btn w3-green w3-padding-small" id="myCourses">View My Courses</button>

		<div style="min-height: 300px; height: auto; display: none;"  id="registered">
		</div>
		<br>
		<h3 style="font-family: 'big';">Add Courses</h3>
		<div style=" min-height: 300px; height: auto;" class="w3-row-padding">
			<form method="" action="" class="w3-col m6 w3-card 4 w3-padding-large">
				<label>Enter the Faculty:</label>
				<select class="w3-select" name="facultyOptions" id="faculty" required>
					  <option value="" disabled selected>Choose your option</option>
					  <option value="Science">Faculty of Science</option>
					  <option value="Arts">Faculty of Arts</option>
					  <option value="Social Science">Faculty of Social Science</option>
				</select>
				<br><br>
				<label>Department or Subject</label>
				<select class="w3-select" name="deptOption" id="dept" required>
					  
				</select><br><br>
				<label>Select Level</label>
				<select class="w3-select" name="level" id="level" required>
					<option value="200">First Year - 200</option>
					  <option value="300">Second Year - 300</option>
					  <option value="400">Third Year - 400</option>
					  
				</select><br><br>
						<center><button type="button" name="search" class="w3-btn w3-green" id="courses"> Search For Course</button></center>
			</form>
			
			
		</div>
		<div class="w3-container w3-padding-small w3-row-padding" style=" min-height: 300px; height:auto; border: 2px dotted grey;" id="loadedCourses">
				
			</div>
			<center><button class="w3-btn w3-green w3-padding-small" id="addtobank">ADD THIS QUESTIONS TO YOUR QUESTION BANK</button></center>
		
	</div>

	<div class="w3-content">
		<center><button class="w3-btn w3-blue w3-large w3-hover-green"> Go To Transcript Delivery ---> </button></center>
	</div><br>
	<?php footer("images/no-bg.png","Building the ProGuide"); ?>
	

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="css/nav.js"></script>
</body>
</html>