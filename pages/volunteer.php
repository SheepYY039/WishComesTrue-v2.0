<!-- TODO: Rename some variables -->
<!-- TODO: Modal use row col -->
<!-- TODO: Modal change to bootstrap modal -->
<!-- TODO: Only load a number of wishes and added pagination -->
<?php
  $servername = 'localhost';
  // $servername = 'wishcomestruehk.000webhostapp.com';
  $username = 'id15251966_requested_wishes';
  $password = 'WCThk2020-WCThk2020';
  $dbname   = 'id15251966_wishes';

  // Create connection
  $conn = mysqli_connect( $servername, $username, $password, $dbname );

  // CHECK DATABASE CONNECTION
if ( mysqli_connect_errno() ) {
	echo 'Connection Failed' . mysqli_connect_error();

	exit;
}
  $sql    = 'SELECT `Wish_id`,`Wish_name`,`Project_type`,`Minority_groups`,`Donating_type`,`Organization_name`,`District`, `Start_date`, `End_date` FROM `tbl_wishes` WHERE `isApproved` = 1';
  $result = mysqli_query( $conn, $sql );

?>

<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="style.php/volunteer.scss">
	<!-- <link rel="stylesheet" type="text/css" href="style.php/modal.scss"> -->
</head>

<body>
	<div class="row">
		<?php require 'includes/filters.php'; ?>

		<div id="wishescontainermain" class="col-md-9 wishes">
			<?php
			if ( mysqli_num_rows( $result ) > 0 ) {
				// output data of each row
				while ( $row = mysqli_fetch_assoc( $result ) ) {
					?>
			<div class="wish">
				<div class="wish__contents">
					<h3 class="wish__name"><?php echo $row['Wish_name']; ?>
					</h3>
					<p class="wish__filters">
						<?php echo $row['Minority_groups'] . $row['Project_type'] . $row['Donating_type']; ?>
					</p>
				</div>
				<button type="button" class="wish__more-info details_button" data-bs-toggle="modal"
					data-bs-target="#modal-<?php echo $row['Wish_id']; ?>">More Info</button>
				<!-- Button trigger modal -->
				<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Launch demo modal
				</button> -->
				<!-- Modal -->
				<div class="modal fade" id="modal-<?php echo $row['Wish_id']; ?>" tabindex="-1"
					aria-labelledby="<?php echo $row['Wish_id']; ?>ModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="modal-content">
									<div class="field">
										<h4>Organization Name</h4>
										<h5>
											<?php echo $row['Organization_name']; ?>
										</h5>
									</div>
									<div class="field">
										<h4>District</h4>
										<h5>
											<?php echo $row['District']; ?>
										</h5>
									</div>
									<div class="field">
										<h4>Start date</h4>
										<h5>
											<?php echo $row['Start_date']; ?>
										</h5>
									</div>
									<div class="field">
										<h4>End date</h4>
										<h5>
											<?php echo $row['End_date']; ?>
										</h5>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<!-- <div id="background-<?php echo $row['Wish_id']; ?>" class="modal-background">
					<div class="modal" style="width: 80%;">
						<div class="modal-header">
							<div class="modal-cancel close-<?php echo $row['Wish_id']; ?>" id="close"></div>
							<h2>More info - <?php echo $row['Wish_name']; ?>
							</h2>
						</div>
						<div class="modal-content">
							<div class="field">
								<h4>Organization Name</h4>
								<h5>
									<?php echo $row['Organization_name']; ?>
								</h5>
							</div>
							<div class="field">
								<h4>District</h4>
								<h5>
									<?php echo $row['District']; ?>
								</h5>
							</div>
							<div class="field">
								<h4>Start date</h4>
								<h5>
									<?php echo $row['Start_date']; ?>
								</h5>
							</div>
							<div class="field">
								<h4>End date</h4>
								<h5>
									<?php echo $row['End_date']; ?>
								</h5>
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<?php
				}
			}
			?>
		</div>

	</div>


	<script type="text/javascript">
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
mysqli_close( $conn );