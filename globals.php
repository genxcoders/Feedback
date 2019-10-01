<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Global Site Settings" executable="0" order="1" >
	<!-- Site Logo & Copyright -->
	<cms:editable name="ss" label="Site Settings" type="group" order="1" />
		<cms:editable name="ss_logo" label="Site Logo" type="image" show_preview="1" preview_width="100" group="ss" order="1" />
		<cms:editable name="ss_stitle" label="Site Small Title" type="text" group="ss" order="2" />
		<cms:editable name="ss_ltitle" label="Site Large Title" type="text" group="ss" order="3" />
		<cms:editable name="copyright" label="Copyright" type="text" group="ss" order="4" />
		<cms:editable name='ss_favicon' label='Favicon' desc='png image only' allowed_ext='png' type='image' show_preview='1' preview_width='16' group='ss' order='5' />
	<!-- Site Logo & Copyright -->

	<!-- Page Title -->
	<cms:editable name="feedback" label="Page Title - Group" type="group" order="2" />
		<cms:editable name="students" label=" Students Feedback- Page Title" type="text" group="feedback" order="1" />
		<cms:editable name="principal" label=" Principal- Page Title" type="text" group="feedback" order="2" />
		<cms:editable name="teachers" label="Teachers- Page Title" type="text" group="feedback" order="3" />
		<cms:editable name="login" label="Login- Page Title" type="text" group="feedback" order="4" />
		<cms:editable name="forgot" label="Forgot- Page Title" type="text" group="feedback" order="5" />
		<cms:editable name="reset" label="Reset- Page Title" type="text" group="feedback" order="6" />
		<cms:editable name="register" label="Register- Page Title" type="text" group="feedback" order="7" />
		<cms:editable name="profile" label="Profile- Page Title" type="text" group="feedback" order="8" />
		<cms:editable name="semester" label="Semester- Page Title" type="text" group="feedback" order="9" />
		<cms:editable name="branch" label="Branch- Page Title" type="text" group="feedback" order="10" />
		<cms:editable name="rating" label="Rating- Page Title" type="text" group="feedback" order="11" />
		<cms:editable name="subject" label="Subject- Page Title" type="text" group="feedback" order="12" />
	<!-- Page Title -->
</cms:template>
<?php COUCH::invoke( ); ?>