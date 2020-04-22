<!DOCTYPE html>
<html>
<head>
<title>TechConnect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title> TechConnect Home </title>
    <!-- Bootstrap core CSS -->
	<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Favicons -->
	<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
	<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
</head>



</script>

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
    float: center;
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
  top: 5;
  right:-10;
  left:-10;
  bottom: 10;
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
  top: 5;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}


</style>

<body class="imgex" style="background-color: #E3E6E7;">

<!-- Nav Bar --> 

<ul class="upperNav">
    <h2 class="w3-xlarge w3-Courier" >Tech Connect</h2>
    <h6 class = "w3-left-align w3-Courier"> The simplest, fastest way to find and sell the technology you are searching for at the price you like! </h6>
</ul>


<ul class="ulBottomNav">
  <li class="liBottomNav"><a class="active" href="#home">Home</a></li>
  <li class="liBottomNav"><a href="#contact">About</a></li>
  <li class="liBottomNav"><a href="login-signup.php">Account</a></li>
  <li class="liBottomNav"><a href="login-signup.php">Sign Up</a></li>
  <li class="liBottomNav"><a onclick="sendMessage()" href="#home">Message</a></li>

</ul>

<!-- Products --> 

<h3 class="w3-xlarge productsTitle" style="text-align:center"> Products </h3>
<br>
<div class="row" style="text-align:center;">
    <div class="column" style="text-align:center;">
        <button type="button" data-toggle="modal" class="products" onclick="openProducts()"> Laptops </button>
        <img src='https://lh3.googleusercontent.com/proxy/Xw3d5-Kv_EUL0d3WFdCNqxZ16LzRW1ShWsK0-WG_I6fKVfMcZVsjmEYrLlRBqoXmi9ACv49jxVBRY0UiOFiKgoy3AxKEaB7YZSqkivpJF4eT3aygCR95C1vlZxw' alt="Laptop" class="image" style="width:90%" class="image">
    </div>
    <div class="column" style="text-align:center;">
        <button type="button" data-toggle="modal" class="products" onclick="openProducts()"> Headphones </button>
        <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MV7N2?wid=1144&hei=1144&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1551489688005" alt="headphones" style="width:90%" class="image">
   </div>
    <div class="column" style="text-align:center;">
    <button type="button" data-toggle="modal" class="products" onclick="openProducts()"> TV's </button>
        <img src="https://mobilecontent.costco.com/live/resource/img/static-us-tiles/tv-sm-tile-320x220.jpg" alt="TV" style="width:90%" class="image">
  </div>
<div class="row" style="text-align:center;">
    <div class="column" style="text-align:center;">
        <button type="button" data-toggle="modal" class="products" onclick="openProducts()"> Gaming consoles </button>
        <img src="https://images-na.ssl-images-amazon.com/images/I/61HvOYl7YuL._AC_SY355_.jpg" alt="Gaming" style="width:90%">
    </div>
    <div class="column" style="text-align:center;">
    <button type="button" data-toggle="modal" class="products" onclick="openProducts()"> Tablets </button>
        <img src="https://cdn.mos.cms.futurecdn.net/DVgdvxbLT2HDCX7drM38ST.jpg" alt="tablet" style="width:90%">
   </div>
  <div class="column" style="text-align:center;">
    <button type="button" data-toggle="modal" class="products" onclick="openProducts()"> Desktops </button>
    <img src="https://i.pcmag.com/imagery/reviews/04pC3hzS937QPLkjY2TV09f-23..v_1569472153.jpg" alt="Desktop" style="width:90%">
  </div>
</div>
<br>


<div class="message" id="message-user">
    <form action="home.php" class="form-container">
    <h1> Send a Message </h1>

    <label for="To"><b>To:</b></label>
    <input type="text" placeholder="Recipient" name="to" required>

    <label for="from"><b>From:</b></label>
    <input type="text" placeholder="Your name" name="from" required>

    <label for="desc"><b>Message</b></label>
    <input type="text" placeholder="Enter message" name="msg" required>

    <button type="submit" class="btn btn-primary">Send</button>
    <button type="submit" class="btn btn-danger" onclick="closeForm()">Cancel</button>
</div>
</body>

<script>
    function sendMessage(){
        document.getElementById("message-user").style.display = "block";
    }
    function closeForm() {
        document.getElementById("message-user").style.display = "none";
    }
    function openProducts(){
        document.getElementById("prod-form").style.display = "block";
    }
    function closeProducts() {
        document.getElementById("prod-form").style.display = "none";
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
   if ($_POST['db-btn'] == "Sort")           {  sort_table();  }
}
if (!empty($_POST['action']))
{
  if ($_POST['action'] == "Delete")
   {
      if (!empty($_POST['item_id']) )
         deleteTask($_POST['item_id']);
   }
}

$tasks = getAllTasks();
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
            if (($task['brand'] == $prices['brand']) and ($task['item_condition'] == $prices['item_condition']) and ($task['type'] == $prices['type']))
            {
              echo $prices['price'];
            }
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