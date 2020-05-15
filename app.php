<?php
include_once 'functions/db.php';
$conn=db();
	$q=mysqli_query($conn,"select * from blood_bank where id='1'");
	$h=mysqli_fetch_array($q);
	echo json_encode($h);
	

?>