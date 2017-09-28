function getPage(page, ele) {
$(function() {
       $.ajax({
         url: page,
         method: 'GET',
         data: {},
         success: function(data) {
            $('#dashcontents').html(data);
            $(ele).addClass('active').siblings().removeClass('active');
         },
         beforeSend: function() {
            $('#dashcontents')
            .html('<div class="loading"><i class="fa fa-circle-o-notch fa-spin"</i></div>');
         }
       })
    });
}