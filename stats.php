<?php
require_once('db.php');

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if(!$con){
        die("Something went wrong");
}

if(isset($_POST['tile_select'])){
//if tile_select is set then increase the number of times that the tile has been clicked. tile_select holds the tile id to change.
	$tile_id = $_POST['tile_select'];
	if(!filter_var($tile_id, FILTER_VALIDATE_INT) === false){
		
		$inc_query = "UPDATE squares SET counter = counter + 1 where id=$tile_id";
		$result = mysqli_query($con, $inc_query);
		if(!$result){
			echo "Something went wrong: " . mysqli_error($con);
		}
	}
	else{
		die("Something went wrong");
	}
}
else{
	if(isset($_POST['tile_deselect'])){
	//if tile_deselct is set then decrease the number of times that the tile has been clicked. tile_deselect holds the tile id to change.
		$tile_id = $_POST['tile_deselect'];
		if(!filter_var($tile_id, FILTER_VALIDATE_INT) === false){
			$dec_query = "update squares set counter = counter - 1 where id=$tile_id";
			$result = mysqli_query($con, $dec_query);
		}
		else{
			die("Something went wrong");
		}
		
	
	}
	else{
		//otherwise simply print statistics
		$query = "select * from squares order by counter DESC";
		$result = mysqli_query($con, $query);
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
                echo $row['text'] . ": " . $row['counter'] . "<br>";
			}
		}
	}
}
?>