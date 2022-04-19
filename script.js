var width = 20;
var height = 10;
var interval = null;
var index = 0
var allCells = Array(width * height);
class CellObj {
    setAlive() {
        if (this.cellDiv.classList.contains("unalive")) {
            this.cellDiv.classList.remove("unalive");
            this.cellDiv.classList.add("alive");
        } else if (!this.cellDiv.classList.contains("alive")) {
            this.cellDiv.classList.add("alive");
        }
        this.isAlive = true;
    }
    setUnalive() {
        if (this.cellDiv.classList.contains("alive")) {
            this.cellDiv.classList.add("unalive");
            this.cellDiv.classList.remove("alive");
        } else if (!this.cellDiv.classList.contains("unalive")) {
            this.cellDiv.classList.add("unalive");
        }
        this.isAlive = false;
    }
    cellOnclick() {
        if (this.isAlive) {
            this.setUnalive();
        } else if (!this.isAlive) {
            this.setAlive();
        } else {
            console.log("ERROR");
        }
    }
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.cellDiv = document.createElement("div");
        this.cellDiv.classList.add("cell");
        this.cellDiv.classList.add("unalive");
        this.isAlive = false;
        this.cellDiv.onclick = this.cellOnclick.bind(this);
    }
    getDiv() {
        return this.cellDiv
    }
    calculteNextState() {
        this.aliveCount = this.countAliveNeighbors();
        if (this.aliveCount < 2 || this.aliveCount > 3) {
            this.nextState = 0;
        } else {
            if (this.aliveCount == 2 && this.isAlive) {
                this.nextState = 1;
            } else if (this.aliveCount == 3) {
                this.nextState = 1;
            }
        }

    }

    applyNextState() {
        if (this.nextState == 1) {
            this.setAlive();
        } else if (this.nextState == 0) {
            this.setUnalive();
        }
    }

    countAliveNeighbors() {
        console.log("X: " + this.x + "\nY: " + this.y);
        let aliveCount = 0;
        for (var dx = -1; dx <= 1; dx++) {
            for (var dy = -1; dy <= 1; dy++) {
                if ((dx != 0 || dy != 0) && this.x + dx < width - 1 && this.x + dx >= 0 && this.y + dy < height - 1 && this.y + dy >= 0) {
                    let i = (this.x + dx) + (this.y + dy) * width;
                    console.log(i);
                    if (allCells[i].isAlive) {
                        aliveCount++;
                    }
                }
            }
        }
        console.log(aliveCount);
        return aliveCount;
    }
}

function popCalc(){
	for(const cell of allCells){
		if(cell.isAlive()){
			count++;
		}
	}
	document.getElementById("counter").innerHTML = count;
}

function startGame(){
    interval = setInterval(updateMap, 500, 1); 
}

function pauseMap(){
    if(interval != null){
        clearInterval(interval);
    }
}

function populate(width, height) {
    for (var y = 0; y < height; y++) {
        var r = document.createElement("tr");
        for (var x = 0; x < width; x++) {
            d = document.createElement("td");
            c = new CellObj(x, y);
            d.appendChild(c.getDiv());
            allCells[width * y + x] = c;
            r.appendChild(d);
        }
        const tbl = document.getElementById("gridTable");
        tbl.insertBefore(r, null);
    }
    console.log(allCells);
}

function resetMap() {
    pauseMap();
    for (const cell of allCells) {
        cell.setUnalive();
    }

}

function changePattern() {
	resetMap();
	if(document.getElementById("select").value == 1{
		// allCells.Cellobj[x][y].isAlive()= true; 
	} else if(document.getElementById("select").value == 2{
		// allCells.Cellobj[x][y].isAlive()= true;
	} else if(document.getElementById("select").value == 3{
		// allCells.Cellobj[x][y].isAlive()= true;
	}
	
}

function calculateNextGen() {
    for (const cell of allCells) {
        cell.calculteNextState();
    }
}

function updateNextGen() {
    for (const cell of allCells) {
        cell.applyNextState();
    }
}

function updateMap(increment) {
    for (var i = 0; i < increment; i++) {
        calculateNextGen();
        updateNextGen();
    }

}

