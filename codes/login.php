<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

<link rel="stylesheet" href="form.css">

</head>
<body>
<?php
require('db.php');
session_start();

if (isset($_POST['username'])){
        
 $username = stripslashes($_REQUEST['username']);
        
 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
          
     header("Location: index.php");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>    

<center>
<div class="form">
<h1>Log In</h1>
<img src="images/logo.jpg" width="120px">
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br><br>
<input type="password" name="password" placeholder="Password" id="myInput" required><br><br>
<input type="checkbox" onclick="myFunction()">Show Password<br><br>

<input name="submit" type="submit" value="Login" /><br><br>
</form>
<p>Don’t have an account?</p><a href='registration.php'>Create Account</a>
</div>
</center>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php } ?>
</body>
</html>