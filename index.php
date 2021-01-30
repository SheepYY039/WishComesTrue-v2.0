<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="title" property="og:title" content="WishComesTrueHK" />
	<meta name="description" content="Website for WishComesTrueHK" />

	<meta property="og:type" content="Website" />
	<meta name="image" property="og:image" content="https://live.staticflickr.com/65535/50646172078_c56b58ecd9_h.jpg" />
	<meta name="description" property="og:description"
		content="Our vision for this project is to create a website, where the wishes of minority groups are published to the public allowing volunteers to choose which ones they want to contribute to. Examples of these wishes include volunteers helping children who wish for better grades by tutoring." />
	<meta name="author" content="WishComesTrueHK Team" />

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="./favicon.png" />
	<link rel="shortcut icon" href="./favicon.png" type="image/x-icon" />

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
		integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" />
	<!-- Swiper -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<!-- index.scss -->
	<link rel="stylesheet" type="text/css" href="style.php/index.scss">


	<title>WishComesTrueHK</title>
</head>

<body>
	<?php
	require 'includes/scripts.php';
	?>
	<div class="container" style="background-color: white;">
		<?php
		require 'includes/header.php';

		require 'includes/body.php';
		?>
	</div>
	<?php
	require 'includes/footer.php';
	?>
</body>

</html>