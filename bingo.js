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

function mark(x, y){
	cell = document.getElementById(String(x) + "-" + String(y));
	if(board[x][y] == false){
		board[x][y] = true;
		cell.style["background-color"] = "green";
		//cell.css('background-color', '#00ff00ff');
		//cell.style["opacity"] = 1;
	}
	else{
		board[x][y] = false;
		//cell.css('background-color', '#c7c5c5');
		cell.style["background-color"] = "#c7c5c5ee";
		//cell.style["opacity"] = 0.19;
	}
	checkwins();
}