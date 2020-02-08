<?php 

//index.php

include('php/database_connection.php');
include('php/fetch_data.php');

//for total count data
$countSql = "SELECT COUNT(Product_Id) FROM products";  
$tot_result = $connect->prepare($countSql);
$tot_result->execute();
$row = $tot_result->fetchAll();
$total_records = $tot_result->rowCount();

// $total_records = $row[0];  
// $tot_result = mysqli_query($connect, $countSql);  
// $row = mysqli_fetch_row($tot_result);  
// $total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'php/hlinks.php';?>
    <title>Aakrut</title>

  </head>
  <body>

  <?php include 'php/navbar.php';?>

  <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-2 border">
 
        <h5 class="text-capitalize my-3">Filters</h5>
 
        <div class="form-group">  
          <label for="route">Route</label>
          <select class="form-control" id="Route">
          </select>
        </div>

        <div class="form-group">  
          <label for="college">College</label>
          <select class="form-control" id="college">
            <option value="">Select College</option>
          </select>
        </div>

        <div class="form-group">  
          <label for="branch">Branch</label>
          <select class="form-control" id="branches">
            <option value="">Select Branch</option> 
          </select>
        </div>

        <div class="form-group">  
          <label for="semester">Semester</label>
          <select class="form-control" id="semester">
            <option selected="selected" class="sele" value="0">Select Semester</option>
          </select>
        </div>

        <div class="form-group">  
          <label for="subject">Subject</label>
          <select class="form-control" id="subject">
            <option>1</option>
          </select>
        </div>

        <div class="form-group">
          <label for="text-capitalize">Categories</label>
          <?php
            $query = "SELECT DISTINCT(Type) FROM products WHERE Is_Sell = '0' ORDER BY Product_Id DESC";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
              {
          ?>
                <div class="checkbox">
                   <label><input type="checkbox" class="common_selector type" value="<?php echo $row['Type']; ?>"  > <?php echo $row['Type']; ?></label>
                </div>
          <?php
              }
          ?>
        </div>
      
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary text-capitalize mb-4" data-toggle="modal" data-target=".bd-example-modal-xl">
          Sell your product
        </button>

      </div>
      <!-- /.col-lg-2 -->
      
      <div class="col-lg-10">

        <div class="row my-3">
          <div class="col-12">


          <form action="" name="price" method="GET()" >
            <select name="price" id="price" onchange="submit()">
              <option value="lowToHigh">Low to High</option>
              <option value="highToLow">High to Low</option>
            </select>
          </form>
            <div class="form-group float-right ">
              <select class="form-control mr-sm-2 rounded-0" id="sortby" name="sortby">
                <option class="text-capitalize" value="">Sort by: Recommended</option>
                <option class="text-capitalize hl" value="hl">Price: high to low</option>
                <option class="text-capitalize">Price: low to high</option>
                <option class="text-capitalize">What's new</option>
              </select>
            </div>      
          </div>
        </div>

        <div class="row border-top p-3">
          <div class="row filter_data"></div>
        </div>

        <div id="target-content" class="clearfix">
        </div>
        
        <nav aria-label="Page navigation example" id="target-content">
          <ul class="pagination justify-content-end" id="pagination">

            <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
              <li class="page-item disabled">
                <a class="page-link" href="php/response.php?page=1" tabindex="-1" aria-disabled="true">First</a>
              </li>
              <li class="page-item active" id="<?php echo $i;?>"><a href='php/response.php?page=<?php echo $i;?>' class="page-link" href="#"><?php echo $i;?></a></li>
            <?php else:?>

            <li id="<?php echo $i;?>" class="page-item"><a href='php/response.php?page=<?php echo $i;?>' class="page-link" href="#"><?php echo $i;?></a></li>
            <?php endif;?> 
		        <?php endfor;endif;?> 
            <li class="page-item">
              <a class="page-link" href="php/pagination.php?page=1">Next</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- /.col-lg-10 -->

    </div> 
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" data-backdrop="static"  aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Sell your product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="box border p-3">

              <form name="productDetails" id="productDetails" autocomplete="on">

                <div class="form-group row">
                  <label for="email" class="col-sm-1">Email Id:</label>
                  <div class="col">
                    <input type="email" class="form-control col-sm-4" required name="Email_Id" id="Email_Id" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus>
                    <small id="itemcheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-1">Name:</label>
                  <div class="col">
                    <input type="text" class="form-control col-sm-4" required name="User_Name" id="User_Name" aria-describedby="User_NameHelp" placeholder="Enter Name">
                    <small id="namecheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edu" class="col-sm-1">Mobile:</label>
                  <div class="col">
                    <input type="number" class="form-control col-sm-4" required name="User_Mobile" id="User_Mobile" aria-describedby="User_MobileHelp" placeholder="Enter mobile number">
                    <small id="educheck"></small>
                  </div>
                </div>

                <div class="table-responsive">
                  <span id="error"></span>
                  <table class="table table-bordered table-sm" id="item_table">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <!-- <th scope="col">Image</th> -->
                        <th scope="col">Region</th>
                        <th scope="col">College</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Description</th>
                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>

                <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">

                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
              </form> 

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>

        </div>
      </div>
    </div>
  <!-- /.Modal -->

  <?php include 'php/footer.php';?>
  <?php include 'php/flinks.php';?>

  <script type="text/javascript">
$(document).ready(function(){
	jQuery("#target-content").load("php/response.php?page=1");
})

jQuery("#pagination li").on('click',function(e){
 e.preventDefault();
 jQuery("#target-content").html('loading...');
 jQuery("#pagination li").removeClass('active');
 jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery(".filter_data").load("php/response.php?page=" + pageNum);
});

    $('#sort').on('change', function () {
        $.post('php/fetch_data.php', {sort: $(this).val()}, function (response) {
            $('#sort-ajax').html(response);
        });
    })
</script>
 </body>
</html>


