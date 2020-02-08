<?php

//fetch_data.php

include('database_connection.php');


if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM products WHERE Is_Sell = '0'
 ";

 if(isset($_POST["type"]))
 {
  $brand_filter = implode("','", $_POST["type"]);
  $query .= "
   AND type IN('".$brand_filter."')
  ";
 }



   $price = isset($_GET['price']);
//  $query = "SELECT * FROM products ORDER BY Product_Id ".$price ;

if(isset($_POST["$price"]))  
    { 
      $i = 0;
      if($_REQUEST['price'] == "highToLow ")
        {
          $query = "SELECT * from Products
            ORDER BY Product_Id DESC";
        }
      else if($_REQUEST['price'] == "lowToHigh ")
        {
          $query = "SELECT * from Products
            ORDER BY Product_Id ASC ";      
        }
      
      // $query = ("SELECT * FROM Products ORDER BY Product_Id ASC".$choice);
      
          //   if(['$price'] == "highToLow") {
          //     $query = "SELECT * from Products
          //      ORDER BY Product_Id DESC";
          //   } elseif(['$price'] == "lowToHigh") {
          //     $query = "SELECT * from Products
          //      ORDER BY Product_Id ASC";
          //   }
      
          // }
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
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>