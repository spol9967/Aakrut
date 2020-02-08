$(document).ready(function(){

  filter_data();
  ('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
  function filter_data()
  {
      $('.filter_data').html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
      var action = 'fetch_data';
      var asc = $('#ASC').val();
      var desc = $('#DESC').val();
      var type = get_filter('type');
      $.ajax({
          url:"./php/fetch_data.php",
          method:"POST",
          data:{action:action, asc:asc, desc:desc, type:type},
          success:function(data){
              $('.filter_data').html(data);
          }
      });
  }

  function get_filter(class_name)
  {
      var filter = [];
      $('.'+class_name+':checked').each(function(){
          filter.push($(this).val());
      });
      return filter;
  }


  $('.common_selector').click(function(){
      filter_data();
  });

  
 
  
  });

  //  $price = isset($_GET['price']);
// //  $query = "SELECT * FROM products ORDER BY Product_Id ".$price ;

// if(isset($_POST["$price"]))  
//     { 
//       $i = 0;
//       if($_REQUEST['price'] == "lowToHigh ")
//       {
//       $choice = "lowToHigh";
//       }
//       else 
//       {
//         $choice = "highToLow";
//       }//and so on
      
//       $query = ("SELECT * FROM Products ORDER BY ".$choice);
      
//           //   if(['$price'] == "highToLow") {
//           //     $query = "SELECT * from Products
//           //      ORDER BY Product_Id DESC";
//           //   } elseif(['$price'] == "lowToHigh") {
//           //     $query = "SELECT * from Products
//           //      ORDER BY Product_Id ASC";
//           //   }
      
//           // }


//     } 