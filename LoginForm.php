
<!DOCTYPE HTML>
<html>
<head>
<title>LoginForm.php</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="Style.css"/>
<!-- Javascript validation for user inputs -->
<script type="text/javascript">
function validate()
{
var username = document.login.username.value;
var password = document.login.password.value;
if (username==null || username=="")
{
alert("Username can't be blank");
return false;
}
else if (password==null || password=="")
{
alert("password can't be blank");
return false;
}
}
</script>
</head>
<body>
<img src="pics/login.png" alt="uni logo" style="width:200px;height:200px;margin-left:42%">
<p> </p>
<form name="login" style="text-align: center;" method="post" action="Login.php" onsubmit="return validate();">
<div><input type="text" name="username" placeholder="Username" required/> </div>
<div><input type="password" name="password" placeholder="password" required/> </div>
<p> </p>
<p> </p>
<div><input type="submit"value="Login"></input> <input type="reset" value="Reset"></input></div>
<p></p>
</form>
</body>
</html>