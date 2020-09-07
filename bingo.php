<?php
require_once 'db.php'

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if($!con){
	die("Something went wrong");
}

$query = "SELECT * FROM squares ORDER BY RAND() LIMIT 24";
$squares = mysqli_query($con, $query);

if(mysqli_num_rows($squares) > 0){
	while($row = mysqli_fetch_assoc($squares)){
		echo $row['text']. "<br/>";
	}
}
else{
	echo "No data :(";
}

?>
