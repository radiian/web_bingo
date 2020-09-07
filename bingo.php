<?php
require_once('db.php');

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if(!$con){
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
	
	$table = "<table>";
	
$idx = 0;
for($i = 0; $i < 5; ++$i){
	$table += "<tr>";
	if($i == 2){
		//be sure to add the free space
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>Free Space</th>";
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>". $text[$idx++] . "</th>";
		
	}
	else{
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>". $text[$idx++] . "</th>";
		$table += "<th>". $text[$idx++] . "</th>";
	}
	$table += "</tr>";
	
}

echo $table;
}
else{
	echo "No data :(";
}

?>
