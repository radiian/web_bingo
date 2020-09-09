<?php 
require_once('settings.php');

session_start();
$card_title = "<<NULL>> BiNgO!1!1!";
$card_id = -1;



if(isset($_GET['session'])){
	$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

	if(!$con){
        die("Something went wrong");
	}
	
	
	$sess_link = $_GET['session'];
	
	$session_query = "SELECT sessions.name, sessions.link, sessions.password, cards.title, cards.description, cards.id AS cards_id FROM sessions INNER JOIN cards ON sessions.card_id = cards.id AND sessions.link = '$sess_link'";
	
	$session_data = mysqli_query($con, $session_query);
	
	
	if(mysqli_num_rows($session_data) > 0){
        $row = mysqli_fetch_assoc($session_data);
		$card_title = $row['title'];
		$card_id = $row['cards_id'];
	}

	
}

?>
<html>

<head>
	<link rel="stylesheet" href="bingo.css">
	 <script src="bingo.js"></script> 
</head>

<body>
 <div class='bingo'>
 <div class='stars'></div>
 <div class='stripes'></div>
 <div class='heading'>
 <span class='sub'><?php echo $bingo_card_brand; ?></span>
 <span><?php echo $card_title; ?></span>
 </div>
 
 <div class='card'>

<?php

class Tile{
	public $id;
	public $text;
	

}


if($card_id != -1 && ){
	$query = "SELECT * FROM squares WHERE card_id = '$card_id' ORDER BY RAND() LIMIT 24";
	$squares = mysqli_query($con, $query);

	$text = array();
	if(mysqli_num_rows($squares) > 0){
        while($row = mysqli_fetch_assoc($squares)){
				$tile = new Tile();
				$tile->id = $row['id'];
				$tile->text = $row['text'];
                array_push($text, $tile);
        }


        $table = "<table>";

        $idx = 0;
        for($i = 0; $i < 5; ++$i){
                $table .= "<tr height='150px' width='150px'>";
                if($i == 2){
                        //be sure to add the free space
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='0-$i' onclick='mark(0, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='1-$i' onclick='mark(1, $i, $id)'>". $words . "</th>";
                        $table .= "<th id='2-$i' onclick='mark(2, $i, -1)'>Free Space</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='3-$i' onclick='mark(3, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='4-$i' onclick='mark(4, $i, $id)'>". $words . "</th>";

                }
                else{
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='0-$i' onclick='mark(0, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='1-$i' onclick='mark(1, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='2-$i' onclick='mark(2, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='3-$i' onclick='mark(3, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='4-$i' onclick='mark(4, $i, $id)'>". $words . "</th>";
                }
                $table .= "</tr>";

        }
        $table .= "</table>";
        echo $table;

	}
}
/*
$query = "SELECT * FROM squares ORDER BY RAND() LIMIT 24";
$squares = mysqli_query($con, $query);

$text = array();
if(mysqli_num_rows($squares) > 0){
        while($row = mysqli_fetch_assoc($squares)){
				$tile = new Tile();
				$tile->id = $row['id'];
				$tile->text = $row['text'];
                array_push($text, $tile);
        }


        $table = "<table>";

        $idx = 0;
        for($i = 0; $i < 5; ++$i){
                $table .= "<tr height='150px' width='150px'>";
                if($i == 2){
                        //be sure to add the free space
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='0-$i' onclick='mark(0, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='1-$i' onclick='mark(1, $i, $id)'>". $words . "</th>";
                        $table .= "<th id='2-$i' onclick='mark(2, $i, -1)'>Free Space</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='3-$i' onclick='mark(3, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='4-$i' onclick='mark(4, $i, $id)'>". $words . "</th>";

                }
                else{
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='0-$i' onclick='mark(0, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='1-$i' onclick='mark(1, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='2-$i' onclick='mark(2, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='3-$i' onclick='mark(3, $i, $id)'>". $words . "</th>";
						$id = $text[$idx]->id;
						$words = $text[$idx++]->text;
                        $table .= "<th id='4-$i' onclick='mark(4, $i, $id)'>". $words . "</th>";
                }
                $table .= "</tr>";

        }
        $table .= "</table>";
        echo $table;

}
else{
        echo "No data :(";
}
*/
?>
	</div>

	<div class='stars'></div>
</div>
</body>
</html>