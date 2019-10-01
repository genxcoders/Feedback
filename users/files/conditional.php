<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Conditional Fields" clonable='1' >
	<cms:editable name="fname" required='1' type="text" order='1' />
	<cms:editable name="mname" type="text" order='2' />
	<!-- Conditional Fields -->
	
    <cms:editable 
        type='dropdown' 
        name='account_type' 
        label='Select Account Type' 
        opt_values='Please indicate=- | Principal | Teacher | Student' 
        required='1'
        not_active=my_cond
    />

    <cms:func _into='my_cond' account_type=''>
        <cms:if 
            "<cms:is 'Principal' in=account_type />" 
        >
            show
        <cms:else />
        	hide
        </cms:if>
    </cms:func>
    <cms:editable name="lname_principal" required='1' type="text" order='3' />

    <cms:func _into='my_cond' account_type=''>
        <cms:if 
            "<cms:is 'Teacher' in=account_type />" 
        >
            show
        <cms:else />
        	hide
        </cms:if>
    </cms:func>
    <cms:editable name="lname_teacher" required='1' type="text" order='3' />

    <cms:func _into='my_cond' account_type=''>
        <cms:if 
            "<cms:is 'Student' in=account_type />" 
        >
            show
        <cms:else />
        	hide
        </cms:if>
    </cms:func>
    <cms:editable name="lname_student" required='1' type="text" order='3' />
	<!-- Conditional Fields -->
</cms:template>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="<cms:show k_admin_link/>includes/jquery-3.x.min.js?v=<cms:show k_cms_build />"></script>
		<style type="text/css">
			#k_element_previous_lname_principal,
			#k_element_previous_lname_teacher,
			#k_element_previous_lname_student {
				display: none;
			}
		</style>
	</head>
	<body>

		<!-- Form -->
		<cms:set submit_success="<cms:get_flash 'submit_success' />" />
	    <cms:if submit_success >
	        <h4>Success: Your application has been submitted.</h4>
	    </cms:if>

	    <cms:form
	        masterpage=k_template_name
	        mode='create'
	        enctype='multipart/form-data'
	        method='post'
	        anchor='0'
	   	>

	        <cms:if k_success >
	            <cms:db_persist_form
	                _invalidate_cache='0'
	                _auto_title='1'
	            />
	            <cms:if k_success>
		            <cms:set_flash name='submit_success' value='1' />
		            <cms:redirect k_page_link />
		        </cms:if>
	        </cms:if>

	        <cms:if k_error >
	            <div class="error">
	                <cms:each k_error >
	                    <br><cms:show item />
	                </cms:each>
	            </div>
	        </cms:if>

	        <!-- Common Content -->
	        <cms:input name="fname" type="bound" placeholder="First Name" />
	        <br>
	        <cms:input name="mname" type="bound" placeholder="Middle Name" />
	        <br>
	        <div id="k_element_previous_number_of_employers">
	        <cms:input name="account_type" type="bound" />
	    	</div>
	        <!-- Common Content -->

	        <!-- Principal -->
	    	<div id="k_element_previous_lname_principal">
	    		<cms:input name="lname_principal" type="bound" placeholder="Principal Last Name" />
	    	</div>
	    	<!-- Principal -->

	    	<!-- Teacher -->
	    	<div id="k_element_previous_lname_teacher">
	    		<cms:input name="lname_teacher" type="bound" placeholder="Teacher Last Name" />
	    	</div>
	    	<!-- Teacher -->

	    	<!-- Student -->
	    	<div id="k_element_previous_lname_student">
	    		<cms:input name="lname_student" type="bound" placeholder="Student Last Name" />
	    	</div>
	    	<!-- Student -->

	    </cms:form>
		<!-- Form -->

		<script type="text/javascript">
		    //<![CDATA[
		    <cms:conditional_js />
		    //]]>
		</script>

	</body>
</html>
<?php COUCH::invoke(); ?>