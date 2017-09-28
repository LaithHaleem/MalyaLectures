function getPage(page, ele) {
$(function() {
       $.ajax({
         url: page,
         method: 'GET',
         data: {},
         success: function(data) {
            $('#dashcontents').html(data);
            $(ele).addClass('active').siblings().removeClass('active');
         }
       })
    });
}


$('#frmpic').on('change', function() {
    
    $.ajax({
        url: 'pic.php',
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data) {
            var html = '';
            if(data == '0') {
                html +='<div class="alert al-error" style="padding: 12px;width: 62%;background: #e74c3c;margin: 0 auto 10px;font-family: \'Droid\'; font-size: 15px; border-right: 5px solid #c1392b; color: #FFFFFF;">عذرا هذا الملف ليس صورة</div>';
                $('.profileBox').append(html);
            }else if(data == '00') {
                html +='<div class="alert al-error" style="padding: 12px;width: 62%;background: #e74c3c;margin: 0 auto 10px;font-family: \'Droid\'; font-size: 15px; border-right: 5px solid #c1392b; color: #FFFFFF;">عذرا حجم الملف كبير جدا</div>';
                $('.profileBox').append(html);
            }else {
                $('#userImg').attr('src', data);
            }
        },
        beforeSend: function() {
        var html = '';
        html += '<div class="loading"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw pici"></i></div>';
        $('#profImgBox').append(html);
        }
    })

});