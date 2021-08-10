<!-- connects and queries the database -->


<?php
$connect=mysqli_connect('localhost','root','');
 
if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}
 
?>