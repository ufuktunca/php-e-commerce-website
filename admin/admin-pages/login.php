<!DOCTYPE html>
<html lang="en">
<head>
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
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body  class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
         

          <form action="../../dbFunctions/functions.php" method="POST">


            <h1 style="color: #333333">Control Panel </h1>
            
            <div>
              <input type="text" name="user_mail" class="form-control" placeholder="Mail" required="" />
            </div>
            <div>
              <input type="password" name="user_password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
            <button style="width: 100%; background-color: #333333; color:white;" type="submit" name="adminlogin" class="btn btn-default"> Login</button>
              
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">


               
              </p>

              <div class="clearfix">
                <?php if(isset($_GET["status"])){
                  if($_GET["status"] == "false"){
                    echo "Your informations are not true try again!";
                  } else if($_GET["status"]=="no_permission"){
                    echo "You should login to use admin panel";
                  } else if($_GET["status"]=="logout"){
                    echo "Logout succesfully";
                  }
                } ?>
              </div>
              <br />

              <div style="color: #333333">
                <h1><i class="fa fa-shopping-cart"></i> Daily Shop</h1>

              </div>
            </div>
          </form>



        </section>
      </div>

    </div>
  </div>
</body>
</html>
