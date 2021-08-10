<?php 
  require_once 'pages/nav.php';
  require_once 'pages/portion.php';
  require_once 'pages/item.php';
  require_once 'pages/footer.php';
  require_once 'pages/function.php';
  require_once 'loader_class.php';
  require_once 'action.php';
  ?>

  <?php 
     

    $tmp_id=$_GET["id"];


    


    $pdtInformation=getProductInformation($tmp_id,"gunshopdb" ,"localhost","","root");
    

    ?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pdtInformation["pdt_name"]; ?> |The GunShop | The best online GunShop</title>
 <link rel="shortcut icon" type="image/jpg" href="images/Design.jpg"/>

	<meta name="title" content="Buy Guns Online | Firearms, Ammunition &amp; Accessories Store - GunShop"/>
<meta name="description" content="Online gun deals. One of the largest online gun stores with the selection of handguns, rifles, shotguns, ammo, optics &amp; firearm accessories"/>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="4/fonts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}
a {text-decoration: none;
}
  .checked {
    color: white;
    
   
   
}

     <?php include("4/w3.css"); ?>

      <?php include("4/footer.css"); ?>
    <?php include("4/nav.css"); ?>
    <?php include("4/item.css"); ?>
    <?php include("4/fonts.css"); ?>
    <?php include("4/bootstrap.min.css"); ?>
a {text-decoration: none;}
</style>
<link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 

  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->

  <!-- Header  Do not put the header inside another DIV-->
 

  <?php nav_bar("gunshop695@gmail.com","+1 (281) 849 8576","Houston,Texas");?>


  <?php header_new("images/Design.jpg","about.php","contact.php","firearms.php","shop.php"); ?>

  <br><br>
<div class="w3-display-container" style="height: 400px;">
  <?php intro_text( $pdtInformation["pdt_name"],"images/2.jpg"); ?>
</div>

<div class="w3-row-padding w3-display-container w3-padding-small" >
  
  <?php  category_tab("FIREARMS","AMMUNITIONS","ACCESSORIES"); ?>
  <?php  image_tab("images/".$pdtInformation["pdt_img"]); ?>
  <?php  pdtInfo($pdtInformation["pdt_name"],$pdtInformation["pdt_upc"],$pdtInformation["pdt_mpn"],$pdtInformation["pdt_price"],$pdtInformation["pdt_percent"]); ?>
</div>

<br>
<!-- Tab links -->
<div style="min-height: 500px;">
<div class="w3-bar" style="height: 60px; border-top: solid; ">
  <?php
  			$value="Here at GunShop we make the shipping process fast and simple for you! Whether you are purchasing a firearm or ammunition and having it sent to your local Federal Firearms dealer or you’re picking up some ammo and having it sent to your home, we’ve got you covered! For more details please visit our <a href=\"shipping.php\"> Shipping page</a>";

  			

   tabs("DESCRIPTION","SHIPPING","REVIEW"); 
   ?>
 <div id="desc" class="w3-container w3-border city w3-padding-large" style="height: 400px;">
    
    <p><?php echo $pdtInformation["pdt_desc"]; ?></p>
  </div>

  <div id="shipping" class="w3-container w3-border city  w3-padding-large" style="display:none; height: 200px;">
   
    <p><?php echo $value; ?></p> 
  </div>



    <div id="review" class="w3-container w3-border city w3-row-padding  w3-padding-large" style="display:none; min-height: 800px;">
    
    <div class=" w3-col m5 w3-row-padding" style="width: 300px; height: 500px;" >
      <?php 
           $loading = new review_loader('gunshopdb','review');
    $loading-> display("SELECT * from review WHERE pdt_id = '$tmp_id' ",'gunshopdb');
    ?>
     </div>
    <div class=" w3-col m6" style=" height: 800px;">

        <form action="reviewHandler.php" method="post" class="w3-container w3-card 4 w3-light-grey w3-round w3-text-black w3-margin w3-padding-large" id="reviewform" >
<h2 class="w3-center" style="font-family: 'anton';">Add a Review</h2>
<p class="w3-text-grey" style="font-family: 'anton';">Your email address will not be published.</p>
 <div class="w3-row-padding">
  <div>
    <p style="font-family: 'anton';">How many stars?</p>
 <button class="w3-green w3-text-white w3-btn star" type="button" id="1" onclick="val(1)" >1</button>
 <button class="w3-green w3-text-white w3-btn star" type="button" id="2" onclick="val(2)">2</button>
 <button class="w3-green w3-text-white w3-btn star" type="button" id="3" onclick="val(3)">3</button>
 <button class="w3-green w3-text-white w3-btn star" type="button" id="4" onclick="val(4)">4</button>
 <button class="w3-green w3-text-white w3-btn star" type="button" id="5" onclick="val(5)">5</button>

</div>
<div class="w3-half">
    <label style="font-family: 'lato';">First Name</label>
    <input class="w3-input w3-border" type="text" placeholder="Name" name="fname">
  </div>
 <div class="w3-half">
    <label style="font-family: 'lato';">Email</label>
    <input class="w3-input w3-border" type="email" placeholder="Email" name="email">
  </div> 
    <label >Message</label><br>
      <textarea cols="35" rows="5" placeholder="Enter your Review" class="w3-padding-small w3-input w3-border" name="message"></textarea>

</div>
<input type="hidden" name="pdtId" value="<?php echo $tmp_id; ?>">

<input type="hidden" id="hidd" name="star">
<input type="hidden" name="fieldnames" id="hid">
<button class="w3-btn w3-block w3-section w3-green w3-ripple w3-padding" type="submit" name="review" onclick="getForm('reviewform','hid')">Send</button>

</form>

    </div>
</div>
</div>
<!--End of Tabs-->

<?php footer("images/Design.jpg","The GunShop is your Guns Mall"); ?>


<script  src="4/page.js"></script>
<script type="text/javascript">
  magnify("myimage", 3);

	function openTab(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-green";
}

function val(num){
   
  document.getElementById('hidd').value = num;

}
function getForm(formID,hiddenID){

    const names={};
    var y = document.getElementById(formID);
    var i;
      for (i = 0; i < y.length-2;i++) {
          names[ y.elements[i].name ] = y.elements[i].value;
            
    }

    myJSON=JSON.stringify(names);
    console.log(myJSON);
    document.getElementById(hiddenID).value = myJSON ;
}


</script>

</body>
</html>