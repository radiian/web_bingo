<?php
require_once('db.php');

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if($!con){
	die("Something went wrong");
}


$query = "SELECT * FROM squares ORDER BY RAND() LIMIT 24";
$squares = mysqli_query($con, $query);

$text = array();
if(mysqli_num_rows($squares) > 0){
	while($row = mysqli_fetch_assoc($squares)){
		array_push(text, $row['text']);
	}
	
	echo $text;
}
else{
	echo "No data :(";
}

?>
