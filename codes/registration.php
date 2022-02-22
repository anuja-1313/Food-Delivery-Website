<!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="form.css">

<title>Registration</title>

</head>
<body>
<?php
require('db.php');

    
if (isset($_REQUEST['username'])){
       
 $username = stripslashes($_REQUEST['username']);
       
 $username = mysqli_real_escape_string($con,$username); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
    
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $trn_date = date("Y-m-d H:i:s");
    
    
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>

<center>
<div class="form">
<h1>Create Account</h1>

<div>
<img src="images/logo.jpg" width="120px">
<form name="registration" action="" method="post" onsubmit="return myfun()">
<input type="text" name="username" placeholder="Username" required /><br><br>
<input type="email" name="email" placeholder="Email" required /><br><br>
<input type="password" name="password" placeholder="Password" id="myInput" required>
<br>
<span id="messages"></span>
<br><br>
<input type="checkbox" onclick="myFunction()">Show Password
<br><br>

<input type="submit" name="submit" value="Register" /><br><br>
</form>

</div>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myfun() {

var a =document.getElementById("myInput").value;
	
if(a.length < 8) {
	document.getElementById("messages").innerHTML=" ** Password must be atleast 8 characters  ** ";
     return false;
}

if(a.length > 20) {
	document.getElementById("messages").innerHTML=" ** Password must not be longer than 20 characters  ** ";
     return false;
}
	
}

</script>

</div>
</center>
<?php } ?>

</body>
</html>