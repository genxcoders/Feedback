<?php require_once( '../couch/cms.php' ); ?>
    <cms:template title='Reset Password' hidden='1' />
	<cms:embed 'header.html' />
		<!-- Login Box -->
		<div class="login-box card-4 border-radius-2 bg-white gxcpl-padding-10">
			<!-- College Logo -->
			<img class="logo" src="../assets/images/gp-arvi-logo-no-bg.jpg" />
			<!-- College Logo -->

			<!-- College Name -->
			<h3 class="text-center gxcpl-no-margin">Govt. Polytechnic, Arvi</h3>
			<div class="gxcpl-ptop-30"></div>
			<!-- College Name -->

			<!-- Login Form -->
			<form action="" method="post">
				<input class="form-control" type="text" name="username" placeholder="Enter Your New Password" />
				<div class="gxcpl-ptop-20"></div>
				<input class="form-control" type="password" name="password" placeholder="Re-Enter Password" />
				<div class="gxcpl-ptop-20"></div>
				
				<div class="gxcpl-ptop-10"></div>
				<center>
					
					<button type="submit" class=" btn-danger btn-sm a_link" onclick="alert('Password Reset Successful')">
							<i class="fa fa-sign-in"></i><a href="Reset-pass.html"></a> Reset password
					</button>
				</center>
					<center>
					<div class="gxcpl-ptop-10"></div>
					<a href="login.html">Back to logIn</a>
				</center>
			</form>
			<!-- Login Form -->

			
		<!-- Login Box -->
    <cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>