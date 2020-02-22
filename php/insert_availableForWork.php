<?php  
include('database_connection.php');
 
  $data = array(
     ':Email_Id'  => $_POST["Email_Id"],
     ':User_Name'  => $_POST["User_Name"],
     ':User_Mobile' => $_POST["User_Mobile"]    
    //  ':Services' => $_POST["Services"],   
    //  ':Description' => $_POST["Description"],  
    //  ':Region' => $_POST["Region"],   
    //  ':College_Name' => $_POST["College_Name"]   
    
    );

  $query = "
  INSERT INTO user_info (Email_Id, User_Name, User_Mobile)
  VALUES (:Email_Id, :User_Name , :User_Mobile)
  ";
     
        $statement = $connect->prepare($query);
        $statement->execute($data);
      

 ?> 
   