<?php
//include auth.php file on all secure pages
include("auth.php");


?>



<!DOCTYPE html>
<html>

<head>
<title>HOMEPAGE</title>
    <link  rel="stylesheet" href="styling.css">
<meta charset="UTF-8" http-equiv="content-type">
<meta name="viewport" content="width=device-width,initial-scale=1">
   
   
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
      
    
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
            
            <li><a href="#categories">Categories</a></li>
            
         </ul>
     </div>
        
                    
        

        <div class="slides" style="max-width: 100%">
        
            <img class="myslides" src="images/a.png" style="width: 1520px" height="400px">
            <img class="myslides" src="images/b.png" style="width: 1520px" height="400px">
            <img class="myslides" src="images/b.jpg" style="width: 1520px" height="400px">
            <img class="myslides" src="images/d.jpg" style="width: 1520px" height="400px">
            <img class="myslides" src="images/e.jpg" style="width: 1520px" height="400px">
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            
        </div>
        
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
                }
            
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("myslides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
        
        
        
</script>
        
<script>
    var myIndex=0;
    carouse1();
            
function carouse1() {
    var i;
    var x= document.getElementsByClassName("myslides");
    for(i=0; i < x.length; i++){
    x[i].style.display="none";
        }
    myIndex++;
        if(myIndex > x.length){myIndex = 1}
        x[myIndex-1].style.display="block";
        setTimeout(carouse1,3000);
            }
</script>
           
           
            <div class="webpage">
               
        <br><br><br>
        
        <div class="decor">
            <p style="text-align:center;" >Trending this week</p></div>
         <br><br><br>
         
          <a href="index2.php"><img src="product-images/chilli.jpg" style="float:right;"></a>
                <a href="index6.php"><img src="product-images/applesausage.jpg" style="float:right;"></a>
                <a href="index6.php"><img src="product-images/chickencheese.jpeg" style="float:right;"></a>
              
           <p style="font-size: 20px; color: #b51515;">GET <b>20%</b> OFF</p><br><br>
           <p style="font-size: 20px;">Get massive discounts on tasty treats every week</p>    
        
        
        <br><br><br><br>
        
        <div class="decor">
            <p style="text-align:center; margin-top: 70px;" >New Additions!</p></div>
            <br><br><br>
            <div>
                <a href="index4.php"><img src="product-images/besanladoo.jpg" style="float:right;"></a>
                <a href="index4.php"><img src="product-images/karanji.jpg" style="float:right;"></a>
                <a href="index4.php"><img src="product-images/sujihalwa.jpg" style="float:right;"></a>
               
                <p style="font-size: 20px;">Enjoy these new Diwali Additions at an amazing price! Celebrate the festival with your loved ones and tones of sweets from Foodism. Foodism wishes you and your family <b>Happy Diwali!</b></p>
                </div>
            <br><br><br><br>
         
		<div class="decor">
            <p style="text-align:center; margin-top: 30px;" id="categories">Discover your new favourites here</p></div>
		 <br>
     <br>
                
        </div> <br><br>
       
       <div class="web">
       
       <div class="wrapper">
           
           <div class="menu">

          <div class="container">
           <a href="index3.php">
             <img src="images/indian.jpeg" alt="Indian Food" class="image">
           <div class="overlay">
             <div class="text">Indian Food</div>
             </div></a>
          </div>
           </div>
           
           <div class="menu">

          <div class="container">
           <a href="index2.php">
             <img src="images/chinese.jpg" alt="Chinese Food" class="image">
           <div class="overlay">
             <div class="text">Chinese Food</div>
             </div></a>
          </div>
           </div>
           
           <div class="menu">

          <div class="container">
           <a href="index5.php">
             <img src="images/italian.jpg" alt="Italian Food" class="image">
           <div class="overlay">
             <div class="text">Italian Food</div>
             </div></a>
          </div>
           </div>
           
           <div class="menu">

          <div class="container">
           <a href="index7.php">
             <img src="images/thai.jpg" alt="Thai Food" class="image">
           <div class="overlay">
             <div class="text">Thai Food</div>
             </div></a>
          </div>
           </div>
           
           <div class="menu">

          <div class="container">
           <a href="index6.php">
             <img src="images/continental.png" alt="Continental Food" class="image">
           <div class="overlay">
             <div class="text">Continental Food</div>
             </div></a>
          </div>
           </div>
           
           <div class="menu">

          <div class="container">
           <a href="index4.php">
             <img src="images/desserts.jpg" alt="Desserts" class="image">
           <div class="overlay">
             <div class="text">Desserts</div>
             </div></a>
          </div>
           </div>
                
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

