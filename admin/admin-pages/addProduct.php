<?php 

include 'menu.php'; 


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
            <h2>Add Product <small>,

            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />


            <form action="../../dbFunctions/functions.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose Category<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select class="select2_multiple form-control" required="" name="product_category" >
                      <?php 
                      $categories = $db->prepare("SELECT * FROM categories");
                      $categories->execute();
                      while ($category=$categories->fetch(PDO::FETCH_ASSOC)) {_?>
                        <option  value="<?php echo $category["category_name"]; ?>"><?php echo $category["category_name"]; ?></option>
                    <?php  }
                       ?>

         
        

                     </select>
                   </div>
                 </div>


                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="product_name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Price <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="product_price"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Image <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="product_image"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="addProduct" class="btn btn-success">Save</button>
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
