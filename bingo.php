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
 <span class='sub'>Randy Loser's</span>
 <span>Protest Bingo</span>
 </div>
 
 <div class='card'>

<?php
require_once('db.php');

class Tile{
	public $id;
	public $text;
	

}

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if(!$con){
        die("Something went wrong");
}


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

?>
</div>
</div>
</body>
</html>