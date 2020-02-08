<?php  
 //load_data.php  
 include('database_connection.php');
 $output = '';  
 if(isset($_POST["branch_id"]))  
 {  
      if($_POST["branch_id"] != '')  
      {  
           $sql = "SELECT * FROM products WHERE branch_id = '".$_POST["Branch"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM products";  
      }  
      $statement = $connect->prepare($sql);  
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)      {  
           $output .= '
           <div class="col-lg-3 col-md-4 mb-4">
           <div class="card h-100 shadow">
             
             <div class="card-body">
               <h5 class="card-title text-dark mt-2">'. $row['Product_Name'] .'</h5>
               <p><i class="fas fa-rupee-sign"> '. $row['Region'] .'</i></p>
               <i class="fas fa-cart-plus" />
               <button type="button" class="btn btn-danger rounded-0 text-capitalize float-right">Add to Bag</button>
        
             </div>
        
            </div>
           </div>';  
      }  
      echo $output;  
 }  
 ?>  