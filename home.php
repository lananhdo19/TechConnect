<!DOCTYPE html>
<html>
<head>
<title>TechConnect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title> TechConnect Home </title>
    <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Favicons -->
	<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
	<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
</head>




<!-- CSS Style Rules-->
<style>
.w3-Courier {
  font-family: "Courier", serif;
  color: black;
}
.productsTitle{
	 font-family: "Courier", serif;
     color: #000000;
	 align: left;
}

.upperNav{
    background-color: #00D8D8;
    margin-bottom: 0;
}
.upperNavTabs{
	color: white;
}

.middleNav{
    background-color: #00D8D8;
}

.middleNavTabs{
	color: white;
}

.ulBottomNav {
  list-style-type: none;
  margin: 0;
  margin-top: 0;
  padding: 0;
  overflow: hidden;
  background-color: #000000;
  display: flex;
  justify-content: space-around;
}
.liBottomNav {
  float: left;
}
.liBottomNav a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
}
.liBottomNav a:hover {
  background-color: #111;
}

.navbar {
    margin-bottom: 0;
}


.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

.imgex {width: 100%}
@media only screen and (max-width:768px){
    body{ background-color:black; }
	h3{ color: orange;}
    .imgex{width:100%;}
}

.image{
	background-size: contain;
	background-size: cover;
	background-position: center;
    padding-left: 10px;
	padding-right: 10px;
}


.overflow-hidden { overflow: hidden; }

.left {
  text-align: left;
  float: left;
}

.products {
    font-family: "Courier", serif;
    color: black;
    vertical-align: center;
    text-align:center;
    display:flex;
    justify-content:center;
    width: 40%;
    margin-left: 30%;
    margin-right: 30%
}
.product-popup {
  display: none;
  position: fixed;
  margin:auto;
  overflow:auto;
  top: 5px;
  right:-10px;
  left:-10px;
  bottom: 10px;
  border: 3px solid #f1f1f1;
  z-index: 10;
  vertical-align: middle;

}

.form-container {
  background-color: white;
  align:center;
  overflow:auto;
}

