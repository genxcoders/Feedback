<?php require_once( '../couch/cms.php' ); ?>

<cms:template clonable='1' title='Users' hidden='1' parent="_users_" order="1">
    <!-- 
        If additional fields are required for users, they can be defined here in the usual manner.
    -->     
    <!-- principa-->
    <cms:editable name="personal_details" type="row" order="1">
	    <cms:editable name="teacher_fname" label="First Name" type="text" order="1" class="col-md-4" required="1" />
	    <cms:editable name="teacher_mname" label="Middle Name" type="text" order="2" class="col-md-4"/>
	    <cms:editable name="teacher_lname" label="Last Name" type="text" order="3" class="col-md-4" required="1" />
	    <cms:editable name="teacher_dob" label="Date of Birth" type="datetime" order="4" class="col-md-6" required="1" />
	    <cms:editable name="teacher_gender" label="Gender" type="radio" opt_values="Male | Female | Other" order="5" class="col-md-6" required="1" />
	</cms:editable>    
	<cms:editable name="communication_details" type="row" order="2">
		<cms:editable name="teacher_mobile" label="Mobile" type="text" order="1" class="col-md-6" required="1" validator="exact_len=10 | non_negative_integer" />
		<cms:editable name="teacher_address" label="Address" type="textarea" no_xss_check="1" order="2" class="col-md-6" required="1" />
	</cms:editable>
	<cms:editable name="college_details" type="row" order="3">
		<cms:editable name="emp_id" label="Employee Id" type="text" order="1" class="col-md-12" />
		<!-- principa -->
	</cms:editable>
	<cms:editable name="college_details" type="row" order="3">
		<cms:editable name="d_o_a" label="Date of Addmition" type="datetime" order="1" class="col-md-3" />
	    <cms:editable name="E_no" label="Enrollment number" type="text" order="2" class="col-md-3">
	    <cms:editable name="branch" label="Branch" type="dropdown" order="3" class="col-md-3">
	    <cms:editable name="Semester" label="Semester" type="dropdown" order="4" class="col-md-3">
    </cms:editable>
	<cms:editable name="college_details" type="row" order="3">
          <cms:editable name="Teacher_id" label="Teacher Id" type="text" order="1" class="col-md-3" />
            <cms:editable name="teacher_type" label="Teacher Type" type="dropdown" order="2" class="col-md-3"/>
          </cms:editable>
    </cms:template>
<?php COUCH::invoke(); ?>