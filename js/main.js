$(function() {
  
  //Global Variables
  var logBtn = $('#logBtn');
  var logFrm = $('#logFrm');

  logBtn.on('click', function(e) {
  	e.preventDefault();
    logFrm.toggle();
  });

	$('#subBtn').click(function(e) {
		e.preventDefault();
		var username = $('#user').val();
		var password = $('#pass').val();
		$.ajax({
			url: 'login.php',
			method: 'POST',
			data: {username: username, password: password},
			success: function(data) {
				if(data == 1) {
					$(this).attr('disabled', 'disabled');
					window.location.href ='user/#/'+ username;
				}else {
					$('#error').html(data);
				}
			},
			beforeSend: function() {
				$('#error').html('<img src="loading.gif">');
				$(this).attr('disabled', 'disabled');
			}
		})
	})

});



