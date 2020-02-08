<?php

//response.php

include('database_connection.php');

if (isset($_GET["page"]))
  {
    $page  = $_GET["page"];
  }
else
  {
    $page=1; 
  };
    
$start_from = ($page-1) * $limit;  

$query = "SELECT * FROM products ORDER BY Product_Id ASC LIMIT $start_from, $limit";  
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$output = '';
if($result > 0)
{
 foreach($result as $row)
 {
  $output .= '
   <div class="col-lg-3 col-md-4 mb-4">
     <div class="card h-100 shadow">
       <img src="'. $row['Product_Img'] .'" class="card-img-top" alt="...">
       <div class="card-body">
         <h5 class="card-title">'. $row['Product_Name'] .'</h5>
         <p class="card-text">'. $row['Region'] .'</p>
         <p class="card-text">College Name: '. $row['College_Name'] .'</p>
         <p class="card-text">Brach: '. $row['Branch'] .'</p>
         <p class="card-text">Semester: '. $row['Semester'] .'</p>
         <p class="card-text">Subject: '. $row['Subject'] .'</p>
         <p class="card-text">Type: '. $row['Type'] .'</p>
         <p class="card-text">Description: '. $row['Description'] .'</p>
       </div>
     </div>
   </div>
  ';
 }
}

echo $output;


?>