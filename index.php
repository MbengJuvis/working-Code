<?php
require_once "../php/insert.php ";
require_once "../php/update.php ";
require_once "../php/load.php ";
require_once "../page/item.php ";
	require_once "../php/login.php ";

	if(isset($_GET['page'])){
							$page=$_GET['page'];
					}else{
						$page = 1;
					}
					$result_per_page = 4;

					$start = ($page - 1) * $result_per_page;
					$allCourses = new loadInfo("proguidedb", "course");
					$total = $allCourses->getAllProducts();
					$courses = $allCourses->getAllProductsPagination($start,$result_per_page);
				
						 $number_of_courses = count($total);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Control Panel | ProGuide</title>
	 <link rel="shortcut icon" type="image/jpg" href="../images/3d.jpg"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/fonts.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		.lab{
			font-family: 'navelements';
		}
		.txt1{font-family:'anton';}
	</style>
</head>
<body>
	<div class=" w3-margin-top  w3-padding-32">
		<marquee direction="right" width="90%"><h2 style="font-family: 'big','serif';" class="w3-text-green">WELCOME TO THE CONTROL PANEL</h2></marquee><br>
		<!-- Add Item -->
		<div id="addItem" class="w3-padding-large w3-content w3-card-2" style="width:80%;">
			<form class="w3-left-align w3-padding-large " method="post" action="index.php" id="addCourse" enctype="multipart/form-data">
				
				<center><h3 style="font-family: 'anton','serif';">Upload A Course Material</h3></center>
				<label class="lab">1. Faculty:</label><br>
					<input type="text" name="fac" class="w3-input w3-cell"  style="width:40%;" placeholder="Faculty">
					<input type="text" name="dept" class="w3-input w3-cell " style="width:40%; margin-left: 15px;" placeholder="Department" >
					<br>
					<label class="lab">2. Course Title:</label><br>
					<input type="text" name="cname" class="w3-input" placeholder="Course Name"><br>
					<label class="lab">3. Course Code & Level:</label><br>
					<input type="text" name="ccode" id="code" class="w3-input w3-cell" style="width:70%;" placeholder="Course Code">
					<input type="number" name="level"  id="lvl" class="w3-input w3-cell w3-leftbar " style="width:25%;" placeholder="Course Level" disabled>

					<br>
					<label class="lab">4. Course Material</label><br>
					<input type="file" name="cmaterial" id="doc" accept=".docx, .pdf" class="w3-input" placeholder="Course Material"><br>
					<input type="hidden" name="fieldnames" id="hidd">
					<input type="submit" name="send" value="Upload Material" onclick="getForm('addCourse','hidd')" class="w3-green w3-padding-small w3-btn">
				
			</form>
			
		</div>
		<!--  End Add Item -->
		<!-- Update  Item -->

			<div id="updateItem" class="w3-padding-large w3-content w3-card-2 w3-row-padding" style="width:80%;">
				<center><h3 style="font-family: 'anton','serif';">Update A Course Material</h3>
					<span>Enter The <b>Course Code</b> of the material you wish to Update</span><br>
						<input type="text" name="ucode" class="w3-input w3-cell w3-border" id="tCode" style="width:50%;" placeholder="Course Code"><button class="w3-cell w3-btn w3-blue " id="targetCode">SEARCH</button>
				</center><br>
				<div class="w3-col m5 " style="height: 70%;">
					<iframe style=" height: 80%; width: 100%;" src="" id="prev"></iframe>
					<center><h4>PREVIEW</h4></center>
					
				</div>
			<form class=" w3-padding-large w3-col m6" method="post" action="index.php" id="updater"  enctype="multipart/form-data">
				<div id="updateCourse">
				</div>


		<input type="hidden" name="fieldnames" id="hidd1">
          <input type="submit" name="update" value="Update Material" onclick="getForm('updater','hidd1')" class="w3-green w3-padding-small w3-btn">
			</form>
			
		</div>
		<!--End Update  Item -->
		<!-- View  Item -->

		<div class="w3-row-padding w3-card-4 w3-padding-small w3-margin-top ">
				<center><h3 style="font-family:'anton';">ALL OUR COURSES</h3></center>
			<div>Total: <?php echo $number_of_courses; ?></div>


				<?php 
					foreach ($courses as $key => $value) {
						availableDept($value['Course_code'],"../images/3d.jpg",$value['Course_link']);
					}
				?>
				</div>
				<center><div style="position: relative; bottom:0px;">
				<?php 
					$display = ceil($number_of_courses/$result_per_page);

					for($page = 1; $page <= $display ;$page++){  ?>

					<a href= 'index.php?page=<?php echo $page; ?>' ><button class="w3-green w3-btn"><?php echo $page; ?></button></a>
					<?php
				}
				?>

</div></center>
		<!-- End View Item -->


<br>
		<!-- Delete Item -->

