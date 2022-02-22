<?php
//include auth.php file on all secure pages
include("auth.php");


?>


<!DOCTYPE html>
<html>

<head>
<title>About Us</title>
    <link  rel="stylesheet" href="styling.css">
<meta charset="UTF-8" http-equiv="content-type">
<meta name="viewport" content="width=device-width,initial-scale=1">
   
   
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
  
      
<style>
    

    h1{
        color: #b51515;
         font-family: 'Pacifico', cursive;
        text-align: center;
        text-shadow: 4px 4px 8px white;
        font-size: 30px;
 
    }
    
    h2{
        text-align:center;
        color: black; 
    }
    
    h3{
        color: #b51515;
         font-family: 'Pacifico', cursive;
        font-size: 25px;

    }
    
    .web{

        width: 90%;
        margin: auto;
        border-bottom: 3px dotted #bbb;
        padding-bottom: 60px;
        
    }
    
    .content{

       margin: 60px;
        width: 90%;
        margin:auto;
         border-radius: 5px;

    }
    
    .para{
        font-size: 20px;
        color: #272727;
        text-align: center;
        padding-top: 25px;
    }
    
    .qoute{
        text-align:center; 
        font-size: 25px;
         color: #b51515;
         font-family: 'Pacifico', cursive;
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
     
    
       
        
<div class="food">
<header><br><br><br>
<div class="webpage">

<h2>- OUR MISSION -</h2><br>

<h1 style="border-bottom: 3px dotted #bbb; padding-bottom: 20px;">Shaping the future of food</h1>

<br>


<div class="content">
<h2 style="padding-top:30px; font-size: 20px; color: #272727">- About Us -</h2>
<br><br><br>
<div class="web">
    <h3 style="margin-left:250px;">Hello!</h3><br>

  <img src="images/order.png" style="float:right;margin; margin-left:30px;" width="350px">
  
   <p class="para">Foodism is an online food ordering system where we aim to bring the highest quality food to your doorstep. 
   A couple of clicks and it's that easy. Order food from anywhere and satisfy your cravings in a jiffy. 
</p><br>
   <p class="para">We value consumer feedback so make sure you get in touch and let us know what you think.</p>
    
</div>


<br><br>
   
   <h2 style="padding-top:30px; font-size: 20px; color: #272727">- Our Vission -</h2><br><br>
   
   <h3 style="text-align: center;">Changing the game!</h3><br>

   <p class="para">We're digital nomads, living a digital life! And one thing that we have learned over the course of this evolution is that whatever we want or need, can be obtained with just a few clicks on our beloved smart devices. Even the food - all kinds, to satiate our different cravings on different days of the week. Here at Foodism we aim to make this process as simple as possible.
</p><br>
  
  <p class="para">
      We aim to spread throughout the country and make quality food easily accessible.
  </p><br><br><br>
  
  <div>
      <p class="qoute">“One cannot think well, love well, sleep well, if one has not dined well.”</p>
  </div><br><br><br>
   
   <img src="images/order2.png" style="margin-left: 350px;">
   
   
    </div>
    </div>
 
        
        
        <div class="footer" style="margin-top:70px;">
	<a href="index.php"><img src="images/logo.jpg" width="80px"></a>
    <div class="links"><a href="aboutus.php">About us</a>&nbsp&nbsp
    <a href="contactus.php">Contact</a></div><br><br>
        <div class="bottom"><p>For the love of food</p></div>
    </div>
            
        
    </body>
        
    
</html>