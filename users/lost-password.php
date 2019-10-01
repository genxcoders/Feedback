<?php require_once( '../couch/cms.php' ); ?>
    <cms:template title='Lost Password' hidden='1' />
<cms:embed 'header.html' />
    <cms:if k_logged_in >
        <!-- what is an already logged-in member doing on this page? Send back to homepage. -->
        <cms:redirect k_site_link />
    </cms:if>
    <cms:set success_msg="<cms:get_flash 'success_msg' />" />
    <cms:if success_msg >
        <div class="notice">
            <cms:if success_msg='1' >
                A confirmation email has been sent to you<br />
                Please check your email.
            <cms:else />
                Your password has been reset<br />
				Please check your email for the new password.
            </cms:if>
        </div>
    <cms:else />
        
        <!-- now the real work -->
        <cms:set action="<cms:gpc 'act' method='get'/>" />
        
        <!-- is the visitor here by clicking the reset-password link we emailed? -->
        <cms:if action='reset' >
            <h1>Reset Password</h1>
        
            <cms:process_reset_password send_mail='0' />
            
            <cms:if k_success >
            	<cms:send_mail from='admin@mysite.com' to=k_user_email subject='Your new password' debug='1'>
		            Your password has been resetted for the following site and username:
		            <cms:show k_site_link />
		            Username: <cms:show k_user_name />

		            New Password: <cms:show k_user_new_password />

		            Once logged in you can change your password.
		        </cms:send_mail>
                 <cms:set_flash name='success_msg' value='2' />
                 <cms:redirect url="profile.php" />          
            <cms:else />
                <div class="container">
	            	<div class="row">
	            		<div class="col-md-4 col-md-offset-4">
		                    <div class="alert alert-danger gxcpl-shadow-2">
		                    	<strong>Oops!</strong> <cms:show k_error />
		                    </div>
		                </div>
	                </div>
	            </div>
            </cms:if>
        
       <cms:else />
        
    
		<div class="login-box card-2 border-radius-2 bg-white gxcpl-padding-10">
			<!-- College Logo -->
			<img class="logo" src="../assets/images/gp-arvi-logo-no-bg.jpg" />
			<!-- College Logo -->

			<!-- College Name -->
			<h3 class="text-center gxcpl-no-margin">Govt. Polytechnic, Arvi</h3>
			<div class="gxcpl-ptop-30"></div>
			<!-- Login Form -->
			<cms:form method="post" anchor='0'>
                <cms:if k_success>
                
                    <!-- the 'process_forgot_password' tag below expects a field named 'k_user_name' -->
                    <cms:process_forgot_password send_mail='0' />
                    
                    <cms:if k_success>
                    	<cms:send_mail from='admin@mysite.com' to=k_user_email subject='Password reset requested' debug='1'>         
			                A request was received to reset your password for the following site and username:
			                <cms:show k_site_link />
			                Username: <cms:show k_user_name />

			                To confirm that the request was made by you please visit the following address, otherwise just ignore this email.
			                <cms:show k_reset_password_link />
			            </cms:send_mail> 
                        <cms:set_flash name='success_msg' value='1' />
                        <cms:redirect k_page_link /> 
                    </cms:if>    
                </cms:if>
                
                <cms:if k_error >
	            	<div class="col-md-12">
	            		<cms:each k_error >
	            			<div class="alert alert-danger">
		                    	<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> <cms:show item />
		                    </div>
	                	</cms:each>
	            	</div>
	            </cms:if>
				<cms:input class="form-control" type="text" name="k_user_name" placeholder="Username or Email Id" />
				<div class="gxcpl-ptop-20"></div>
				
				<center>
					<button type="submit" class="btn btn-danger btn-sm a_link">
						<i class="fa fa-power-off"></i> Reset Password
					</button>
				</center>
				<!-- Back to Login Link -->
			<div class="gxcpl-ptop-10"></div>
			<center>
				<a href="<cms:login_link />">
					Back to Login
				</a>
			</center>
		</cms:form>
			<!-- Back to Login Link-->
		</div>
		<!-- Login Box -->
		</cms:if>
    </cms:if>
    <cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>