.message{
  display: none;
  position: fixed;
  top: 5px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

    img{
        width: inherit;
        height: 255px;
    }

</style>

<body class="imgex" style="background-color: #E3E6E7;">

<!-- Nav Bar --> 

<ul class="upperNav">
    <h2 class="w3-xlarge w3-Courier" >Tech Connect</h2>
    <h6 class = "w3-left-align w3-Courier"> The simplest, fastest way to find and sell the technology you are searching for at the price you like! </h6>
</ul>


<ul class="ulBottomNav">
  <li class="liBottomNav"><a href="#contact">About</a></li>
  <li class="liBottomNav"><a href="user.php">Account</a></li>
    <?php session_start(); ?>
    <?php
    if (isset($_SESSION['email'])) {
    ?>
    <li class="liBottomNav"><a href="logout.php">Sign Out</a></li>
    <?php } else{
    ?>
        <li class="liBottomNav"><a href="login-signup.php">Sign Up</a></li>
   <?php }?>
  <li class="liBottomNav"><a onclick="sendMessage()" href="#home">Message</a></li>


</ul>

<!-- Products --> 

<h3 class="w3-xlarge productsTitle" style="text-align:center"> Products </h3>
<br>
<div class="row" style="text-align:center;">
    <div class="column" style="text-align:center;">
        <button type="button" data-toggle="modal" class="products" onclick="openProducts('laptops')"> Laptops </button>
        <img src='data:image/jpeg;base64,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' alt="Laptop" class="image" style="width:90%" class="image">
    </div>
    <div class="column" style="text-align:center;">
        <button type="button" data-toggle="modal" class="products" onclick="openProducts('Headphones')"> Headphones </button>
        <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MV7N2?wid=1144&hei=1144&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1551489688005" alt="headphones" style="width:90%" class="image">
   </div>
    <div class="column" style="text-align:center;">
    <button type="button" data-toggle="modal" class="products" onclick="openProducts('TVs')"> TV's </button>
        <img src="https://mobilecontent.costco.com/live/resource/img/static-us-tiles/tv-sm-tile-320x220.jpg" alt="TV" style="width:90%" class="image">
  </div>
<div class="row" style="text-align:center;">
    <div class="column" style="text-align:center;">
        <button type="button" data-toggle="modal" class="products" onclick="openProducts('Gaming')"> Gaming consoles </button>
        <img src="https://images-na.ssl-images-amazon.com/images/I/61HvOYl7YuL._AC_SY355_.jpg" alt="Gaming" style="width:90%">
    </div>
    <div class="column" style="text-align:center;">
    <button type="button" data-toggle="modal" class="products" onclick="openProducts('Tablets')"> Tablets </button>
        <img src="https://cdn.mos.cms.futurecdn.net/DVgdvxbLT2HDCX7drM38ST.jpg" alt="tablet" style="width:90%">
   </div>
  <div class="column" style="text-align:center;">
    <button type="button" data-toggle="modal" class="products" onclick="openProducts('Desktops')"> Desktops </button>
    <img src="https://i.pcmag.com/imagery/reviews/04pC3hzS937QPLkjY2TV09f-23..v_1569472153.jpg" alt="Desktop" style="width:90%">
  </div>
</div>
<br>


<div class="message" id="message-user">
<form action="home.php" class="form-container">
    <h1> Send a Message </h1>

    <label for="To"><b>To:</b></label>
    <input type="text" placeholder="Recipient" name="username_1" id="username_1" required>

    <label for="from"><b>From:</b></label>
    <input type="text" placeholder="Your name" name="username_2" id="username_2" required>

    <label for="desc"><b>Message</b></label>
    <input type="text" placeholder="Enter message" name="text" id="text" required>

    <button type="submit" class="btn btn-primary" name="db-btn">Send</button>
    <button type="submit" class="btn btn-danger" onclick="closeForm()">Cancel</button></div>
</body>

<script>
    function sendMessage(){
        document.getElementById("message-user").style.display = "block";
    }
    function closeForm() {
        document.getElementById("message-user").style.display = "none";
    }
    function openProducts(type){
      switch (type) {
        case "laptops":
          document.getElementById("prod-form-LT").style.display = "block";
          break;
        case "Headphones":
          document.getElementById("prod-form-HP").style.display = "block";
          break;
        case "TVs":
          document.getElementById("prod-form-TV").style.display = "block";
          break;
        case "Gaming":
          document.getElementById("prod-form-G").style.display = "block";
          break;
        case "Tablets":
          document.getElementById("prod-form-TB").style.display = "block";
          break;
        case "Desktops":
          document.getElementById("prod-form-DT").style.display = "block";
          break;
      }
    }
    function closeProducts() {
        document.getElementById("prod-form").style.display = "none";
        document.getElementById("prod-form-LT").style.display = "none";
        document.getElementById("prod-form-HP").style.display = "none";
        document.getElementById("prod-form-TV").style.display = "none";
        document.getElementById("prod-form-G").style.display = "none";
        document.getElementById("prod-form-TB").style.display = "none";
        document.getElementById("prod-form-DT").style.display = "none";
    }
    function sortProducts() {

    }
</script>


<!--files needed for the database connection and functions -->

<?php 
require('connectdb.php'); 
require('home-db.php');
?>

<?php 
$msg = '';
$task_to_update = '';

if (!empty($_POST['db-btn']))
{
   if ($_POST['db-btn'] == "Sort")     {  
     sort_table();  }

   if ($_POST['db-btn'] == "Send") 
   {
    echo "does this work";
    if (!empty($_POST['username_1']) && !empty($_POST['username_2']) && !empty($_POST['text']))
      createMessage($_POST['username_1'], $_POST['username_2'], $_POST['text']);
    else {
      $msg = "Enter all information to send a message";
      echo $msg;
    }
}
if (!empty($_POST['action']))
{
  if ($_POST['action'] == "Delete")
   {
      if (!empty($_POST['item_id']) )
         deleteTask($_POST['item_id']);
   }
   
    if($_POST["username_1"] !="" && $_POST["username_2"] != "" && $_POST["text"] !="" )
    {
        $username_1 = $_POST["username_1"];
        $username_2 = $_POST["username_2"];
        $text= $_POST["text"];
        createMessage($username_1, $username_2, $text);
    //$sql = "INSERT INTO `messages` VALUES ( '$username_1','$username_2','$text')";
    //$result = mysql_query($sql,$db);
}
   }
}
$tasks = getAllTasks();
$LT = getListing('laptop');
$HP = getListing('headphones');
$TV = getListing('tv');
$G = getListing('gaming');
$TB = getListing('tablet');
$DT = getListing('desktop');
$prices = getPrice();
?>

<div class="product-popup" id="prod-form">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($tasks as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="action" value="purchase" class="btn btn-primary" />
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>   

<div class="product-popup" id="prod-form-LT">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($LT as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Purchase" name="action" class="btn btn-primary" />      
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>

<div class="product-popup" id="prod-form-HP">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($HP as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Purchase" name="action" class="btn btn-primary" />      
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>

<div class="product-popup" id="prod-form-TV">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($TV as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Purchase" name="action" class="btn btn-primary" />      
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>

<div class="product-popup" id="prod-form-G">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($G as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Purchase" name="action" class="btn btn-primary" />      
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>
<div class="product-popup" id="prod-form-TB">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($TB as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Purchase" name="action" class="btn btn-primary" />      
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>

<div class="product-popup" id="prod-form-DT">
<div class="form-container" style="overflow-x:auto; align:center">
<h4> Product Table </h4>
    <table class="table table-striped table-bordered" style="background-color:white">
      <tr>
        <th>Item ID</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Condition</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Delete?</th>
        <th>Purchase</th>
      <tr> 
        <button type="submit" class="btn btn-secondary" onclick="sortProducts()"> Sort </button></tr>
        <button type="submit" class="btn btn-danger" onclick="closeProducts()"> Close </button></tr>
      </tr>
      </tr>
      <!--Some sort of for loop here that will go through the table and show the items on the screen -->
      <?php foreach ($DT as $task): ?>
        <tr>
        <td>
          <?php echo $task['item_id']; ?>
        </td>
        <td>
          <?php echo $task['type']; ?>
        </td>
        <td>
          <?php echo $task['brand']; ?>
        </td>
        <td>
          <?php echo $task['item_condition']; ?>
        </td>
        <td>
          <?php echo $task['description']; ?>
        </td>
        <td>
          <?php 
              echo $task['price'];
            ?>
        </td>
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />             
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="home.php" method="post">
            <input type="submit" value="Purchase" name="action" class="btn btn-primary" />      
            <input type="hidden" name="item_id" value="<?php echo $task['item_id'] ?>" />
          </form>
        </td>                                
      </tr>
      
      <?php endforeach; ?>
    </table>
    </div>
</div>
</html>

