<?php

require_once 'google_settings.php';

require_once 'login.php';

$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode( 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email' ) . '&redirect_uri=' . urlencode( CLIENT_REDIRECT_URL ) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

$random_images_array = array(
	'avatar2.png',
	'avatar5.png',
	'avatar6.png',
	'img_avatar.png',
	'img_avatar2.png',
);
$avatar              = array_rand( $random_images_array, 1 );
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.php/profile.scss" />
</head>

<body>
	<!-- <div class="btn-group">
		<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
			Right-aligned menu example
		</button>
		<ul class="dropdown-menu dropdown-menu-end">
			<li><button class="dropdown-item" type="button">Action</button></li>
			<li><button class="dropdown-item" type="button">Another action</button></li>
			<li><button class="dropdown-item" type="button">Something else here</button></li>
		</ul>
	</div> -->

	<div class="profile">
		<div class="dropdown _img">
			<?php if ( isset( $_SESSION['id'] ) ) { ?>
			<img class="avatar dropdown-toggle" src="<?php echo $_SESSION['picture']; ?>"
				alt="<?php echo $_SESSION['name']; ?>" data-bs-toggle="dropdown" aria-expanded="false" />
			<div class="dropdown-content _info">
				<ul>
					<li><i class="fas fa-user fa-lg"></i><?php echo $_SESSION['name']; ?>
					</li>
					<li>
						<i class="fas fa-envelope fa-lg"></i><?php echo $_SESSION['email']; ?>
					</li>
					<li class="withA">
						<a href="includes/google_auth/logout.php"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a>
					</li>
				</ul>
			</div>
			<?php } else { ?>
			<a href="<?php echo $login_url; ?>">
				<button class="header__login--button auth__button">
					<!-- <i class="fab fa-google fa-lg"></i> -->
					Login/ Sign up
				</button>
			</a>
			<!-- <img class="avatar" src=" -->
				<?php
				// echo 'images/avatar/' . $random_images_array[ $avatar ];
				?>
			<!-- " alt="User" /> -->
			<!-- <div class="dropdown-content _info">
				<ul>
					<li class="withA">
						<a href=" -->
				<?php // echo $login_url; ?>
			<!-- ">
							<i class="fab fa-google fa-lg"></i>
							Login with Google
						</a>
					</li>
				</ul> -->
			<!-- </div> -->
			<?php } ?>
		</div>
	</div>

</body>

</html>
