<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Conditional Fields Test' >
    <cms:editable 
        type='checkbox' 
        name='previous_work_experience' 
        label='Any previous employment experience?' 
        opt_values='Yes' 
    />

    <cms:func _into='my_cond' previous_work_experience=''>
        <cms:if "<cms:is 'Yes' in=previous_work_experience />">show<cms:else />hide</cms:if>
    </cms:func>
    <cms:editable 
        type='dropdown' 
        name='previous_number_of_employers' 
        label='Please select the number of places you have been previously employed' 
        opt_values='Please indicate=- | Principal | Teacher | Student' 
        required='1'
        not_active=my_cond
    />
    
    <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
        <cms:if 
            "<cms:is 'Yes' in=previous_work_experience />" 
            && 
            (previous_number_of_employers='Principal' || previous_number_of_employers='Teacher' || previous_number_of_employers='Student')
        >
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <cms:editable name='previous_employer1' type='row'>
        <cms:editable name='previous_employer1_name' label='Employer Name (1)' type='text' required='1' class='col-md-4' not_active=my_cond />
        <cms:editable name='previous_employer1_phone' label='Employer Phone (1)' type='text' required='1' class='col-md-4' not_active=my_cond />
        <cms:editable name='previous_employer1_email' label='Employer Email (1)' type='text' required='1' class='col-md-4' not_active=my_cond />
    </cms:editable>
    
    <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
        <cms:if 
            "<cms:is 'Yes' in=previous_work_experience />" 
            && 
            (previous_number_of_employers='Two' || previous_number_of_employers='Three')
        >
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <cms:editable name='previous_employer2' type='row'>
        <cms:editable name='previous_employer2_name' label='Employer Name (2)' type='text' required='1' class='col-md-4' not_active=my_cond />
        <cms:editable name='previous_employer2_phone' label='Employer Phone (2)' type='text' required='1' class='col-md-4' not_active=my_cond />
        <cms:editable name='previous_employer2_email' label='Employer Email (2)' type='text' required='1' class='col-md-4' not_active=my_cond />
    </cms:editable>
    
    <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
        <cms:if "<cms:is 'Yes' in=previous_work_experience />" && previous_number_of_employers='Three'>
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <cms:editable name='previous_employer3' type='row'>
        <cms:editable name='previous_employer3_name' label='Employer Name (3)' type='text' required='1' class='col-md-4' not_active=my_cond />
        <cms:editable name='previous_employer3_phone' label='Employer Phone (3)' type='text' required='1' class='col-md-4' not_active=my_cond />
        <cms:editable name='previous_employer3_email' label='Employer Email (3)' type='text' required='1' class='col-md-4' not_active=my_cond />
    </cms:editable>
</cms:template>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <script src="<cms:show k_admin_link/>includes/jquery-3.x.min.js?v=<cms:show k_cms_build />"></script>
        <style>
        input[type="text"], input[type="password"], textarea, select {
            max-width: 100%;
            height: 38px;
            padding: 8px;
            border: 1px solid #c0c0c0;
            border-radius: 3px;
            background-color: #fcfcfc;
            color: #444;
            font-family: inherit;
            font-size: 14px;
            box-shadow: none;
        }
        
        /* conditional fields */
#k_element_previous_number_of_employers, #k_element_previous_employer1_name, #k_element_previous_employer1_phone, #k_element_previous_employer1_email, #k_element_previous_employer2_name, #k_element_previous_employer2_phone, #k_element_previous_employer2_email, #k_element_previous_employer3_name, #k_element_previous_employer3_phone, #k_element_previous_employer3_email
{ display:none; }

        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
            
                    <!-- 
                        After this template has been registered (is visible in admin-panel sidebar), you may
                        remove tbe following <cms:ignore> and its closing </cms:ignore> tag below to activate the databound form.
                    !-->
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

                    <div class="form-group">
                        <label>Want to Register Your Account?</label> 
                        <div>
                            <cms:input name="previous_work_experience" type="checkbox" opt_values="Yes" /> 
                        </div>
                    </div> 

                    <cms:func _into='my_cond' previous_work_experience=''>
                        <cms:if "<cms:is 'Yes' in=previous_work_experience />">show<cms:else />hide</cms:if>
                    </cms:func>

                    <div class="form-group" id="k_element_previous_number_of_employers">
                        <label for="previous_number_of_employers">Please select Your Account Type</label>
                        <div>
                            <cms:input name="previous_number_of_employers" type="dropdown" opt_values='Please indicate=- | Principal | Teacher | Student' required='1' not_active=my_cond />
                        </div>
                    </div>
                    <!-- Principal Profile Code  -->
                    <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
                        <cms:if 
                            "<cms:is 'Yes' in=previous_work_experience />" 
                            && 
                            (previous_number_of_employers='Principal')
                        >
                            show
                        <cms:else />
                            hide
                        </cms:if>
                    </cms:func>
                    <!-- Principal Profile Code  -->
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
                    <!-- </div>      -->
                
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
                    <!-- Principal Profile Code  -->

                    <!-- Teacher Profile Code  -->
                    <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
                        <cms:if 
                            "<cms:is 'Yes' in=previous_work_experience />" 
                            && 
                            (previous_number_of_employers='Teacher')
                        >
                            show
                        <cms:else />
                            hide
                        </cms:if>
                    </cms:func>
        
                    
                    <!-- Teacher Profile Code  -->
                    <!-- Student Profile Code  -->
                    <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
                        <cms:if "<cms:is 'Yes' in=previous_work_experience />" && previous_number_of_employers='Student'>
                            show
                        <cms:else />
                            hide
                        </cms:if>
                    </cms:func>
    
                    <!-- Student Profile Code  -->
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
            </cms:form>
        </cms:if>
    </cms:if>    
<div class="gxcpl-ptop-50"></div>
        <script type="text/javascript">
            //<![CDATA[
            <cms:conditional_js />
            //]]>
        </script>
    </body>
</html>
<?php COUCH::invoke(); ?>