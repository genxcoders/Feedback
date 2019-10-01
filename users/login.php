<?php require_once( '../couch/cms.php' ); ?>
    <cms:template title='Login' hidden='1' />
   <cms:embed 'header.html' />
    <cms:if k_logged_in >

        <!-- this 'login' template also handles 'logout' requests. Check if this is so -->
        <cms:set action="<cms:gpc 'act' method='get'/>" />
    
        <cms:if action='logout' >
            <cms:process_logout />
        <cms:else />  
            <!-- what is an already logged-in member doing on the login page? Send back to homepage. -->
            <cms:redirect k_site_link />
        </cms:if>
    
    <cms:else />
		<cms:form method='post' anchor='0'>
            <cms:if k_success >
                <!-- 
                    The 'process_login' tag below expects fields named 
                    'k_user_name', 'k_user_pwd' and (optionally) 'k_user_remember', 'k_cookie_test'
                    in the form
                -->
                <cms:process_login />
                
            </cms:if>
            <div class="gxcpl-ptop-50"></div>
            <cms:if k_error >
            	<div class="col-md-12">
            		<cms:each k_error >
            			<div class="alert alert-danger">
	                    	<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> <cms:show item />
	                    </div>
                	</cms:each>
            	</div>
            </cms:if>
            	<!-- Login Box -->
				<div class="login-box card-2 border-radius-2 bg-white gxcpl-padding-10">
				<!-- College Logo -->
				<img class="logo" src="../assets/images/gp-arvi-logo-no-bg.jpg" />
				<!-- College Logo -->

				<!-- College Name -->
				<h3 class="text-center gxcpl-no-margin">Govt. Polytechnic, Arvi</h3>
				<div class="gxcpl-ptop-30"></div>
				<!-- College Name -->
				<!-- Login box -->
				<!-- Login Form -->
				<cms:input class="form-control" type="text" name="k_user_name" placeholder="Username or Email Id" />
				<div class="gxcpl-ptop-10"></div>
				<cms:input class="form-control" type="password" name="k_user_pwd" placeholder="Password" />
				<div class="gxcpl-ptop-10"></div>
				<center>
					<strong>
						<input type="checkbox" name="k_user_remember" value="Remember Me?" /> Remember Me
					</strong>
				</center>
				<div class="gxcpl-ptop-10"></div>

				<input type="hidden" name="k_cookie_test" value="1" />

				<center>
					<button type="submit" class="btn btn-danger btn-sm" >
						<i class="fa fa-sign-in"></i> LOGIN
					</button>
				</center>
			</cms:form>
			<!-- Login Form -->

			<!-- Forgot Password Link -->
			<div class="gxcpl-ptop-10"></div>
			<center>
	            Forgot your password? <a href="<cms:link k_user_lost_password_template />" />Click here.</a> <br>
			</center>
			<!-- Forgot Password Link -->
		</div>
		<!-- Login Box -->

    </cms:if>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>	