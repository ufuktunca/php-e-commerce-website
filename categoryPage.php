<!DOCTYPE html>
<html>
 <head>
  <title></title>

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

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


</head>


<body>
<?php 
include "header.php";
$categories = $db->prepare("SELECT * FROM categories order by category_order");
$categories->execute();

$type = $_GET["type"];
$categoryProducts = $db->prepare("SELECT * FROM products where product_category=:category");
$categoryProducts->execute(array("category"=>$type));

 ?>



<section id="menu" style="margin-bottom: 15px">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              
              
             <?php 
             while ($category=$categories->fetch(PDO::FETCH_ASSOC)) {  
              ?>
                    <li><a href="categoryPage.php?type=<?php echo $category["category_name"]; ?>"><?php echo $category["category_name"]; ?></a></li>
             <?php }

              ?>
    
              <li><a href="contact.php">Contact</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
<div class="container">
	
  <?php while ($product = $categoryProducts->fetch(PDO::FETCH_ASSOC)) { ?>
    
     <div class="col-md-3"> 
                            
                        <a class="aa-product-img" href="#"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product["product_image"]); ?>" width="250px" height="300px" style="object-fit:contain;"  alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="./dbFunctions/functions.php?addToCart=<?php echo $product["product_id"]; ?>&redirect=categoryPage.php?type=<?php echo $type; ?>"><span class="fa fa-shopping-cart"></span>Add to Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#"><?php echo $product["product_name"]; ?></a></h4>
                          <span class="aa-product-price">$ <?php echo $product["product_price"] ?></span>
                        </figcaption>
                      </div>

  <?php } ?>

</div>



 <?php 
include "footer.php"
  ?>

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