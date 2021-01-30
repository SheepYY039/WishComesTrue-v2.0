<!-- TODO: hover avatar dropdown change to bootstrap  -->
<!-- TODO: Add user profile page? -->
<!-- TODO: Rename CSS classes -->

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.php/header.scss" />
	<link rel="stylesheet" type="text/css" href="style.php/modal.scss" />
	<link rel="stylesheet" type="text/css" href="style.php/filters.scss" />
</head>

<body>
	<div class="header">
		<?php if (!empty($_SESSION['success'])) { ?>
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<strong>Wish Added Successfully!</strong>
				Your wish will be processed by us in the coming few days.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>

		<?php
			$_SESSION['success'] = null;
			unset($_SESSION['success']);
		} else if (!empty($_SESSION['error'])) { ?>
			<div class="alert alert-warning alert-dismissible fade <?php echo "show" ?>" role="alert">
				<strong>Adding Wish <?php echo $wish ?> Unsuccessful!</strong>
				Please try again!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>

		<?php
			$_SESSION['error'] = null;
			unset($_SESSION['error']);
		} ?>
		<div class="row header__container" style="height: 100%;">

			<div class="col-md-4 col-sm-6 header__container header__logo justify-content-center">
				<a class="
					<?php if (strpos($_SERVER['REQUEST_URI'], 'home')) { ?>
						active
					<?php } ?>" href="?page=home" id="home">
					<img class="header__logo--img" src="images/WCT logo.gif" alt="WishComesTrue Logo">
				</a>

				<!-- logo -->
			</div>
			<div class="col-md-8 header__container ">
				<div class="row header__container d-flex justify-content-end">
					<div class="col-md-8 header__login d-flex align-self-center">
						<?php if (isset($_SESSION['id'])) {
						?>
							<!-- Button trigger modal -->
							<button class="header__login--button" id="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Submit a
								Wish</button>
						<?php } else { ?>
							<button class="btn header__login--button" id="button" disabled>Please login to Submit a Wish &rarr;
							</button>
						<?php }
						require 'google_auth/auth.php';
						?>
					</div>
					<div class="col-md-12 align-self-end">
						<?php
						require 'navbar.php';
						?>
					</div>
				</div>
			</div>
			<hr class="col-md-12 header__container--line" />
		</div>
	</div>
	<?php
	include 'includes/wish-submission-form.php';
	?>

</body>

</html>