<?php
include_once('db.php');
$conn=db();
$gp=strtolower($_POST['gp']);
$place=strtolower($_POST['place']);
sleep(2);
		$result=array();
		$result["details"]=("<table class='table table-bordered table-hover' width='100%'>
		<thead><tr>
        <th scope='col'><center>#</center></th>
        <th scope='col'><center>Name</center></th>
      	<th scope='col'><center>Phone</center></th>
      	<th scope='col'><center>Place</center></th>
      	<th scope='col'><center>Group</center></th>

    </tr>
  </thead>");
		
 		if(!$conn){

 			$result["no"]="DBER";

 		}
 		else
 		{ 
 			if((($place==null)||($place==" ")||( preg_match('/\s/',$place))))
 			{
 				
 				$query=mysqli_query($conn,"SELECT * from blood_bank where gp='$gp'");
 			}
 			else
 			{
 				$place=$_POST['place'];
 				$query=mysqli_query($conn,"SELECT * from blood_bank where gp='$gp' and place LIKE '%".$place."%'");
 			}
 			$i=1;
 			 $coun=mysqli_affected_rows($conn);
 			 $result["no"]=$coun;
 			 while($row=mysqli_fetch_array($query))
 			 {

 			 	$result["details"]=$result["details"].("<tbody>
    						<tr>
      				<th scope='row'><center>".$i++."</center></th>
      				<td><center>".ucfirst($row['name'])."</center></td>
      				<td><center>".ucfirst($row['phno'])."</center></td>
      				<td><center>".ucfirst($row['place'])."</center></td>
      				<td><center>".strtoupper($row['gp'])."</center></td>
   					 </tr>
  						</tbody>");


 			 }

 					


 					
						


 			

 		}
 			$result["details"]=$result["details"].("</table>");
		
echo json_encode($result);




?>