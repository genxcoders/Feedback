<?php require_once( 'couch/cms.php' ); ?>
    <cms:template title='Conditional Fields Test' >
            <cms:editable 
                type='checkbox' 
                name='previous_work_experience' 
                label='Any previous employment experience?' 
                opt_values='Yes' 
            />
            <cms:func _into='my_cond' previous_work_experience=''>
                <cms:if "<cms:is 'Yes' in=previous_work_experience />">show
                  <cms:else />hide
                </cms:if>
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
                        (previous_number_of_employers='Principal')
                        >
                  show
                      <cms:else />
                      hide
                </cms:if>
            </cms:func>
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
        <cms:editable name="principal_id" label="Principal Id" type="text" order="1" class="col-md-12" />
        <!-- principa -->
    </cms:editable>
      <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
        <cms:if 
                "<cms:is 'Yes' in=previous_work_experience />" 
                && 
                (previous_number_of_employers='Teacher' || previous_number_of_employers='Student')
                >
        show
          <cms:else />
          hide
        </cms:if>
      </cms:func>
      <cms:editable name="college_details" type="row" order="3">
            <cms:editable name="teacher_id" label="Teacher_Id" type="text" order="1" class="col-md-3" />
            <cms:editable name="teacher_type" label="Teacher_Type" type="dropdown" order="2" class="col-md-3"/>
          </cms:editable>
      <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
        <cms:if "<cms:is 'Yes' in=previous_work_experience />" && previous_number_of_employers='Student'>
          show
          <cms:else />
          hide
        </cms:if>
              </cms:func>
          <cms:editable name="college_details" type="row" order="3">
            <cms:editable name="d_o_a" label="Date of Addmition" type="datetime" order="1" class="col-md-3" />
            <cms:editable name="e_no" label="Enrollment number" type="text" order="2" class="col-md-3"/>
            <cms:editable name="branch" label="Branch" type="dropdown" order="3" class="col-md-3"/>
            <cms:editable name="sem" label="Semester" type="dropdown" order="4" class="col-md-3"/>
          </cms:editable>
        </cms:template>
            <cms:embed 'header.html' />
          
            <div class="row align-items-center mt-5">
              <div class="container col-8 col-offset-2">
                <!-- 
        After this template has been registered (is visible in admin-panel sidebar), you may
        remove tbe following <cms:ignore> and its closing </cms:ignore> tag below to activate the databound form.
        !-->
                <br>
                <h4>Regular Form</h4>
                <hr>
                <cms:set submit_success="<cms:get_flash 'submit_success2' />" />
                <cms:if submit_success >
                  <div class="alert alert-success fade in show" style="margin-top:18px;">
                    <strong>Saved
                    </strong>
                  </div>
                </cms:if>
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
            <div class="form-group">
                    <label>Any previous employment experience?</label> 
                <div>
                  <cms:input name="previous_work_experience" type="checkbox" opt_values="Yes" /> 
                </div>
            </div> 
              <cms:func _into='my_cond' previous_work_experience=''>
                <cms:if "<cms:is 'Yes' in=previous_work_experience />">show
                    <cms:else />hide
                </cms:if>
              </cms:func>
            <div class="form-group" id="k_element_previous_number_of_employers">
                <label for="previous_number_of_employers">Please select the number of places you have been previously employed</label>
                <div>
                  <cms:input name="previous_number_of_employers" type="dropdown" opt_values='Please indicate=- | Principal | Teacher | Student' required='1' not_active=my_cond />
                </div>
            </div>
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
                                <cms:input type="bound" name="teacher_address" class="gxcpl-input-text-2" />
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
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default gxcpl-shadow-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">Teacher: Personal Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>First Name</label>
                                        <br>
                                        <input type="text" class="gxcpl-input-text" name="text" placeholder="Enter First Name" >
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Middle Name</label>
                                        <br>
                                        <input type="text" class="gxcpl-input-text" name="text" placeholder="Enter Middle Name" >
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Last Name</label>
                                        <br>
                                        <input type="text" class="gxcpl-input-text" name="text" placeholder="Enter Last Name" >
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Date of Birth</label>
                                        <br>
                                        <input type="date" class="gxcpl-input-text" name="date">
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">Female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" vallue="option3">Other
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
                                <h3 class="panel-title">Teacher: Contact Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <br>
                                        <input type="text" class="gxcpl-input-text" name="Email" placeholder="Enter Email Id">
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile no.</label>
                                        <br>
                                        <input type="text" class="gxcpl-input-text" name="number" placeholder="Enter 10 Digit Mobile No.">
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
                                <h3 class="panel-title">Teacher: College Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Teacher ID</label>
                                        <br>
                                        <input type="text" class="gxcpl-input-text" name="text" />
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Teacher Type</label>
                                        <br>
                                        <select name="Teacher type" class="gxcpl-input-select">
                                            <option selected disabled>Select Teacher type</option>
                                            <option>Regular</option>
                                            <option>Visitor</option>
                                        </select>
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
                                <h3 class="panel-title">Change Password</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                            
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>New Password</label>
                                        <br>
                                        <input type="Password" class="gxcpl-input-text" name="Password" placeholder="Enter New Password" />
                                        <div class="gxcpl-ptop-10"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Confirm Password</label>
                                        <br>
                                        <input type="Password" class="gxcpl-input-text" name="Password" placeholder="Confirm Password" />
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
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </center>
                    </div>
                </div>
              <cms:func _into='my_cond' previous_work_experience='' previous_number_of_employers=''>
                <cms:if "<cms:is 'Yes' in=previous_work_experience />" && previous_number_of_employers='Student'>
                  show
                  <cms:else />
                  hide
                </cms:if>
              </cms:func>
              <div class="gxcpl-ptop-10"></div>          
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
                            <div class="col-md-12">
                                <div class="gxcpl-ptop-10"></div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Gender</label>
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
                        <h3 class="panel-title">Student: Contact Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                                <br>
                                <input type="text" class="gxcpl-input-text" name="Email" placeholder="Enter Email Id">
                                <div class="gxcpl-ptop-10"></div>
                            </div>
                            <div class="col-md-6">
                                <label>Mobile no.</label>
                                <br>
                                <input type="text" class="gxcpl-input-text" name="number" placeholder="Enter 10 Digit Mobile No.">
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
                                <input type="date" class="gxcpl-input-text" name="date" />
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
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">                                   
                            <div class="col-md-3">
                                <label>New Password</label>
                                <br>
                                <input type="Password" class="gxcpl-input-text" name="Password" placeholder="Enter New Password" />
                                <div class="gxcpl-ptop-10"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Confirm Password</label>
                                <br>
                                <input type="Password" class="gxcpl-input-text" name="Password" placeholder="Confirm Password" />
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
                        <i class="fa fa-save"></i> Submit
                    </button>
                </center>
            </div>
        </div>
    </cms:form>
    
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>
