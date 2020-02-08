<?php

//fetch_data.php

include('database_connection.php');

//

function fill_branch($connect)  
{  
     $output = '';  
     $query = "SELECT * FROM products";  
     $statement = $connect->prepare($query);  
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row)
     {  
          $output .= '<option value="'.$row["branch_id"].'">'.$row["Branch"].'</option>';  
     }  
     return $output;  
}  

//

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM products WHERE Is_Sell = '0'
 ";

 if(isset($_POST["type"]))
 {
  $ram_filter = implode("','", $_POST["type"]);
  $query .= "
   AND Type IN('".$ram_filter."')
  ";
 }
 if(isset($_POST["region"]))
 {
  $brand_filter = implode("','", $_POST["region"]);
  $query .= "
   AND Region IN('".$brand_filter."')
  ";
 }
 if(isset($_POST["branch_id"]))  
 {  
      if($_POST["branch_id"] != '')  
      {  
           $query = "SELECT * FROM products WHERE branch_id = '".$_POST["Branch"]."'";  
      }  
      else  
      {  
           $query = "SELECT * FROM products";  
      } 

 }  

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="col-lg-3 col-md-4 mb-4">
   <div class="card h-100 shadow">
     
     <div class="card-body">
       <h5 class="card-title text-dark mt-2">'. $row['Type'] .'</h5>
       <p><i class="fas fa-rupee-sign"> '. $row['Region'] .'</i></p>
       <button type="button" class="btn btn-danger rounded-0 text-capitalize float-right">Details</button>
     </div>

    </div>
   </div>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>

    <!-- <style>
      .filter_data {
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      }  
    </style> -->