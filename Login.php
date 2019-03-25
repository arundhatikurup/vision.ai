
<!DOCTYPE HTML>
<html>
<body>
<?php 

//include_once("DBConnection.php"); 
session_start(); //always start a session in the beginning 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code 
{ 
	
echo 
"Incorrect username or password"; //
header("location: LoginForm.php");//You will be sent to Login.php for re-login 
} 
$inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
$inPassword = $_POST["password"]; 

$con=mysqli_connect('localhost:3306', 'arundhati', 'arundhati', 'user');

$query = "SELECT * FROM `PROFILE` WHERE username='$inUsername' AND password='$inPassword'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{

	$_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
	header("location: UserProfile.php"); 

}
else
{
echo "Incorrect username or password"; 
?>
<a href="LoginForm.php">Login</a>
<?php 
} 
} 
?>
</body> 
</html>


