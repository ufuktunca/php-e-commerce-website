<?php 

include 'menu.php'; 
$users = $db->prepare("SELECT * FROM normalUsers");
$users->execute();
error_reporting(0);
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User List <small>,



            </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User Email</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $count=0;
                while ($user = $users->fetch(PDO::FETCH_ASSOC)) { $count++;   ?>
                            <tr>
                 <td width="20"><?php echo $count; ?></td>
                 <td><?php echo $user["normalUser_email"]; ?></td>
              </tr>
                 <?php } ?>





        </tbody>
      </table>

      <!-- Div İçerik Bitişi -->


    </div>
  </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
