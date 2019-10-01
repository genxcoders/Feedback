<?php require_once( '../couch/cms.php' ); ?>
	<cms:template title='principal-profile' hidden='1' />
	<cms:embed 'header.html' />
	<!--if logout-->
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
					<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> 
					<cms:show item />
				</div>
			</cms:each>
		</div>
	</cms:if>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default gxcpl-shadow-1">
					<div class="panel-heading">
						<h3 class="panel-title">Principal: Personal Details</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<label>First Name</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="teacher_fname" placeholder="Enter First Name" />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<div class="col-md-3">
								<label>Middle Name</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="teacher_mname" placeholder="Enter Middle Name" />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<div class="col-md-3">
								<label>Last Name</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="teacher_lname" placeholder="Enter Last Name" />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<div class="col-md-3">
								<label>Date of Birth</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="teacher_dob" />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<!-- <div class="col-md-12">
							<div class="gxcpl-ptop-10"></div>
							</div> -->
							<div class="col-md-4">
								<div class="form-group">
									<label>Gender</label>
									<br>
									<cms:input type="bound" name="teacher_gender" />
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
						<h3 class="panel-title">Principal: Contact Details</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<label>Email</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="extended_user_email" placeholder="Enter Email Id" />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<div class="col-md-6">
								<label>Mobile no.</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="teacher_mobile" placeholder="Enter 10 Digit Mobile No." />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<div class="col-md-12">
								<label>Address</label>
								<br>
								<cms:input type="bound" name="teacher_address" cols="100" rows="4" class="gxcpl-input-text-2" />
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
						<h3 class="panel-title">Principal: College Details</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<label>Principal ID</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="emp_id" />
								<div class="gxcpl-ptop-10"></div>
							</div>
							<!-- <div class="gxcpl-ptop-10"></div> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default gxcpl-shadow-1">
					<div class="panel-heading">
						<h3 class="panel-title">Set Password</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<label>Password</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="extended_user_password" placeholder="Enter Password" />
								<div class="gxcpl-ptop-10"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Confirm Password</label>
								<br>
								<cms:input type="bound" class="gxcpl-input-text" name="extended_user_password_repeat" placeholder="Again Enter Password" />
								<div class="gxcpl-ptop-10"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- </div>		 -->

		<div class="gxcpl-ptop-10"></div>

		<div class="row">
			<div class="col-md-12">
				<center>
					<button type="submit" class="btn btn-warning gxcpl-fc-21">
						<i class="fa fa-save"></i> Update
					</button>
				</center>
			</div>
		</div>
	</cms:form>  
	<!-- Container completed -->
<cms:embed 'footer.html' />	
<?php COUCH::invoke(); ?>