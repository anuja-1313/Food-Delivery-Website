<?php
session_start();
require_once("dbcontroller.php");

$db_handle = new DBController(); 

$con = mysqli_connect("localhost","root","","login");

if (isset($_REQUEST['comment'])){
        
            $comment = stripslashes($_REQUEST['comment']);
        
 $comment = mysqli_real_escape_string($con,$comment); 
    
$name = stripslashes($_REQUEST['name']);
 $name = mysqli_real_escape_string($con,$name);
        $query = "INSERT into `comment` (name ,comment)
VALUES ('$name','$comment')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='contactform'>
<h3>Successfully Posted.</h3>
<br/>Click here to <a href='index.php'>Continue</a></div>";
        }
    }else{
?>

<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>


<link rel="stylesheet" href="styling.css">

<style>
    
header{
border:2px solid black;
padding:35px;
text-align: center;
font-size:20px;
color: white;
width:98;
} 

form{
border:1px solid black;
padding:10px; 
width:80%;
}
.contact-form-text{
display:block;
width:50%;
box-sizing:border-box;
margin:10px 0;
border:1px solid blue;
background:white;
padding:20px 40px;
color:black;
font-size: 20px;
}

.contact-form-text:focus{
box-shadow:0 0 10px 4px gray;
}
    
#box{
display:block;
width:50%;
box-sizing:border-box;
margin:10px 0;
border:1px solid blue;
background:white;
padding:20px 40px;
color:black;
}
#box:focus{
box-shadow:0 0 10px 4px gray;
}

textarea.contact-form-text{
resize:none;
}

.contact-form-btn{
border:1px solid black;
background:lightblue;
color:black;
padding:12px 50px;
border-radius:20px;
cursor:pointer;
font-size: 20px;
}

.contact-form-btn:hover{
background:royalblue;
}

.information{
border:1px solid black;
padding:12px 50px;
    font-size: 20px;
width:75%;
background-color: aliceblue;
}
.hear{
    background-image: url(images/hear.jpg);
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover; 
    width: 1250px;
    }
   
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
a{
    text-decoration: none;
    outline: none;
    
}
    .comment{
        background: #ccc;
        height :auto;
        margin:30px;
    width: 70%;
    margin: auto;
    overflow: hidden;

        
    }
    
    

    
    .comment p {
        padding:5px;
    margin-left: 20px;
    }

</style>

</head>

<body>
    
            <div class="headertop">
          <ul>
      
              <a href="index.php">
        <img src="images/logo.jpg" style="width: 100px" "padding: 0px 0px" "margin-top: 0px">
              </a>
              
              <a class="foodism" href="index.php">FOODISM</a>
             
              <li><a href="logout.php">Logout</a></li>
            
            <li style="color:ivory;"><a href="#"><?php echo "Hello ". $_SESSION["username"]; ?></a></li>
            
            <li><a href="index.php">Categories</a></li>
            
         </ul>
     </div>
<br><br>

    
<center>
    <div class="hear">
<header>
    
<h1>We would love to hear from you!</h1> 
    
    </header>
    </div>
        <br><br>

<div class="contactform">
<form class="contact-form" action="contactus.php" method="post">
<input type = "text" name="name" placeholder="name" required class="contact-form-text">
<textarea name="comment" cols="30" rows="10" class="contact-form-text" placeholder="Your Message"></textarea>
<input type="submit" class="contact-form-btn" value="send">
</form> 
</div><br> <br>

<div class="information">
<p><b>Contact Number:</b>+91 1800-516-151</p>
<p><b>Email Id:</b>foodism@gmail.com</p>
</div>
</center>
<br><br>
<div class="comment">
<?php
          
          $query = "SELECT * from comment;" ;
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)) {
    echo "<p> ".  $row["name"]. ":</p>" ; 
    echo "<p> ".  $row["comment"]. "</p>" ;
    
    echo "<br/><br/>";
}


    ?></div>

<div class="footer" style="margin-top:70px;">
	<a href="index.php"><img src="images/logo.jpg" width="80px"></a>
    <div class="links"><a href="aboutus.php">About us</a>&nbsp&nbsp
    <a href="contactus.php">Contact</a></div><br><br>
        <div class="bottom"><p>For the love of food</p></div>
    </div>
<?php } ?>
</body>


</html>