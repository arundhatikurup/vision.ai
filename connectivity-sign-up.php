<?php
function NewUser()
{$fullname = $_POST['name'];
$userName = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['pass'];
$loggedin=0;

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost:3306", "arundhati", "arundhati", "user");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO PROFILE(fullname,email,userName,password,loggedin) VALUES  ('$fullname','$email','$userName','$password', '$loggedin')";
if(mysqli_query($link, $sql)){
    echo 'registration successful';
    //header("Location: http://localhost:82/final/LoginForm.php");
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
if(isset($_POST['submit']))
{
NewUser();
}
?>

<html>
<body>
	<a href=" http://localhost:82/final/LoginForm.php">Login</a>
</body>
</html>