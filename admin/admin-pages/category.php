<?php 

include 'menu.php'; 
$categories = $db->prepare("SELECT * FROM categories order by category_order ASC");
$categories->execute();
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
            <h2>Category List <small>,



            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="addCategory.php"><button class="btn btn-success btn-xs"> Add New Category</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->			
            <?php               
			if($_GET["status"] == "okay") {
                echo "Change succesfuly maded.";
              } else if($_GET["status"] == "wrong"){
                echo "Change couldn't make something wrong";
              } ?>

            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Category Name</th>
                  <th>Category Order</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

				<?php
				$number=0;

				while ($category=$categories->fetch(PDO::FETCH_ASSOC)) {
					$number++;
?>
 				<tr>
                 <td width="20"><?php echo $number; ?></td>
                 <td><?php echo $category["category_name"]; ?></td>
                 <td><?php echo $category["category_order"]; ?></td>
				 <td><center><a href="updateCategory.php?categoryId=<?php echo $category["category_id"]; ?>"><button class="btn btn-primary btn-xs">Edit</button></a></center></td>
           		 <td><center><a href="../../dbFunctions/functions.php?deleteCategory=<?php echo $category["category_id"]; ?>"><button class="btn btn-danger btn-xs">Delete</button></a></center></td>
          		</tr>
			<?php	}

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
