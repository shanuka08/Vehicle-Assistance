<?php
/*********************

**** CPanel ******************
*********/

/* Following code will match admin login credentials */

//user temp array
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db


$data = json_decode(file_get_contents("php://input"));

$get_id = ($data->email);

$result = mysqli_query($conn,"SELECT * FROM feedback WHERE email = '$get_id' ");

if(mysqli_num_rows($result))
{
	$response["details"] = array();	

	while($Alldetails = mysqli_fetch_array($result))
	{
		// temp user array
		$details = array();
		$details = $Alldetails;
		array_push($response["details"],$details);
	}	
	$response["success"] = 1;
	echo json_encode($response);

}
else
{
	$response["success"] = 0;	
	echo json_encode($response);
}
	

?>