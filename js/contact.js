requirejs.config({
    //To get timely, correct error triggers in IE, force a define/shim exports check.
    paths: {
        'jquery': [
            'https://cdn.bootcss.com/jquery/3.1.1/jquery.min',
            'jquery'
        ],
        'bootstrap': [
             'https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min',
             'bootstrap.min'
        ],
    },
    shim: {
        'bootstrap': {
            deps: ['jquery'],
            exports: 'jQuery.fn.bootstrap'
        }
    },

    
});
require(['jquery', 'bootstrap', 'weixin'], function ($) {
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