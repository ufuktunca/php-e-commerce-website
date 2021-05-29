<?php 

include 'menu.php'; 

$products = $db->prepare("SELECT * FROM products");
$products->execute();
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
            <h2>Product List <small>,



            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="addProduct.php"><button class="btn btn-success btn-xs"> Add Product</button></a>

            </div>
          </div>
          <div class="x_content">
              <?php 
              if ($_GET["status"] == "ok") {
               echo "Change succesfuly maded.";
              } else if($_GET["status"] == "wrong"){
                echo "Change couldn't make something wrong";
              } ?>

            <!-- Div İçerik Başlangıç -->

            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Product Price</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>


                
<?php
        $number=0;

        while ($product=$products->fetch(PDO::FETCH_ASSOC)) {
          $number++;
?>
        <tr>
                 <td width="20"><?php echo $number; ?></td>
               <td><?php echo $product["product_name"]; ?></td>
               <td><?php echo $product["product_category"]; ?></td>
                 <td><?php echo $product["product_price"]; ?></td>
         <td><center><a href="editProduct.php?productId=<?php echo $product["product_id"] ?>"><button class="btn btn-primary btn-xs">Edit</button></a></center></td>
            <td><center><a href="../../dbFunctions/functions.php?deleteProductId=<?php echo $product["product_id"] ?>"><button class="btn btn-danger btn-xs">Delete</button></a></center>
            </td>
              </tr>
      <?php }

          ?>



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
