<?php
//fetch.php
if(isset($_POST["Service_Id"]))
{
 include('database_connection.php');
 $output = '';
 $service1 = $_POST["Service_Id"];
 $query = "SELECT * from user_info where User_Id in (select User_Id from user_service JOIN services On user_service.Service_Id=services.Service_Id where services.Service_Id=$service1); " ; 
 //$query = "SELECT User_Name, Service_Type FROM user_info u JOIN user_service r ON u.User_Id = r.User_Id JOIN services s ON s.Service_Id = r.Service_Id ";
//  $query = "SELECT User_Name, Service_Type FROM user_info u JOIN user_service r ON u.User_Id = r.User_Id JOIN services s ON s.Service_Id = r.'".' ";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $row = $statement->rowCount();
 
 foreach($result as $row)
 {
  $output .= '
  <h2>'.$row["User_Name"].'</h2>
  ';
 }
 echo $output;
}

?>