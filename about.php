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
  <li class="liBottomNav"><a href="about.php">About</a></li>
  <li class="liBottomNav"><a href="login-signup.php">Account</a></li>
  <li class="liBottomNav"><a href="login-signup.php">Sign Up</a></li>
  <li class="liBottomNav"><a onclick="sendMessage()" href="#home">Message</a></li>

</ul>
<p>
Our site will be a shopping website where users can buy and sell technology. 
Users can make listings of items, sort by attribute, search for and delete listings. 
Allows storage of payment information options.
</p>
</body>





</html>