<div class="w3-row-padding w3-card-4 w3-padding-small w3-margin-top " id="dbox">
				<center><h3 style="font-family:'anton';">DROP COURSES</h3></center>
			<div>Total: <?php echo $number_of_courses; ?></div>


				<?php 
					foreach ($total as $key => $value) {
						deleteDept($value['Course_code'],"../images/3d.jpg",$value['Course_title']);
					}
				?>
				</div>
		<!-- End Delete Item -->
		<div class="w3-row-padding w3-card-4 w3-padding-small w3-margin-top " id="transcriptInfo">
			<center><h3 style="font-family:'fontt';">Transcript Application Page</h3></center>

				<div id="transinfo" class="w3-padding-small" style="overflow-x: scroll;">
					<?php 
					$getName = new loadInfo('transcriptdb','applications');
								 $apkName = $getName->getAllProducts();
								 echo "Total Number of Application Received is :" .count($apkName);
					?>
						 <table class="w3-table-all">
				      <tr>
				        <th>Applicant Name</th>
				        <th>Applicant Number</th>
				        <th>Transcript Number</th>
				        <th>Status</th>
				         <th>Time Left</th>
				      </tr>
						<?php
								
	 if (empty($apkName)) {
					echo "<center><span style=\"font-family:'anton';\">No Application was Found</span></center>";				
				}else { 
						$present = date("Y-m-d");
								foreach ($apkName as $key => $value) {
											if ($value['Mode'] == 'normal') {
												$limit = 14;
											}elseif ($value['Mode'] == 'fast') {
												$limit = 2;
											}else{
												$limit = 0.08;
											}
									?>
									<tr>
										<td><?php echo $value['Name'];?></td>
										<td><?php echo $value['Phone'];?></td>
										<td><?php echo $value['Matricule'];?></td>
										<td><?php 
										$date2=strtotime($value['StartDate']);
											$d2=ceil((time()-$date2)/60/60/24);
											$left = $limit - ($d2-1) ;
										
										if ($left < 1 && $left > 0) {
											$left=$left * 24;
											echo $left."Hours Left";
										}elseif($left == 0 || $left < 0 ){
										echo "<span class=\"w3-text-green\" style=\"font-family:'anton';\">AVAILABLE!</span>";
									}else{
										echo "<span class=\"w3-text-green\" style=\"font-family:'anton';\">PROCESSING...</span>";
									}

									?> </td>
									<td> <?php 
											if($left == 0 || $left < 0 ){
													echo "<span class=\"w3-text-green\" style=\"font-family:'anton';\">AVAILABLE!</span>";
								}else{
										echo $left.""."days Left"; 
								}


								?></td>
									</tr>
        			
								
									<?php	
							}
			}
	 			
						?>
										
						</table>
					</div>

					<div class="w3-row-padding w3-card-4 w3-padding-small w3-margin-top " >
						<button class="w3-btn w3-green w3-margin-right lab" > INSERT ITEM</button>
						<button class="w3-btn w3-green w3-margin-right lab"> UPDATE ITEM</button>
						<button class="w3-btn w3-green w3-margin-right lab"> VIEW ITEMS</button>
						<button class="w3-btn w3-green w3-margin-right lab"> DELETE ITEMS</button>
						<button class="w3-btn w3-green w3-margin-right lab"> VIEW APPLICATIONS</button>
						
					</div>

			
		</div>

			
		

	</div>
	<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>

	<script type="text/javascript">
			$(document).ready(function(){
				//Load The Level Automatically based on Valid Course Code Entry
		$('#code').change(function(){
			 var value = $("#code").val();
			 var raw =value.replace(/ /g,'');
			 if (raw.length > 6 || raw.length < 6) {
			 	alert("Please the Course code you entered may be invalid");
			 }else{
			 	 switch (raw.slice(3,4) ){
			 	 	 case '2':
				         $("#lvl").val(200);;
				        break;
				     case '3':
				         $("#lvl").val(300);;
				        break;
				    case '4':
				         $("#lvl").val(400);;
				        break;
				    default:
        					alert("Invalid response");
			 	 }

			 	
			 }
		});
 
//View Information About a particular Course to be updated
    $('#targetCode').click(function(){
        var val = document.getElementById('tCode').value;

        $('#updateCourse').load("values.php",{value : val},function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            console.log(responseTxt);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });


      });
// Handle Item Delete Asynchronously with JQuery
$(".delBox").on("click","button" ,function() {
   var id=$(this).attr('value');
   alert(id);
   var answer = confirm("You are about to delete a course, there by loosing it.Do you want to proceed anyway");

   if (answer == true) {
  $('#dbox').load("../php/delete.php",{ID : id},function(responseTxt, statusTxt, xhr){
                  if(statusTxt == "success")
                      alert("Course was Succesfully Deleted");
                    document.location.reload(true);
                  if(statusTxt == "error")
                      alert("Error: " + xhr.status + ": " + xhr.statusText);
              });
} else {
  alert('Operation Aborted');
} 
});

	});
	</script>
</body>
</html>
<?php
if (isset($_POST['send'])) {

$tmp  = getData('send','fieldnames');
$inserter= new Insert($tmp);
$inserter->insertCourse('proguidedb' ,"INSERT INTO course (Course_code,Course_title,Image_link,Course_link) values (?,?,?,?)");
}

if(isset($_POST['update'])){
$tmp  = getData('update','fieldnames');
echo "<script> alert(var_dump($tmp));</script>";
$updater = new Update($tmp);
$updater->updateRecord("proguidedb","UPDATE course,additional_info SET course.Course_title=?,course.Course_link=?,additional_info.Faculty=?,additional_info.Department=?,additional_info.Level= ?
    WHERE course.Course_code = additional_info.Course_code  AND course.Course_code = ? ");




}
	?>
	
