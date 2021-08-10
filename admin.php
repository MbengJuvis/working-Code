<?php
 include("jarvis.php");
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Temporal Admin Area | The best online GunShop</title>
	 <link rel="shortcut icon" type="image/jpg" href="images/Design.jpg"/>
<meta name="title" content="Buy Guns Online | Firearms, Ammunition &amp; Accessories Store - GunShop"/>
<meta name="description" content="Online gun deals. One of the largest online gun stores with the selection of handguns, rifles, shotguns, ammo, optics &amp; firearm accessories"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="4/fonts.css">
<style type="text/css">
  <?php include("4/w3.css"); ?>
  <?php include("4/fonts.css"); ?>
  <?php include("4/bootstrap.min.css"); ?>
  <?php include("4/nav.css"); ?>
 
  a {text-decoration: none;}
</style>

</head>
<body>
<center><h2  style="font-family: 'anton';"> ORDER HISTORY</h2></center>
<div style=" min-height: 200px;" class="w3-container w3-padding-large">
  <table class="w3-table w3-striped w3-bordered w3-centered">
      <tr class="w3-green">
      	<th>Name</th>
      	<th>Phone</th>
      	<th>City</th>
      	<th>Email</th>
      	<th>Address</th>
      	<th>Country</th>
      	<th>Payment</th>
      	<th>Pdt_name</th>
      	<th>Pdt_qty</th>
      	<th>submitDate</th>
      </tr>
      <?php retrieveOrder(); ?>
 </table>
</div>


</body>
</html>