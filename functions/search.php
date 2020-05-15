<?php









// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'Aba4333250';
$dbName     = 'ikthss';

// Connect with the database
$db =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = mysqli_query($db,"SELECT * FROM blood_bank WHERE place LIKE '%".$searchTerm."%' ORDER BY place ASC");

// Generate skills data array
$skillData = array();
if(mysqli_affected_rows($db)>0){
    while($row = mysqli_fetch_array($query)){
    		if(in_array($row['place'], $skillData))
    				continue;
 array_push($skillData,$row['place']);
    }
}

// Return results as json encoded array
echo json_encode($skillData);


    
?>
