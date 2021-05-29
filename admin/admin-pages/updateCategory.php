<?php 

include 'menu.php'; 
$getCategory = $db->prepare("SELECT * FROM categories where category_id=:id");
$getCategory->execute(array("id"=>$_GET["categoryId"]));
$category=$getCategory->fetch(PDO::FETCH_ASSOC)


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Update Category <small>,



            </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />


            <form action="../../dbFunctions/functions.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            
            <?php
              if($_GET["status"] == "okay") {
                echo "Change succesfuly maded.";
              } else if($_GET["status"] == "wrong"){
                echo "Change couldn't make something wrong";
              } ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="category_name" value="<?php echo $category["category_name"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Order Number <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="category_order" value="<?php echo $category["category_order"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

             <input type="hidden" name="category_id" value="<?php echo $category["category_id"]; ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="updateCategory" class="btn btn-success">Update</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>



  <hr>
  <hr>
  <hr>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
