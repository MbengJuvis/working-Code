<?php 
function boxes($name,$email,$message,$date,$num,$key){

	$value="
			<div class=\"w3-container w3-col m3\" style=\"min-height: 100px;\" onclick=\"myFunction($num,$key)\" id=\"$key\">

				<i class=\"fa fa-star checked\"></i>
				<i class=\"fa fa-star checked\"></i>
				<i class=\"fa fa-star checked\"></i>
				<i class=\"fa fa-star checked\"></i>
				<i class=\"fa fa-star checked\"></i> &nbsp;
				<span style=\"font-style: italic;\"> $name</span>
				<span style=\"font-size: 10px;\" class=\"w3-text-grey\">$email</span><br>

				<span style=\"font-style: italic;\" class=\"w3-panel\">$message</span>
				<span class=\"w3-right w3-small\">$date</span>
			</div>
			

                               
	";
	echo $value;
}

?>

   


