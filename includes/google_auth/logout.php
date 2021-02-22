<?php session_start();

	session_unset();
	session_destroy();
?>
<html>

<head>
	<meta name="google-signin-client_id" content=412553399108-ruf11iqniptt5vhsibvbmpd0l6fm6j5g.apps.googleusercontent.com>
</head>

<body>
	<script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
	<script>
	window.onLoadCallback = function() {
		google_api.load('auth2', function() {
			google_api.auth2.init().then(function() {
				var auth2 = google_api.auth2.getAuthInstance();
				auth2.signOut().then(function() {
					document.location.href = '/';
					window.location = "/";
				});
			});
		});
	};
	</script>
</body>

</html>
