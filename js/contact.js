requirejs.config({
    shim: {
        'bootstrap.min': {
            deps: ['jquery'],
            exports: 'jQuery.fn.bootstrap'
        }
    },
});
require(['jquery', 'bootstrap.min', 'weixin'], function ($) {
	$('#send-email').on('click', function() {
		var $useremail = $('#email-addr').val();
		var $username = $('#email-name').val();
		var $emailcontent = $('#email-content').val();
		if ($username && $useremail && $emailcontent) {
			$.post('email_sender/send', {
				useremail: $useremail,
				username: $username,
				emailcontent: $emailcontent
			},function(data){}, 'json');
			alert("Congratulations, your email has been send, I'll contact you in time.");
		} else {
			alert('Please complete the information!');
		}
	})
});