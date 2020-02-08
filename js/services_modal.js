$(document).ready(function(){  



     $('#submits').click(function(){            
          $.ajax({  
               url:"insert_availableForWork.php",  
               method:"POST",  
               data:$('#serviceDetails').serialize(),  
               success:function(data)  
               {  
                //   $('#productDetails')[0].reset(); 

               }  
          });  
     });  
});  