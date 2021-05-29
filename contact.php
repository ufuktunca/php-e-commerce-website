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



<?php include "header.php";

$categories = $db->prepare("SELECT * FROM categories order by category_order");
$categories->execute();
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


<div class=" container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="iletisimform">
					            <div class="mbottom">


              <h2>   Leave Your Contact Information  </h2>
              <p>    </p>
            </div>
										<form role="form">
	<div class="form-group">
	<div class="row">
    <div class="col-md-6">
	<input type="text" class="form-control input-lg" placeholder="Name" required="" name="name" id="name" value="">
	</div>
    <div class="col-md-6">
	<input type="text" class="form-control input-lg" placeholder="Surname" required="" name="surname" id="surname" value="">
	</div>
	</div>
	</div><div class="form-group">
	<div class="row">
    <div class="col-md-6">
	<input type="email" name="email" placeholder="E-Posta" required="" class="form-control input-lg" id="email" value="">
	</div>
    <div class="col-md-6">
	<input type="tel" name="phone" placeholder="Phone" required="" class="form-control input-lg" id="tel" value="">
	</div>
	</div>
	</div><div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <textarea name="message" class="form-control" rows="8" cols="80" placeholder="Message"></textarea>
                  </div>
                  </div>
                </div><button type="submit" class="btn btn-gonder2 btn-lg" name="gonder">Send Form</button></form>		          </div>
      </div>
      <div class="col-md-1 text-center aralik1 hidden-xs">
        <img class="img-responsive" src="http://erkankaratas.com.tr/wp-content/themes/drerkan/resimler/aralik1.png" alt="">
      </div>
      <div class="col-md-5 iletisimbilgi">
        <h2>   Contact   </h2>
        <table class="mtop">
          <tbody><tr>
            <td><strong>    Adress:      </strong></td>
            <td>25 Astor Pl, NY 10003, USA
</td>
          </tr>
          <tr>
            <td><strong>   Phone:    </strong></td>
            <td>+1 212-982-4589</td>
          </tr>
          <tr>
            <td><strong>Fax: </strong></td>
            <td>+1 422 341 39 28</td>
          </tr>
          <tr>
            <td><strong>E-Mail: </strong></td>
            <td>dailyshop@gmail.com</td>
          </tr>
        </tbody></table>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.4537256377644!2d-73.99383338459448!3d40.73004067932989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2599bb2d9db1b%3A0xf2659614f67c71cc!2s25%20Astor%20Pl%2C%20New%20York%2C%20NY%2010003%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1610262391874!5m2!1str!2str" width="1500" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
</div>


<?php include "footer.php" ?>

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