$(document).ready(function(){  
    var count = 0;
    var quantity=0;
     $(document).on('click','.add', function(){
       count++;
       quantity++;
       var html = '';
       html += '<tr>';
       html += '<th scope="row"><input type="text" name="quantity" readonly class="form-control form-control-sm input-number quantity" value="1"></th>';
       html += '<td><input type="text" name="Product_Name[]" required class="form-control form-control-sm Product_Name"></td>';
      //  html += '<td><input type="file" name="Product_Img[]" required class="form-control-file Product_Img"></td>';
       html += '<td><input type="text" name="Region[]" required class="form-control form-control-sm Region"></td>';
       html += '<td><input type="text" name="College_Name[]" required class="form-control form-control-sm College_Name"></td>';
       html += '<td><input type="text" name="Branch[]" required class="form-control form-control-sm Branch"></td>';
       html += '<td><input type="text" name="Semester[]" required class="form-control form-control-sm Semester"></td>';
       html += '<td><input type="text" name="Subject[]" required class="form-control form-control-sm Subject"></td>';
       html += '<td><input type="text" name="Price[]" required class="form-control form-control-sm Price"></td>';
       html += '<td><select name="Type[]" required class="form-control-sm Type"><option>Study Material</option><option>Stationary</option><option>Reference Books</option></select>';
       html += '<td><input type="text" name="Description[]" required class="form-control form-control-sm Description"></td>';
       html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button></td>';
       $('tbody').append(html);
       $('.quantity')[quantity-1].value = quantity;
     });

     $(document).on('click', '.remove', function(){
       $(this).closest('tr').remove();
       var tempquantity = quantity-1;
       while(tempquantity!=0){
         $('.quantity')[tempquantity-1].value = tempquantity;
         tempquantity--;
        }

        if(quantity>0){
          quantity--;  
        }
      });

     $('#submit').click(function(){            
          $.ajax({  
               url:"insert_productDetails.php",  
               method:"POST",  
               data:$('#productDetails').serialize(),  
               success:function(data)  
               {  
                //   $('#productDetails')[0].reset(); 

               }  
          });  
     });  
});  