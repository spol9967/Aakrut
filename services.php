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
          <label for="exampleFormControlSelect2">Branch</label>
          <select class="form-control" id="exampleFormControlSelect2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>

          <label for="text-capitalize">Services</label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label text-capitalize" for="customCheck1">Assingment Writing </label>
          </div> 
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck2">
            <label class="custom-control-label text-capitalize" for="customCheck2">Mini Project</label>
          </div> 
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck3">
            <label class="custom-control-label text-capitalize" for="customCheck3">Final Year Project</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck4">
            <label class="custom-control-label text-capitalize" for="customCheck4">Drawing</label>
          </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModalLong">
                    I am available for work
        </button>

      </div>
      <!-- /.col-lg-2 -->
      
      <div class="col-lg-10">
        <div class="row my-3"> 
          <div class="col-12">
            <div class="form-group float-right ">
              <select class="form-control mr-sm-2 rounded-0" id="sort">
                <option class="text-capitalize" value="">Sort by: Recommended</option>
                <option class="text-capitalize ">Price: high to low</option>
                <option class="text-capitalize">Price: low to high</option>
                <option class="text-capitalize">What's new</option>
              </select>
            </div>      
          </div>
        </div>

      </div>
      <!-- /.col-lg-10 -->

    </div> 
    <!-- /.row -->

  </div>
  <!-- /.container -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Available for work</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="box border p-3">

              <form name="serviceDetails" id="serviceDetails" autocomplete="on">

                <div class="form-group row">
                  <label for="email" class="col-sm-4">Email Id</label>
                  <div class="col">
                    <input type="email" class="form-control col-sm-11" required name="Email_Id" id="Email_Id" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus>
                    <small id="itemcheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-4">Name</label>
                  <div class="col">
                    <input type="text" class="form-control col-sm-11" required name="User_Name" id="User_Name" aria-describedby="User_NameHelp" placeholder="Enter Name">
                    <small id="namecheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edu" class="col-sm-4">Mobile</label>
                  <div class="col">
                    <input type="number" class="form-control col-sm-11" required name="User_Mobile" id="User_Mobile" aria-describedby="User_MobileHelp" placeholder="Enter mobile number">
                    <small id="educheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edu" class="col-sm-4">Service</label>
                  <div class="col">
                    <select class="form-control col-sm-11" id="User_Service">
                      <option>Assingment Writing</option>
                      <option>Mini Project</option>
                      <option>Final Year Project</option>
                      <option>Drawing</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">  
                  <label for="route" class="col-sm-4">Route</label>
                  <div class="col">
                    <select class="form-control col-sm-11" id="Routes">
                    </select>
                  </div>
                </div>

                <div class="form-group row">  
                  <label for="college" class="col-sm-4">College</label>
                  <div class="col">
                    <select class="form-control col-sm-11" id="colleges">
                      <option value="">Select College</option>
                    </select>
                  </div>
                </div>
   

                <input class="btn btn-primary" type="submit" name="submits" id="submits" value="Submit">

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

 </body>
</html>