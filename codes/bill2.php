<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM empty WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>



<!DOCTYPE html>
<html>
<head>

<title>Bill</title>

   <link href="style.css" type="text/css" rel="stylesheet" />
    <link  rel="stylesheet" href="styling.css">
    
<meta charset="UTF-8" http-equiv="content-type">
<meta name="viewport" content="width=device-width,initial-scale=1">
    
<style>
    
    input[type=text] {
  width: 48%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
    
    
    textarea{
        width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
    }
    
    input[type=password] {
  width: 48%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
   
    

   
.notactive {
  background-color: #bbb;
    color:Black;

  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

    
    .activated{
        
        background-color: #b51515;
    color: white;
        border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
    }
    
    
    
    </style>



</head>



<?php

$con = mysqli_connect("localhost","root","","login");

if (isset($_REQUEST['sname'])){
        
    
            $sname = stripslashes($_REQUEST['sname']);
 $sname = mysqli_real_escape_string($con,$sname); 
    
    $mobnumber = stripslashes($_REQUEST['mobnumber']);
 $mobnumber = mysqli_real_escape_string($con,$mobnumber); 
    
    $pincode = stripslashes($_REQUEST['pincode']);
 $pincode = mysqli_real_escape_string($con,$pincode); 
    
    $shouse = stripslashes($_REQUEST['shouse']);
 $shouse = mysqli_real_escape_string($con,$shouse); 
    
    $sarea = stripslashes($_REQUEST['sarea']);
 $sarea = mysqli_real_escape_string($con,$sarea); 
    
    $scity = stripslashes($_REQUEST['scity']);
 $scity = mysqli_real_escape_string($con,$scity); 
    
    $sstate = stripslashes($_REQUEST['sstate']);
 $sstate = mysqli_real_escape_string($con,$sstate); 
 
        $query = "INSERT into `deliver`  (sname, mobnumber, pincode, shouse, sarea, scity, sstate)
VALUES ('$sname', '$mobnumber', '$pincode', '$shouse', '$sarea', '$scity', '$sstate')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='sform'>
<h3>Order Successful.</h3>
<br/>Click here to <a href='index.php'>Order again</a></div>";
        }
    }else{
?>


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



<div id="shopping-cart">
<div class="txt-heading">Food Cart</div>


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "₹ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "₹ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="bill2.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "₹ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">

	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM empty ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="bill2.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "₹".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    </div>     
               
     

<br><br>




<div class="webpage">


<h1>Pay the bill</h1>
<br><br>

<div>

  
  <button class="notactive" onclick="window.location.href = 'bill.php';">Payment by Card</button>
  <button class="activated" onclick="window.location.href = 'bill2.php';">Cash on Delivery</button>
  

    </div></div>

<br><br><br>


<div >
  <div class="sform">

<form name="registration" action="" method="post" onsubmit="return myfun()">
<p class="card">Delivery Details:</p><br>

<input type="text" placeholder="Name" name="sname" onkeypress="return isLetterKey(event)" required />&nbsp;&nbsp;&nbsp;

<input type="text" placeholder="Mobile Number" name="mobnumber" id="mnumb" onkeypress="return isNumberKey(event)" required /><br>
<span id="messagessss" style="color:red"></span><br><br>

<input type="text" placeholder="Pincode" name="pincode" onkeypress="return isNumberKey(event)" required /><br><br>

<input type="text" placeholder="House No., Building name" name="shouse" required />&nbsp;&nbsp;&nbsp;

<input type="text" placeholder="Road Name, Area, Colony" name="sarea" required /><br><br>

<input type="text" placeholder="City" name="scity" required />&nbsp;&nbsp;&nbsp;
<input type="text" placeholder="State" name="sstate" required /><br><br>

<input type="submit" name="submit" value="Place Order" class="pay"/>

</form>

</div>
   
   
    </div>  <br><br><br>    
   
    <img src="images/deliver.jpg" width="500px" style="margin-left: 500px;">

 <div class="footer" style="margin-top:350px;">
	<a href="index.php"><img src="images/logo.jpg" width="80px"></a>
    <div class="links"><a href="aboutus.php">About us</a>&nbsp&nbsp
    <a href="contactus.php">Contact</a></div><br><br>
        <div class="bottom"><p>For the love of food</p></div>
    </div>

<script>

function myfun() {

var b = document.getElementById("cardno").value;
var c = document.getElementById("cvvno").value;
var a = document.getElementById("mnum").value;    
//var a = document.getElementById("name").value;
	
if(b.length != 12 || isNaN(b)) {
	document.getElementById("messages").innerHTML=" ** Incorrect Card Number ** ";
     return false;
}

if(c.length != 3 || isNaN(c)) {
	document.getElementById("messagess").innerHTML=" ** Incorrect cvv number ** ";
     return false;
}
    
if(a.length != 10 || isNaN(a)) {
	document.getElementById("messagesss").innerHTML=" ** Incorrect mobile number ** ";
     return false;
}    
	
}
    

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
    

 function isLetterKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if ((charCode < 96 || charCode > 123) && (charCode < 64 || charCode > 91) && (charCode != 32))
            return false;

         return true;
      }   
    
    
    
</script>


<?php } ?>


</body>
</html>