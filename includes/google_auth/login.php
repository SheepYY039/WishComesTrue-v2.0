<?php

require_once 'includes/google_auth/google_settings.php';

require_once 'includes/google_auth/google-login-api.php';

// Google passes a parameter 'code' in the Redirect Url
if ( isset( $_GET['code'] ) ) {
	try {
		$google_api = new GoogleLoginApi();
		// echo $google_api;

		// Get the access token
		$data = $google_api->GetAccessToken( CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code'] );

		// Get user information
		$user_info = $google_api->GetUserProfileInfo( $data['access_token'] );

		$_SESSION['id']      = $user_info['id'];
		$_SESSION['name']    = $user_info['name'];
		$_SESSION['email']   = $user_info['email'];
		$_SESSION['picture'] = $user_info['picture'];

		$mysqli = mysqli_connect( 'localhost', 'id15251966_requested_wishes', 'WCThk2020-WCThk2020', 'id15251966_wishes' );
		// CHECK DATABASE CONNECTION
		if ( mysqli_connect_errno() ) {
			echo 'Connection Failed' . mysqli_connect_error();

			exit;
		}

		$_POST['id']      = $_SESSION['id'];
		$_POST['name']    = $_SESSION['name'];
		$_POST['email']   = $_SESSION['email'];
		$_POST['picture'] = $_SESSION['picture'];

		$sql    = "SELECT * FROM users WHERE email='" . $_POST['email'] . "'";
		$result = $mysqli->query( $sql );

		if ( ! empty( $result->fetch_assoc() ) ) {
			$sql2 = "UPDATE users SET google_id='" . $_POST['id'] . "' WHERE email='" . $_POST['email'] . "'";
		} else {
			$sql2 = "INSERT INTO users (name, email, google_id) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['id'] . "')";
		}

		$mysqli->query( $sql2 );
	} catch ( Exception $e ) {
		echo $e->getMessage();

		exit();
	}
}