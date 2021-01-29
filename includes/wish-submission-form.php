<html>

<body>
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Request A Wish
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="modal-content">
						<div class="container-fluid">
							<form id="formal" name="formal" method="get" action="includes/wish-submission.php" class="row g-3">
								<h3>Organization</h3>
								<!-- Org name -->
								<div class="col-md-6">
									<label for="name" class="form-label">Organization Name</label>
									<?php if (isset($_SESSION['id'])) { ?>
										<input class="form-control" required type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" />
									<?php } else { ?>
										<input class="form-control" required type="text" id="name" name="name" />
									<?php } ?>
								</div>

								<!-- Phone Number -->
								<div class="col-md-6">
									<label for="phone" class="form-label">Organization Phone</label>
									<div class="input-group">
										<span class="input-group-text">+852</span>
										<input type="tel" class="form-control" id="phone" name="phone" value="" />
									</div>
								</div>

								<!-- Email -->
								<div class="col-12">
									<label for="email" class="form-label">Email Address</label>
									<?php if (isset($_SESSION['id'])) { ?>
										<input class="form-control" required type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
									<?php } else { ?>
										<input class="form-control" required type="email" id="email" name="email" value="" />
									<?php } ?>
								</div>

								<h3>The Wish</h3>
								<!-- Name -->
								<div class="col-12">
									<label for="wish" class="form-label">Name of Wish</label>
									<input type="text" id="wish" class="form-control" name="wish" value="" />
								</div>

								<!-- District -->
								<div class="col-12">
									<label for="district" class="form-label">District of event: (if applicable)</label>

									<input class="form-control" type="text" id="district" name="district" value="" />
								</div>



								<!-- Minority Groups -->
								<div class="col-4">
									<Label class="form-label"> Minority Groups </Label>
									<div class="modal-auth--field-container check__group">
										<label class="checkbox__label" for="minority-children">Children<input type="checkbox" id="minority-children" name="minority[]" value="Children" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="minority-homeless">Homeless
											<input type="checkbox" id="minority-homeless" name="minority[]" value="Homeless" />
											<span class="checkbox__custom"></span>
										</label>

										<label class="checkbox__label" for="minority-elderly">Elderly<input type="checkbox" id="minority-elderly" name="minority[]" value="Elderly" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="minority-low-income">Low Income<input type="checkbox" id="minority-low-income" name="minority[]" value="Low income" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="minority-others">Others<input type="checkbox" id="minority-others" name="minority[]" value="Others" /><span class="checkbox__custom"></span></label>
									</div>
								</div>

								<!-- Donating Type -->
								<div class="col-4">
									<Label class="form-label">Donating Type</Label>
									<div class="modal--field-container check__group">
										<label class="checkbox__label" for="donate-funding">Funding
											<input type="checkbox" id="donate-funding" name="donation[]" value="Funding" />
											<span class="checkbox__custom"></span>
										</label>

										<label class="checkbox__label" for="donate-second-hand">
										Second Hand
										<input type="checkbox" id="donate-second-hand" name="donation[]" value="Second hand" /><span class="checkbox__custom"></span>
									</label>

										<label class="checkbox__label" for="donate-food">Food<input type="checkbox" id="donate-food" name="donation[]" value="Food" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="donate-others">Others<input type="checkbox" id="donate-others" name="donation[]" value="Others" /><span class="checkbox__custom"></span></label>
									</div>
								</div>

								<!-- Project Type -->
								<div class="col-md-4">
									<Label class="form-label">Project Type</Label>

									<div class="modal--field-container">
										<label class="checkbox__label" for="project-individual">Individual<input type="checkbox" id="project-individual" name="project[]" value="Individual" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="project-group">Group<input type="checkbox" id="project-group" name="project[]" value="Group" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="project-short">Short<input type="checkbox" id="project-short" name="project[]" value="Short" /><span class="checkbox__custom"></span></label>

										<label class="checkbox__label" for="project-long">Long
											<input type="checkbox" id="project-long" name="project[]" value="Long" /><span class="checkbox__custom"></span></label>
									</div>
								</div>

								<!-- Money -->
								<div class="col-md-6">
									<label for="money" class="form-label">Donation required: (if applicable)</label>
									<div class="input-group">
										<span class="input-group-text">HKD$</span>

										<input class="form-control" type="number" min="0" step="any" id="money" name="money" value="0" />
									</div>
								</div>

								<!-- People -->
								<div class="col-md-6">
									<label for="people" class="form-label">Amount of people required: (if applicable)</label>

									<input class="form-control" type="number" id="people" name="people" min="0" step="1" value="0" />
								</div>



								<!-- Start date -->
								<div class="col-md-4">
									<label class="form-label" for="start">
										Start Date: (if applicable)
									</label>
									<input class="form-control" type="date" id="start" name="start" />
								</div>

								<!-- End date -->
								<div class="col-md-4">
									<label class="form-label" for="end">
										End Date: (if applicable)
									</label>
									<input type="date" class="form-control" id="end" name="end" />
								</div>

								<!-- Time -->
								<div class="col-md-4">
									<label for="starttime" class="form-label">Event Start time: (if applicable)</label>

									<input class="form-control" type="time" id="starttime" name="starttime" value="" />
								</div>

								<div class="col-md-12">
									<label class="form-label" for="comment">Additional Information</label>
									<textarea rows="5" cols="40" class="form-control" name="comment" id="comment"></textarea>
								</div>
								
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							
								
								<button id="submit-form" type="submit" name="submit" class="btn btn-primary" value="Confirm Wish">Submit Wish</button>
							
							
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>


</body>

</html>