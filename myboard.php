<?php
session_start();
//get all data from files first
if(!isset($_SESSION['user'])){
    header("location: ./userlogin.php");
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Game of Life</title>
</head>

<body>
    
    <script type="text/javascript" src="script.js">
    </script>
    <h1 class="center2">Conway's Game of Life</h1>


    <div class="gridArea center3">
        <table id="gridTable">
            <script>
                populate(20, 10);
            </script>
        </table>
    </div>
	
	<div class="mapControl center3">
	<h2> Map Controls </h2>
		<button class="button" onclick="startGame()">Start</button>
		<button class="button" onclick="pauseMap()">Stop</button>
		<button class="button" onclick="updateMap(1)">Update</button>
		<button class="button" onclick="updateMap(23)">Increment 23</button>
		<button class="button" onclick="resetMap()">Reset</button>
        <br>
        <div class="patternSelection" style= "width: 200px;">
            <h2>Select a Pattern</h2>
            <select id="select" onchange="changePattern()">
                <option value="0">Select a Preset</a>
                <option value="1">The Block</a>
                <option value="2">The Blinker</a>
                <option value="3">The Beacon</a>
            </select>
        </div>
	</div>
	

	<div class="popView">
        <p>Welcome <?php echo $_SESSION['user']?></p>
        <br>
		<p onload = "popCalc()">Population: <span id="counter"></span></p>
        <br>
		<button class="small" onclick="window.location.href='./logout.php'">Log Out</button>
	</div>
	
	
</body>

</html>