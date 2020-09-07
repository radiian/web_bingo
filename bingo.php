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

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if(!$con){
        die("Something went wrong");
}


$query = "SELECT * FROM squares ORDER BY RAND() LIMIT 24";
$squares = mysqli_query($con, $query);

$text = array();
if(mysqli_num_rows($squares) > 0){
        while($row = mysqli_fetch_assoc($squares)){
                array_push($text, $row['text']);
        }


        $table = "<table>";

        $idx = 0;
        for($i = 0; $i < 5; ++$i){
                $table .= "<tr height='150px' width='150px'>";
                if($i == 2){
                        //be sure to add the free space
                        $table .= "<th id='0-$i' onclick='mark(0, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='1-$i' onclick='mark(1, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='2-$i' onclick='mark(2, $i)'>Free Space</th>";
                        $table .= "<th id='3-$i' onclick='mark(3, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='4-$i' onclick='mark(4, $i)'>". $text[$idx++] . "</th>";

                }
                else{
                        $table .= "<th id='0-$i' onclick='mark(0, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='1-$i' onclick='mark(1, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='2-$i' onclick='mark(2, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='3-$i' onclick='mark(3, $i)'>". $text[$idx++] . "</th>";
                        $table .= "<th id='4-$i' onclick='mark(4, $i)'>". $text[$idx++] . "</th>";
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