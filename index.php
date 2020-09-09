<?php 
require_once('settings.php');

session_start();



//The index page should get the list of sessions from the database and display them to the user to select


$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if(!$con){
        die("Something went wrong");
}

$query = "SELECT sessions.id, sessions.name, sessions.link, sessions.password, cards.title, cards.description FROM sessions INNER JOIN cards ON sessions.card_id = cards.id";
$sessions = mysqli_query($con, $query);


if(mysqli_num_rows($sessions) > 0){
        while($row = mysqli_fetch_assoc($sessions)){
			$link = $row['link'];
			echo "<a href='bingo.php?session=$link'>Session name: " . $row['name'] . ", card title: ". $row['title'] . ", ";
			if($row['password'] != null){
				echo "LOCKED";
			}
			else{
				echo "UNLOCKED";
			}
			echo "</a><br>";
        }
}
else{
	echo "No sessions found!";
}
?>