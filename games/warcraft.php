
<?php
	session_start();
?>
<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_HOST,  DB_USER,  DB_PASSWORD))or die("cannot connect, error: ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')))or die("cannot select DB, error: ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	$tbl_name="topic"; // Table name
?>
<!doctype html>
<html lang="en">
<head>
  <title>Planet of Warcraft</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href = "../style/base.css">
</head>
<script type="text/javascript" src="../javascript/jquery-3.2.0.js"></script>
<script type="text/javascript">
function changeImage(a) {
        document.getElementById("imageMain").src=a;
    }
$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

	if(counter > 2){
            return false;
	}
	var newTextBoxDiv = $(document.createElement('div'))
		.attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.after().html('<h2>Game Title</h2>' + '<textarea name="review" form="reviewform"></textarea>' + counter + '" id="textbox' + counter + '" value="" >' + '<input type="submit" id="submitreview" value="Submit">' + '<input type="reset" name="Submit2" value="Reset">');

	newTextBoxDiv.appendTo("#TextBoxesGroup");


	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          return false;
       }

	counter--;

        $("#TextBoxDiv" + counter).remove();

     });
  });
</script>
<body>

<div id="mainhome">

	<div id="header">
	<a href="index.php"><img src="images/logo.png" width="254" height="100" alt="TechDirect"/></a>
<?php
		if (isLoggedIn()){
			echo '<a href="logout.php"><button type="button" class="pointer">Logout</button></a>';
			echo '<div id="welcome">',"welcome",'<br>',$_SESSION['SESS_FIRST_NAME'],'</div>';	
		} else {
			echo '<a href="signup.php"><button type="button" class="pointer">Sign Up/Login</button></a>';
		}
?>
	</div>

<div id="nav">
	<ul>
	<li>
	<div class="dropdown">
		<button class="dropbtn">Consoles</button>
		<div class="dropdown-content">
			<a href="../pc.php" id="pcdropdown">PC</a>
			<a href="../xbox.php" id="xboxdropdown">Xbox One</a>
			<a href="../ps4.php" id="psdropdown">PS4</a>
			<a href="../switch.php" id="switchdropdown">Switch</a>
			<a href="../mobile.php" id="mobiledropdown">Mobile</a>
		</div>
	</div>
	</li>
	<li><a href="../directory.php">Directory</a></li>
	<li><a href="../mainforumpage.php">Community</a></li>
	</ul>
</div>

<div id="main">
<h1>Planet of Warcraft</h1>
<div id="gamepics">
	<div id="mainimage">
		<img id="imageMain" class="active" src="../Images/pow.png" alt="game pic">
	</div>
	<div id="sideimages">
		<img id="side1" class="side" src="../images/pow1.png" alt="game pic" onclick='changeImage("../images/pow1.png");' style="margin-left: -10px;"> 
		<img class="side" src = "../images/pow2.png" alt="game pic" onclick='changeImage("../images/pow2.png");' style="margin-left: 15px;">  
		<img class="side" src = "../images/pow3.png" alt="game pic" onclick='changeImage("../images/pow3.png");' style="margin-left: 15px;">
	</div>
	</img>
</div>

<div id ="gameinfo">
  <div class = "gamedescrip">
  <h1>What is Planet of Warcraft</h1>
	<p style="color: black;"> Planet of Warcraft, also known as POW, is an Massively Multiplayer Online Role Playing Game.  You start as a character entering the world of Blazeroth.  Not only can you customize what your character looks like, but also what race, class and faction they belong to.  You can choose one of two factions - Alliance or the Horde.  Each will have its own cities and backstory.  Then you can choose what race your character will be and each race is limited to certain classes.  This give you limited choices, but they make sense lorewise.  You then start the game in your starting city with respect to your race and faction.  
	<br><br>
From there you level up to be the very best, like there no-one ever was.  You can embark on quests to slay monsters or collect a certain amount of things.  As you level up, there are instances you can run with multiple bosses inside.  As you progress, your equipment gets better and better.  Once the level cap has been reached, you’re able to go on raids with your guilds where they can last for hours.  Raids are basically instances but on steroids.  
If PVE is not your thing, there is also PVP.  In POW, there is such thing as battlegrounds with different playmodes.  You compete against other people on different servers to attain an objective.  There is Warsong Gulch, Arathi Basin, and Alterac Valley.  Warsong Gulch is 10v10 capture the flag.  Arathi Basin is King of the Hill multiple points that you must capture and hold.  Arathi Basin is 40v40 where two teams attempt to capture the opposing team’s main base.  There are multiple mini bosses you must fight before reaching the main base.  
	<br><br>
With so much to do, one can spend countless hours in this immersive world of Warcraft.  Not only can you be playing and levelling up, but there is a whole world of lore for you to explore.  Each quest, dungeon, boss, raid will have some sort of backstory to it.  Lastly, there are also achievements people can aim to achieve as they progress with the game.

<p>
	</div>
	<div id="sysgame">
	<h3 class="specs" style="padding-top: 15px;">Console:</h3>
	<p class="specs2">PC, Mac</p>
	<h3 class="specs">Genre:</h3>
	<p class="specs2">Fantasy</p>
	<h3 class="specs">Developer:</h3>
	<p class="specs2">SnowStorm Inc.</p>
	<h3 class="specs">Publisher:</h3>
	<p class="specs2">SnowStorm Inc.</p>
	<h3 class="specs">Release Date:</h3>
	<p class="specs2">November 23, 2004</p>
	</div>
	
	<div id="gamereview">
		<h2 id="paddingreviews">Review</h2>
		<p id="gamereviewp">Its a game. </p>
	</div>
</div>

<div id="footer">
<a href="about.php">About Us</a> | 
<a href="contactus.php">Contact Us</a>
<p>&copy; TechDirect 2017</p>
</div>
</div>
</body>
</html>  
