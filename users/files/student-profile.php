
<?php require_once( '../couch/cms.php' ); ?>
	<cms:template title='Student-profile' hidden='1' />
	<cms:embed 'header.html' />
	<cms:if k_logged_out >
        <cms:redirect "<cms:login_link />" />
    </cms:if>
	<!--if logout-->
	<!-- success msg -->
	<cms:set success_msg="<cms:get_flash 'success_msg' />" />
	<cms:if success_msg >
		<div class="col-md-12 text-center">
			<div class="alert alert-success gxcpl-shadow-1">
				<strong>Success!</strong> Account has been created successfully and we have sent an email to the registered email id with the employee username and password.
			</div>
			<div class="gxcpl-ptop-20"></div>
		</div>
	</cms:if>
	<!-- success msg -->
	
	<cms:form 
		masterpage=k_user_template 
        mode='edit'
        page_id=k_user_id
        enctype="multipart/form-data"
        method='post'
        anchor='0'
	>

		<cms:if k_success >
	        <cms:db_persist_form />

	        <cms:if k_success >
	            <cms:set_flash name='success_msg' value='1' />
	            <cms:redirect k_page_link /> 
	        </cms:if>
	    </cms:if>      
		<cms:if k_error >
			<div class="col-md-12">
				<cms:each k_error >
					<div class="alert alert-danger">
				<div class="gxcpl-ptop-50"></div>
			 
			<form>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default gxcpl-shadow-1">
							<div class="panel-heading">
								<h3 class="panel-title">Student: Personal Details</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
										<label>First Name</label>
										<br>
										<cms:input type="text" class="gxcpl-input-text" name="text" placeholder="Enter First Name" >
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-3">
										<label>Middle Name</label>
										<br>
										<cms:input type="text" class="gxcpl-input-text" name="text" placeholder="Enter Middle Name" >
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-3">
										<label>Last Name</label>
										<br>
										<cms:input type="text" class="gxcpl-input-text" name="text" placeholder="Enter Last Name" >
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-3">
										<label>Date of Birth</label>
										<br>
										<cms:input type="date" class="gxcpl-input-text" name="date">
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-12">
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-4">
								    		<div class="form-group">
									    			<label>Gender</label>
														<label class="radio-inline">
															<cms:input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">Male
														</label>
														<label class="radio-inline">
															<cms:input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">Female
														</label>
														<label class="radio-inline">
															<cms:input type="radio" name="inlineRadioOptions" id="inlineRadio3" vallue="option3">Other
														</label>
								    		</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="gxcpl-ptop-10"></div>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default gxcpl-shadow-1">
							<div class="panel-heading">
								<h3 class="panel-title">Student: Contact Details</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<label>Email</label>
										<br>
										<cms:input type="text" class="gxcpl-input-text" name="Email" placeholder="Enter Email Id">
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-6">
										<label>Mobile no.</label>
										<br>
										<cms:input type="text" class="gxcpl-input-text" name="number" placeholder="Enter 10 Digit Mobile No.">
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-12">
										<label>Address</label>
										<br>
										<textarea cols="100" rows="4" class="gxcpl-input-text-2"></textarea>
										<div class="gxcpl-ptop-10"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="gxcpl-ptop-10"></div>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default gxcpl-shadow-1">
							<div class="panel-heading">
								<h3 class="panel-title">Student: College Details</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
										<label>Date of Admission</label>
										<br>
										<cms:input type="date" class="gxcpl-input-text" name="date" />
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-3">
										<label>Enrollment No</label>
										<br>
										<input type="Text" class="gxcpl-input-text" name="number" placeholder="Enter MSBTE Enrollment No.">
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-3">
										<label>Branch</label>
										<br>
										<select name="branch" class="gxcpl-input-select">
											<option selected disabled>Select Branch</option>
											<option>Computer</option>
											<option>Mechanical</option>
											<option>Civil</option>
											<option>Chemical</option>
											<option>Electrical</option>
											<option>Electronics</option>
										</select>
										<div class="gxcpl-ptop-10"></div>
									</div>
									<div class="col-md-3">
										<label>Semester</label>
										<br>
										<select name="branch" class="gxcpl-input-select">
											<option selected disabled>Select Branch</option>
											<option>1st</option>
											<option>2nd</option>
											<option>3rd</option>
											<option>4th</option>
											<option>5th</option>
											<option>6th</option>
										</select>
										<div class="gxcpl-ptop-10"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
						
				<div class="gxcpl-ptop-10"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default gxcpl-shadow-1">
							<div class="panel-heading">
								<h3 class="panel-title">Set Password</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
										<label> Password</label>
										<br>
										<cms:input type="Password" class="gxcpl-input-text" name="Password" placeholder="Enter Password" />
										<div class="gxcpl-ptop-10"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Confirm Password</label>
										<br>
										<cms:input type="Password" class="gxcpl-input-text" name="Password" placeholder="Again Enter Password" />
										<div class="gxcpl-ptop-10"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<center>
							<button type="button" class="btn btn-warning gxcpl-fc-21">
								<i class="fa fa-save"></i> Update
							</button>
						</center>
					</div>
				</div>
			</form>
			<div class="gxcpl-ptop-50"></div>
		</div>
		<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> 
						<cms:show item />
					</div>
				</cms:each>
			</div>
		</cms:if>
					
	</cms:form>
		<div class="gxcpl-ptop-50"></div>
		
	<cms:embed 'footer.html' />	
<?php COUCH::invoke(); ?>