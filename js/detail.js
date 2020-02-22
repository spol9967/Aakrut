$(document).ready(function(){
 
  function fetch_post_data(Service_Id)
  {
   $.ajax({
    url:"./php/fetch.php",
    method:"POST",
    data:{Service_Id:Service_Id},
    success:function(data)
    {
     $('#post_modal').modal('show');
     $('#post_detail').html(data);
    }
   });
  }
 
  $(document).on('click', '.view', function(){
   var Service_Id = $(this).attr("id");
   fetch_post_data(Service_Id);
  });
 

  
 });

    // var html = '';

    // html += '  <div class="modal-content">';
    // html += '    <div class="modal-header">';
    // html += '      <h5 class="modal-title" id="exampleModalLabel">Seller Description</h5>';
    // html += '      <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    // html += '        <span aria-hidden="true">&times;</span>';
    // html += '      </button>';
    // html += '    </div>';
    // html += '    <div class="modal-body modal-sm">';
    // html += '      Seller Name:';

    // // html += '      Seller Name:'.$row['User_Name'];
    // // html += '      Mobile No:'.$row['Mobile_No'];
    // // html += '      Email ID:'.$row['Email_Id'];
    // html += '    </div>';
    // html += '    <div class="modal-footer">';
    // html += '      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
    // html += '    </div>';
    // html += '  </div>';
    // $('#popup-' + ele).append(html);

// }