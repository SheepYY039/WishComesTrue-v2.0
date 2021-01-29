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
		<div class="row header__container" style="height: 100%;">

			<div class="col-md-4 col-sm-6 header__container header__logo justify-content-center">
				<a class="
					<?php if ( strpos( $_SERVER['REQUEST_URI'], 'home' ) ) { ?>
						active
					<?php } ?>" href="?page=home" id="home">
					<img class="header__logo--img" src="images/WCT logo.gif" alt="WishComesTrue Logo">
				</a>

				<!-- logo -->
			</div>
			<div class="col-md-8 header__container ">
				<div class="row header__container d-flex justify-content-end">
					<div class="col-md-8 header__login d-flex align-self-center">
						<?php if ( isset( $_SESSION['id'] ) ) { ?>
						<!-- Button trigger modal -->
						<button class="header__login--button" id="button" data-bs-toggle="modal"
							data-bs-target="#staticBackdrop">Submit a
							Wish</button>
						<?php } else { ?>
						<button class="btn header__login--button" id="button" disabled>Please login to Submit a Wish &rarr;
						</button>
						<?php } ?>
						<?php
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


	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg modal-auth  ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Request A Wish</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="formal" name="formal" method="get" action="includes/process_wishes.php" target="modal-content">
						<h3>&nbsp Organization</h3>

						<div class="form-input-material">
							<label for="name">&nbsp Organization Name:</label>
							<?php if ( isset( $_SESSION['id'] ) ) { ?>
							<input class="form-control-material" required type="text" id="name" name="name"
								value="<?php echo $_SESSION['name']; ?>" />
							<?php } else { ?>
							<input class="form-control-material" required type="text" id="name" name="name" value="" />
							<?php } ?>

						</div>

						<div class="form-input-material">
							<label for="phone">&nbsp Phone Number:</label>

							<input class="form-control-material" type="tel" id="phone" name="phone" value="" />
						</div>

						<div class="form-input-material">
							<label for="email">&nbsp Email Address:</label>

							<?php if ( isset( $_SESSION['id'] ) ) { ?>
							<input class="form-control-material" required type="email" id="email" name="email"
								value="<?php echo $_SESSION['email']; ?>" />
							<?php } else { ?>
							<input class="form-control-material" required type="email" id="email" name="email" value="" />
							<?php } ?>


						</div>

						<h3>&nbsp The Wish</h3>
						<div class="form-input-material">
							<label for="phone">&nbsp Name of Wish</label>

							<input class="form-control-material" required type="wish" id="wish" name="wish" value="" />
						</div>

						<div class="form-input-material">
							<label for="district">&nbsp District of event: &nbsp (if applicable)</label>

							<input class="form-input-material" type="district" id="district" name="district" value="" />
						</div>

						<div class="form-input-material">
							<label for="starttime">&nbsp Event time: &nbsp (if applicable)</label>

							<input class="form-input-material" type="time" id="starttime" name="starttime" value="" />
						</div>

						<h4>&nbsp Minority Groups</h4>

						<div class="modal-auth--field-container check__group">
							<label class="checkbox__label" for="minority-children">&nbsp Children<input type="checkbox"
									id="minority-children" name="minority[]" value="Children" /><span
									class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="minority-homeless">&nbsp Homeless
								<input type="checkbox" id="minority-homeless" name="minority[]" value="Homeless" />
								<span class="checkbox__custom"></span>
							</label>

							<label class="checkbox__label" for="minority-elderly">&nbsp Elderly<input type="checkbox"
									id="minority-elderly" name="minority[]" value="Elderly" /><span
									class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="minority-low-income">&nbsp Low Income<input type="checkbox"
									id="minority-low-income" name="minority[]" value="Low income" /><span
									class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="minority-others">&nbsp Others<input type="checkbox"
									id="minority-others" name="minority[]" value="Others" /><span class="checkbox__custom"></span></label>
						</div>

						<h4>&nbsp Donating Type</h4>

						<div class="modal--field-container check__group">
							<label class="checkbox__label" for="donate-funding">&nbsp Funding<input type="checkbox"
									id="donate-funding" name="donation[]" value="Funding" /><span class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="donate-second-hand">&nbsp Second Hand<input type="checkbox"
									id="donate-second-hand" name="donation[]" value="Second hand" /><span
									class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="donate-food">&nbsp Food<input type="checkbox" id="donate-food"
									name="donation[]" value="Food" /><span class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="donate-others">&nbsp Others<input type="checkbox" id="donate-others"
									name="donation[]" value="Others" /><span class="checkbox__custom"></span></label>
						</div>

						<div class="form-input-material">
							<label for="money">&nbsp Donation required(HK$): &nbsp (if applicable)</label>

							<input class="form-input-material" type="money" id="money" name="money" value="" />
						</div>

						<div class="form-input-material">
							<label for="people">&nbsp Amount of people required: &nbsp (if applicable)</label>

							<input class="form-input-material" type="people" id="people" name="people" value="" />
						</div>

						<h4>&nbsp Project Type</h4>

						<div class="modal--field-container">
							<label class="checkbox__label" for="project-individual">&nbsp Individual<input type="checkbox"
									id="project-individual" name="project[]" value="Individual" /><span
									class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="project-group">&nbsp Group<input type="checkbox" id="project-group"
									name="project[]" value="Group" /><span class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="project-short">&nbsp Short<input type="checkbox" id="project-short"
									name="project[]" value="Short" /><span class="checkbox__custom"></span></label>

							<label class="checkbox__label" for="project-long">&nbsp Long
								<input type="checkbox" id="project-long" name="project[]" value="Long" /><span
									class="checkbox__custom"></span></label>
						</div>

						<div class="modal--field-container">
							<label class="date__label" for="start">
								<h4>&nbsp Start Date:&nbsp(if applicable)</h4>
							</label>
							<input type="date" id="start" name="start" />
						</div>

						<div class="modal--field-container">
							<label class="date__label" for="end">
								<h4>&nbsp End Date: &nbsp (if applicable)</h4>
							</label>
							<input type="date" id="end" name="end" />
						</div>

						<div class="container__box">
							<h4>&nbsp Additional Information:</h4>
							<textarea name="comment" rows="5" cols="40" value=""></textarea>
						</div>

						<div class="button_cont" align="center">
							<button type="button" class="btn btn__ani" data-bs-dismiss="modal">Close</button>
							<button class="btn btn__ani" type="submit" value="Enter Wish">
								Enter Wish
							</button>
						</div>
					</form>
				</div>
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-primary">Understood</button>
				</div> -->
			</div>
		</div>
	</div>

</body>

</html>
