<?php
		include_once('db.php');
		$conn=db();
		$result=array();
		$name=strtolower($_POST['name']);
		$phno=strtolower($_POST['phno']);
		$gp=strtolower($_POST['gp']);
		$place=strtolower($_POST['place']);
		$submit=mysqli_query($conn,"SELECT* from blood_bank where gp='$gp' AND phno='$phno'");
		$chk=mysqli_affected_rows($conn);
		sleep(2);

		if(!$conn){
				$result['status']="DBER";
				$result['msg']=" <strong>Sorry !</strong> this feature is temporarily blocked";
				$result['class']="alert alert-danger";
		}
		else{
			if($chk!=0){
				$result['class']="alert alert-warning";
				$result['status']="ALRDREG";
				$result['msg']="<strong>Warning !</strong> You are already registered";
			}
			else{
			$submit=mysqli_query($conn,"INSERT INTO `blood_bank` (`id`, `name`, `phno`, `gp`, `place`) VALUES (NULL, '$name', '$phno', '$gp', '$place');");
			if($submit==1){
				$result['class']="alert alert-success";
				$result['status']="sucess";
				$result['msg']="<strong>Success!</strong> Thank you for your support";
			}
			else
			{
				$result['oops'];
				$result['class']="alert alert-danger";
				$result['msg']="<strong>Error!</strong> Oops something went wrong-(#P031)";
			}
		}
		}

echo json_encode($result);





?>