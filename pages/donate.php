<?php
$slider_images = array(
	array(
		'filename'    => 'img1.jpeg',
		'displayText' => 'Coconuts Hong Kong',
	),
	array(
		'filename'    => 'img2.jpeg',
		'displayText' => 'SCMP',
	),
	array(
		'filename'    => 'img3.jpeg',
		'displayText' => 'Hong Kong Free Press',
	),
	array(
		'filename'    => 'img4.jpeg',
		'displayText' => 'Impact HK',
	),
	array(
		'filename'    => 'img5.jpeg',
		'displayText' => 'The Guardian',
	),
	array(
		'filename'    => 'img6.jpeg',
		'displayText' => 'Feeding HK',
	),
);

$servername = 'localhost';
// $servername = 'wishcomestruehk.000webhostapp.com';
$username = 'id15251966_requested_wishes';
$password = 'WCThk2020-WCThk2020';
$dbname   = 'id15251966_wishes';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// CHECK DATABASE CONNECTION
if (mysqli_connect_errno()) {
	echo 'Connection Failed' . mysqli_connect_error();

	exit;
}
$sql    = 'SELECT Wish_id, Wish_name, w.User_id as uid, Phone, u.email as Email, Project_type, Minority_groups, Donating_type, u.name as Organization_name, District, Initiation_time , Donate_quantity , Additional_Information FROM tbl_wishes w INNER JOIN users u ON w.User_id = u.User_id WHERE isApproved = 1 AND isDonate = 1';
$result = mysqli_query($conn, $sql);


?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.php/donate.scss" />
	<link rel="stylesheet" type="text/css" href="style.php/volunteer.scss">
</head>

<body>
	<div class="container">
		<div class="row align-items-center">
			<?php require 'includes/filters.php'; ?>
			<div class="col-md-9 wishes">
				<!-- TODO: Fix carousel -->
				<!-- Slider -->
				<div class="swiper-container" style="display: none;">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php foreach ($slider_images as $slider_image) { ?>
							<div class="swiper-slide">
								<div class="img-div">
									<img src="images/donate_carousel/<?php echo $slider_image['filename']; ?>" />
									<div class="slide-text">Source: <?php echo $slider_image['displayText']; ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<!-- If we need pagination -->
					<div class="swiper-pagination"></div>

					<!-- If we need navigation buttons -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>

					<!-- If we need scrollbar -->
					<div class="swiper-scrollbar"></div>
				</div>
				<?php
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while ($row = mysqli_fetch_assoc($result)) {
				?>
						<div class="wish">
							<div class="wish__contents">
								<h3 class="wish__name">
								<?php echo $row['Donate_quantity']; ?> &times; <?php echo $row['Wish_name']; ?>
								</h3>
								<p class="wish__filters">
									<?php echo $row['Minority_groups'] . $row['Project_type'] . $row['Donating_type']; ?>
								</p>
							</div>
							<button type="button" class="wish__more-info details_button" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $row['Wish_id']; ?>">More Info</button>
							<div class="modal fade" id="modal-<?php echo $row['Wish_id']; ?>" tabindex="-1" aria-labelledby="<?php echo $row['Wish_id']; ?>ModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">
												<?php echo $row['Wish_name']; ?>
											</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="modal-content table-responsive">
												<table class="table table-hover">
													<tbody>
														<tr>
															<th scope="row">Organization Name</th>
															<td><?php echo $row['Organization_name']; ?></td>
														</tr>
														<tr>
															<th scope="row">Organization Email</th>
															<td>
																<a href="mailto:<?php echo $row['Email']; ?>">
																	<?php echo $row['Email']; ?>
																</a>
															</td>
														</tr>
														<tr>
															<th scope="row">Organization Phone</th>
															<td>
																<a href="tel:<?php echo $row['Phone']; ?>">
																	<?php echo $row['Phone']; ?>
																</a>
															</td>
														</tr>
														<tr>
															<th scope="row">District</th>
															<td><?php echo $row['District']; ?></td>
														</tr>
														<tr>
															<th scope="row">Quantity Requested</th>
															<td>
																<?php echo $row['Donate_quantity']; ?>
															</td>
														</tr>
														<tr>
															<th scope="row">Requested date</th>
															<td><?php echo $row['Initiation_time']; ?></td>
														</tr>
														<tr>
															<th scope="row">Additional Information</th>
															<td><?php echo $row['Additional_Information']; ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>



			</div>
		</div>
	</div>


	<script type="text/javascript">
		<?php require 'js/donate.js'; ?>
		var addButtons = document.getElementsByClassName('details_button');

		function getDetails() {
			var id = event.srcElement.id;
			var select = "background-" + id;
			var cross = "close-" + id;
			var modalBackground = document.getElementById(select);
			modalBackground.style.display = 'flex';
			modalBackground.style.left = 0;
			// TODO only works for the first modal
			var crossTemp = document.getElementsByClassName(cross)[0];
			crossTemp.addEventListener('click', function() {
				modalBackground.style.display = 'none';
			});
		};

		for (i = 0; i < addButtons.length; i++) {
			addButtons[i].addEventListener("click", getDetails);
		}

		var wishdb = JSON.parse(localStorage.finalLil);
		for (x in wishdb) {
			alert(wishdb[x]);
		}
	</script>

</body>

</html>
<?php
mysqli_close($conn);
