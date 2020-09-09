var board = [
[false, false, false, false, false ],
[false, false, false, false, false ],
[false, false, false, false, false ],
[false, false, false, false, false ],
[false, false, false, false, false ]
]


function checkrow(row){
	if(board[row][0] == true &&
		board[row][1] == true &&
		board[row][2] == true &&
		board[row][3] == true &&
		board[row][4] == true){
			return true;
	}
	else{
		return false;
	}
}

function checkcol(col){
	if(board[0][col] == true &&
		board[1][col] == true &&
		board[2][col] == true &&
		board[3][col] == true &&
		board[4][col] == true){
			return true;
	}
	else{
		return false;
	}
}

function checkdiag(){
	if(board[0][0] == true &&
		board[1][1] == true &&
		board [2][2] == true &&
		board [3][3] == true &&
		board[4][4] == true){
				return true;
	}
	if(board[0][4] == true &&
		board[1][3] == true &&
		board[2][2] == true &&
		board [3][1] == true &&
		board [4][0] == true){
			return true;
	}
	else{
		return false;
	}
}
function checkwins(){
	//check rows
	for(i = 0; i < 5; ++i){
		if(checkrow(i) == true || checkcol(i) == true){
			//you win!
			window.alert("You win!");
			location.reload();
			return;
		}
	}
	if(checkdiag()){
		window.alert("You win!");
		location.reload();
	}
}

//increment/decriment the number of times a tile id
//has been selected
function db_count(id, selected=true){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			console.log("transaction result: " + this.responseText);
		}
	}
	xhttp.open("POST", "stats.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	
	if(selected == true){
		//increment the selected tile
		xhttp.send("tile_select=" + id);
	}
	else{
		//decriment the selected tile
		xhttp.send("tile_deselect=" + id);
	}
}

//this version of mark increments the cell count in the database
function mark(x, y, id){
	if(id == -1){
		return;
	}
	cell = document.getElementById(String(x) + "-" + String(y));
	if(board[x][y] == false){
		board[x][y] = true;
		cell.style["background-color"] = "green";
		
		//mark it in the database
		db_count(id);
	}
	else{
		board[x][y] = false;
		cell.style["background-color"] = "#c7c5c5ee";
		//unmark it in the database
		db_count(id, false);
	}
	checkwins();
}
