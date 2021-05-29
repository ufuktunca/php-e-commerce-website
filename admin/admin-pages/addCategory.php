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
            <h2>Add Category<small>,

            


            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../../dbFunctions/functions.php" method="POST">

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="category_name" placeholder="Enter Category Name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              
          

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Order Number <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="category_order" placeholder="Enter Category Order" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <button type="submit" name="addCategory" class="btn btn-success">Save</button>
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
