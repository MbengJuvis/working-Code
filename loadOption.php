<?php 
require_once "load.php";

if( isset($_REQUEST["value"]) ) { 
	 	$name = $_REQUEST['value'];
		$loader = new loadInfo('proguidedb','additional_info');
		$deptNames=$loader-> getBasedNameCondition("SELECT distinct  Department from additional_info  Where Faculty ='{$name}' ");
			//echo "<option></option>";
		foreach ($deptNames as $key => $value) {
			?>
			<option value="<?php echo $value['Department']; ?>"><?php echo $value['Department']; ?></option>
<?php	}

	 	  }else {
	 	  	echo "Notthing to show here";
	 	  }

?>
