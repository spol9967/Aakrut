$(document).ready(function(){  
    var count = 0;
    var quantity=0;
     $(document).on('click','.add', function(){
       count++;
       var quantity =parseInt($('#quantity').val());
       $('#quantity').val(quantity + 1);
       var html = '';
       html += '<tr>';
       html += '<th scope="row"><input type="text" id="quantity" name="quantity" readonly class="form-control form-control-sm input-number" value="1" min="1" max="100"></th>'
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
     });

     $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
        var quantity =parseInt($('#quantity').val());

        if(quantity>0){
          $('#quantity').val(quantity - 1)   
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