<?php  
include('database_connection.php');
 
  $data = array(
     ':Email_Id'  => $_POST["Email_Id"],
     ':User_Name'  => $_POST["User_Name"],
     ':User_Mobile' => $_POST["User_Mobile"] 
          );

  $sql = "
  INSERT INTO user_table (Email_Id, User_Name, User_Mobile)
  VALUES (:Email_Id, :User_Name , :User_Mobile)
  ";
     $statement = $connect->prepare($sql);
     $statement->execute($data);

  $number = count($_POST["Product_Name"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {
        $data = array(
         ':Product_Name'  => $_POST["Product_Name"][$i],
        //  ':Product_Img' => $_POST["Product_Img"][$i],
         ':Region'  => $_POST["Region"][$i],
         ':College_Name' => $_POST["College_Name"][$i],
         ':Branch' => $_POST["Branch"][$i],
         ':Semester' => $_POST["Semester"][$i],
         ':Subject' => $_POST["Subject"][$i],
         ':Price' => $_POST["Price"][$i],
         ':Type' => $_POST["Type"][$i],
         ':Description' => $_POST["Description"][$i]          );
      

         $query = "
         INSERT INTO products (Product_Name, Region, College_Name, Branch, Semester, Subject, Price, Type, Description, Date_Added )
         VALUES (:Product_Name, :Region, :College_Name, :Branch, :Semester, :Subject, :Price, :Type, :Description, NOW() )
       ";
     
        $statement = $connect->prepare($query);
        $statement->execute($data);
      
      } 
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?> 
   