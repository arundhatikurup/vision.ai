<html>
<head>
	
	<style type="text/css">
      #chart-container {
        width: 640px;
        height: auto;
      }

      #p1{
      	margin-left: 45%;
      }

      .navbar {
  		width: 100%;
  		background-color: #ADD8E6;
  		overflow: auto;
  		display: inline-block;

		}

  	#d1{
  		margin-left: 90%;
  		font-weight: bold;
  		}	

  	#d2{
  		margin-left: 90%;


  	}	

  		. {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 3tab0%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 42%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 40%;
  border-left: none;
  height: 400px;
}

    </style>
</head>

<title>Dashboard</title>
<body>
 <?php
 session_start();
 $username = $_SESSION['username']; //retrieve the session variable
 ?>
 
 <div style="text-align:center"><h2> VISION.ai Dashboard</h2></div>
 <p id="d1"> Hello <?php echo $username ?> !</p>
 <div id="d1"><a href="Logout.php">Logout</a></div>

 <?php
 	if(!isset($_SESSION['username'])) //If user is not logged in then he cannot access the profile page
 	{
 	//echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
 	header("location:LoginForm.php");
 	}
 ?>
 
 <aside>
 	
 <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Daily')" id="defaultOpen">Daily</button>
  <button class="tablinks" onclick="openCity(event, 'Weekly')">Weekly</button>
  <button class="tablinks" onclick="openCity(event, 'Monthly')">Monthly</button>
  </div>
    
 	<div id="Daily" class="tabcontent">


 	<p>Number of anomalies today :</p>
 	<?php

 	define('DB_HOST', 'localhost:3306');
	define('DB_USERNAME', 'arundhati');
	define('DB_PASSWORD', 'arundhati');
	define('DB_NAME', 'user');

	//get connection
	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(!$mysqli){
  	die("Connection failed: " . $mysqli->error);
	}

	$date=date("Y-m-d");

	$query = sprintf("SELECT score FROM anomaly where DATE(timestamp)='$date' AND score>0.7");

	$result = $mysqli->query($query);

	//loop through the returned data
	$data = array();
	foreach ($result as $row) {
  		$data[] = $row;
  	}	

  	echo count($data);	


 	?>

</div>

<div id="Weekly" class="tabcontent">
  
 	<?php

	//get connection
	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(!$mysqli){
  	die("Connection failed: " . $mysqli->error);
	}

	$date=date("Y-m-d");

	$query = sprintf("SELECT timestamp FROM   anomaly where score in (SELECT score FROM   anomaly WHERE score >0.95 and YEARWEEK(date(timestamp), 2) = YEARWEEK(CURDATE(), 2));");

	$result = $mysqli->query($query);

	
	echo "<p>Anomaly reported at:</p>";
  	
  	$p=0;
  	while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
    foreach ($row as $field => $value) {  
    {
        echo "<td>" . $value . "</td>"; 
    	echo "</br>";
    	$p=$p+1;
    }
    echo "</tr>";

}

  }
  echo "<p>Number of anomalies this week :</p>";
  echo $p;

 	?>


</div>	

<div id="Monthly" class="tabcontent">
  
  <?php

	//get connection
	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(!$mysqli){
  	die("Connection failed: " . $mysqli->error);
	}

	$date=date("Y-m-d");

	$query = sprintf("SELECT timestamp FROM anomaly WHERE score >0.95 and month(timestamp)=3;");

	$result = $mysqli->query($query);

	
	echo "<p>Anomaly reported at:</p>";
  	
  	$p=0;
  	while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
    foreach ($row as $field => $value) {  
    {
        echo "<td>" . $value . "</td>"; 
    	echo "</br>";
    	$p=$p+1;
    }
    echo "</tr>";

}

  }
  echo "<p>Number of anomalies this month :</p>";
  echo $p;

 	?>

 

</div>	


 </aside>






 <header id="p1">
		
	<div id="chart-container">
     <canvas id="mycanvas"></canvas>
    </div>

    <!-- javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script> 

 </header>





<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
	



</body>
</html>