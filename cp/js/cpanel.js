// get sub page of cpanel page 
function getPage(page) {
$(function() {
       $.ajax({
         url: page,
         method: 'GET',
         data: {},
         success: function(data) {
            $('#mainparent').html(data);
         }
       })
    });
}

// Show File Input Value on File text
function showval() {
  $(function() {
      $('#showvalue').val($('#fileinp').val());
  });
}


