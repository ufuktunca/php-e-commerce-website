<!DOCTYPE html>
<html>
<head>
	<?php include "dbConnect.php";
error_reporting(0);
session_start();
$checkUser = $db->prepare("SELECT * FROM normalUsers where normalUser_email=:mail");
$checkUser->execute(array(
"mail" => $_SESSION["normalUser_email"]));

$userInfo=$checkUser->fetch(PDO::FETCH_ASSOC);
$row = $checkUser->rowCount();

$user = $db->prepare("SELECT * FROM normalUsers WHERE normalUser_email=:email");
$user->execute(array("email"=>$_SESSION["normalUser_email"]));
$userData = $user->fetch(PDO::FETCH_ASSOC);

$getCart = $db->prepare("SELECT * FROM cart where user_id=:id");
$getCart->execute(array("id"=>$userData["normalUser_id"]));

   ?>
	<title> 
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'></title>
</head>
<body>
<header id="aa-header">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
      </div>
      <form action="./dbFunctions/functions.php" method="POST">
      <div class="modal-body">
       <div style="display: flex;margin-bottom: 10px;margin-left: 25px"><span>Email:</span> <input type="text" name="email" required></div>
        <div style="display: flex;margin-bottom: 10px;"><span>Password:</span><input type="password" name="password" required></div>
      </div>

      <div class="modal-footer">
         <button type="submit" name="login" class="btn btn-default" >Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Register</h4>
      </div>
      <form action="./dbFunctions/functions.php" method="POST">
      <div class="modal-body">
       <div style="display: flex;margin-bottom: 10px;margin-left: 25px"><span>Email:</span> <input type="text" name="email"></div>
        <div style="display: flex;margin-bottom: 10px;"><span>Password:</span><input type="password" name="password"></div>
        <div style="display: flex;margin-bottom: 10px;"><span>Password:</span><input type="password" name="repassword"></div>

      </div>

      <div class="modal-footer">
         <button type="submit" name="register" class="btn btn-default" >Register</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

    <!-- start header bottom  -->
    <div class="aa-header-bottom" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area" style="width: 88%">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
              <?php 
              if ($row==1) { ?>
      <div class="dropdown aa-cartbox">
          <div class="aa-cartbox" style="margin-left: 25px;">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify"><?php echo $getCart->rowCount(); ?></span>
                </a>
                <div class="aa-cartbox-summary" style="margin-left: 25px">
                  <ul>
                    <?php 
                    $total=0;
                    while ($cartData = $getCart->fetch(PDO::FETCH_ASSOC)) {
                      $getProduct = $db->prepare("SELECT * FROM products where product_id=:id");
                      $getProduct->execute(array("id"=>$cartData["product_id"]));
                      $productData = $getProduct->fetch(PDO::FETCH_ASSOC); 
                      $total += $productData["product_price"];
                      ?>

                                          <li>
                      <a class="aa-cartbox-img"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($productData["product_image"]); ?>" width="250px" height="300px" style="object-fit:contain;" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $productData["product_name"]; ?></a></h4>
                        <p>$ <?php echo $productData["product_price"]; ?></p>
                      </div>
                      <a class="aa-remove-product" href="./dbFunctions/functions.php?removeCartProduct=<?php echo $productData["product_id"]; ?>&redirect=index.php"><span class="fa fa-times"></span></a>
                    </li>

                    <?php }
                     ?>
                   
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $ <?php echo $total; ?>
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="payment.php">Checkout</a>
                </div>
              </div>
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" style="margin-top: 15px;margin-left: 10px;background-color: #FF6666" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="fa fa-user"></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 9999999">
    <a class="dropdown-item" href="logout.php" >Exit</a>
  </div>
</div>          
              <?php } else { ?> 
<div class="dropdown aa-cartbox">
  <div class="aa-cartbox" style="margin-left: 25px;">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">0</span>
                </a>
                <div class="aa-cartbox-summary" style="margin-left: 25px">
                  <ul>              
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="">Checkout</a>
                </div>
              </div>
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" style="margin-top: 15px;margin-left: 10px;background-color: #FF6666" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="fa fa-user"></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 9999999">
    <a class="dropdown-item" data-toggle="modal" data-target="#myModal" >Login</a>
    <a class="dropdown-item" data-toggle="modal" data-target="#myModal2">Register</a>
  </div>
</div>
              <?php }
               ?>
              
<?php 
if (isset($_GET["status"])) {
if ($_GET["status"] == "match") {
  echo "Passwords have to match while register!!";
} else if($_GET["status"] == "okRegister"){
  echo "You succesfully registered";
} else if($_GET["status"] == "wrong"){
  echo "Something went wrong!";
} else if($_GET["status"] == "logout"){
  echo "Succesfully logout";
} else if($_GET["status"] == "login"){
  echo "Succesfully login";
} else if($_GET["status"] == "notLogin"){
  echo "Your password or email is wrong";
} else if($_GET["status"] == "pay"){
  echo "Your payment is succesfull your product will be deliver in days.";
} else if($_GET["status"] == "notPay"){
  echo "Something went wrong while paying!!";
}
 }
?>
              <!-- search box -->
              <div class="aa-search-box mr-3">
                <form action="search.php" method="POST">
                  <input type="text" name="searchText" id="" placeholder="Search">
                  <button type="submit" name="textSearch"><span class="fa fa-search"></span></button>
                </form>
              </div>              <!-- / search box -->  

            </div>

          </div>
        </div>

      </div>
    </div>
    <!-- / header bottom  -->
  </header>

    <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
</body>
</html>