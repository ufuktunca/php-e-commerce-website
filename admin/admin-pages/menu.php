<!DOCTYPE html>
<html>
<head>

  <?php include '../../dbConnect.php';
session_start();
error_reporting(0);
$checkUser = $db->prepare("SELECT * FROM users where user_email=:mail");
$checkUser->execute(array(
"mail" => $_SESSION["user_email"]));

$userInfo=$checkUser->fetch(PDO::FETCH_ASSOC);
$row = $checkUser->rowCount();

if($row == 0){
  header("Location:login.php?status=no_permission");
  exit;
} ?>

	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


 <!-- Dropzone.js -->

  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Ck Editör -->
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <style type="text/css">
    body{
      background-color: #333333
    }
    .left_col{background-color: #333333!important}
  </style>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col" >
        <div class="left_col scroll-view" style="background-color: #333333!important">
          <div class="navbar nav_title" style="border: 0;background-color: #333333!important" >
            <a href="index.html" class="site_title"><i class="fa fa-shopping-cart"></i> <span>Daily Shop</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome</span>
              <h2><?php echo $userInfo["user_email"] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">

                <li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>
                <li><a href="category.php"><i class="fa fa-clone"></i> Category </a></li>
                <li><a href="products.php"><i class="fa fa-desktop"></i> Product </a></li>
                <li><a href="user.php"><i class="fa fa-user"></i> User </a></li>

                



             

           </ul>
         </div>



       </div>
       <!-- /sidebar menu -->

       <!-- /menu footer buttons -->
       <div class="sidebar-footer hidden-small" style="background-color: #333333!important">
        <a data-toggle="tooltip" data-placement="top" title="Settings" style="background-color: #333333!important">
          <span class="glyphicon glyphicon-cog" aria-hidden="true" style="color: #ffffff!important"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen" style="background-color: #333333!important">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true" style="color: #ffffff!important"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock" style="background-color: #333333!important">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true" style="color: #ffffff!important"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" style="background-color: #333333!important">
          <span class="glyphicon glyphicon-off" aria-hidden="true" style="color: #ffffff!important"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars" style="color: #333333!important"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="images/user.png" alt=""><?php echo $userInfo["user_email"] ?>
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">              
              <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Exit</a></li>
            </ul>
          </li>

         
               
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  
</body>
</html>