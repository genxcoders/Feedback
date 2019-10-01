<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Principal-registration' hidden='1' parent="_users_" order="2" />
<cms:embed "header.html" />
<!-- are there any success messages to show from previous actions? -->
<cms:set success_msg="<cms:get_flash 'success_msg' />" />
<cms:if success_msg >
	<div class="notice">
		<cms:if success_msg='1' >
			Your account has been created successfully and we have sent you an email.<br />
			Please click the verification link within that mail to activate your account.
		<cms:else />
			Activation was successful! You can now log in!<br />
			<a href="<cms:login_link redirect=k_site_link />">Login</a>
		</cms:if>
	</div>
<cms:else />

	<!-- now the real work -->
	<cms:set action="<cms:gpc 'act' method='get'/>" />
	<!-- is the visitor here by clicking the account-activation link we emailed? -->
	<cms:if action='activate' >
		<h1>Activate account</h1>
		<cms:process_activation />
		<cms:if k_success >
			<cms:set_flash name='success_msg' value='2' />
			<cms:redirect k_page_link />          
		<cms:else />
			<cms:show k_error />
		</cms:if>
	<cms:else />			 
		<cms:form 
			masterpage=k_user_template 
			mode='create'
			enctype='multipart/form-data'
			method='post'
			anchor='0'
		>
		
			<cms:if k_success >

				<cms:db_persist_form 
					_invalidate_cache='0'
					k_page_title = "<cms:show frm_teacher_fname /> <cms:show frm_teacher_lname />"
					k_page_name = "<cms:show frm_teacher_mobile />"
					k_publish_date = '0000-00-00 00:00:00'
				/>                    

				<cms:if k_success >
					<cms:send_mail from="<cms:php>echo K_EMAIL_FROM;</cms:php>" to=frm_extended_user_email subject='New Account Confirmation' debug='1'>
						Please click the following link to activate your account:
						<cms:activation_link frm_extended_user_email   />
						Thanks,
						Website Name
					</cms:send_mail>                        
					<cms:if k_success >
						<cms:set_flash name='success_msg' value='1' />
						<cms:redirect k_page_link />
					</cms:if>
				</cms:if> 
			</cms:if>

			<cms:if k_error >
				<cms:each k_error >
					<div class="row">
						<div class="col-md-4">
							<div class="alert alert-danger">
								<cms:show item />
							</div>
						</div>
					</div>
				</cms:each>
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
							<i class="fa fa-save"></i> Submit
						</button>
					</center>
				</div>
			</div>
		</cms:form>
	</cms:if>
</cms:if>    
<div class="gxcpl-ptop-50"></div>
<cms:embed "footer.html" />
<?php COUCH::invoke(); ?>