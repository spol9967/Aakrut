<?php 

//index.php

include('database_connection.php');
include('fetch_data.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'hlinks.php';?>
    <title>Aakrut</title><style>
</style>
  </head>
  <body>

  <?php include 'navbar.php';?>

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
          <!-- <select class="form-control" id="branches">
          //   <option value="">Select Branch</option> 
          </select> -->
          <select class="form-control branch_id" name="branch" id="branch">  
            <option value="">Select Branch</option>  
            <?php echo fill_branch($connect); ?>  
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
          <label for="text-capitalize">Price</label>
          <input type="hidden" id="hidden_minimum_price" value="10" />
          <input type="hidden" id="hidden_maximum_price" value="65000" />
          <p id="price_show">10 - 65000</p>
          <div id="price_range"></div>
        </div> 

        <div class="form-group">
          <label for="text-capitalize">Type</label>
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
        <button type="button" class="btn btn-primary text-capitalize mt-4" data-toggle="modal" data-target=".bd-example-modal-xl">
          Sell your product
        </button>

      </div>
      <!-- /.col-lg-2 -->
      
      <div class="col-lg-10">

        <div class="row my-3">
          <div class="col-12">
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
           <div class="" id="show_product">  
          </div> 
        <div class="row border-top p-3">
          <div class="row filter_data"></div>
        </div>
        
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
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
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>

                <input class="btn btn-primary float-right" type="submit" name="submit" id="submit" value="Submit">

                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
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


  <?php include 'footer.php';?>
  <?php include 'flinks.php';?>
  


 </body>
</html>


