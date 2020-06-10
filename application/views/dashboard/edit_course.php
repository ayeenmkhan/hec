<?php echo $header_script;?>
<?php echo $header;?>
<div class="content-inner">
    <!-- Page Header-->
          <!-- Page Header-->
   <header class="course_cover">
          <!-- <div class="course_cover"></div> -->
          </header>
          <!-- Updates Section                                                -->
          <section class="updates">
                     <div class="col-md-12">

           <?php

                            if($this->session->flashdata('err_message')){

                        ?>

                                <div class="alert alert-danger"><center><?php echo $this->session->flashdata('err_message'); ?><center></div>

                        <?php

                            }//end if($this->session->flashdata('err_message'))

                            

                            if($this->session->flashdata('ok_message')){

                        ?>

                                <div class="alert alert-success alert-dismissable"><center><?php echo $this->session->flashdata('ok_message'); ?><center></div>

                        <?php 

                            }

                        ?>

                </div>  
         <div class="col-md-12 container-fluid">
          <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <?php if($this->session->userdata('user_type')!=3){?>
            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Course Info</a>
          <?php }?>
            <a class="nav-item nav-link active" id="nav-module-tab" data-toggle="tab" href="#course_modules" role="tab" aria-controls="nav-profile" aria-selected="false">Course Module</a>
            <!-- <a class="nav-item nav-link" id="nav-assesment-tab" data-toggle="tab" href="#assesment" role="tab" aria-controls="nav-contact" aria-selected="false">Assesments</a> -->
         
          </div>
        </nav>
     
      </div>
      <br>
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Help Info</h3>
                    </div>
                    <div class="card-body">
                      <p>Please add all course related details in following panel. Add brief course description and relevant tags to define course discipline. Users can be selected department wise, Zone wise, or by customise selection.<br>

Add all course content into following panel. Give Heading title and brief description of every module. Add assessment question afterwards save the module.
Publish the course in order to assign it to the selected users.</p>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                   <!-- ************ -->
            <section class=""> 
            <form action="<?php echo SURL;?>admin/<?php if($course_info['status']==3){?>update_published_course<?php }else{?>update_new_course<?php }?>" method="post" class="form-validate" enctype="multipart/form-data" >
            <div class="container-fluid">
            <div class="row">
                <!-- Basic Form-->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                      
                      </div>
                    </div>

                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Course Information</h3>

                    </div>
                    <div class="card-body">
                      <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
                        <div class="form-group">
                          <label class="form-control-label">Course Name</label>
                          <input type="text" placeholder="Course Name" value="<?php echo $course_info['name'];?>" name="course_name" class="form-control" required="" data-msg="Please enter a valid Course Name">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Description</label>
                          <textarea placeholder="Description" name="description" class="form-control" required="" data-msg="Please enter a valid Description"><?php echo $course_info['description'];?></textarea>
                        </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>

        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Assign Students</h3>
                    </div>
                    <div class="card-body">
                      <?php $view= getCourseClass($course_id);?>
                           <div class="form-group" id="stud">
                                  <label>Class</label>
                                  <select class="form-control" name="class" required="" data-msg="Please Select">
                                    <option value="">Select Class</option>
                                    <option value="1"<?php if($view['class']==1){echo "selected";}?>>Class 1</option>
                                    <option value="2"<?php if($view['class']==2){echo "selected";}?>>Class 2</option>
                                    <option value="3"<?php if($view['class']==3){echo "selected";}?>>Class 3</option>
                                    <option value="4"<?php if($view['class']==4){echo "selected";}?>>Class 4</option>
                                    <option value="5"<?php if($view['class']==5){echo "selected";}?>>Class 5</option>
                                    <option value="6"<?php if($view['class']==6){echo "selected";}?>>Class 6</option>
                                    <option value="7"<?php if($view['class']==7){echo "selected";}?>>Class 7</option>
                                    <option value="8"<?php if($view['class']==8){echo "selected";}?>>Class 8</option>
                                    <option value="9"<?php if($view['class']==9){echo "selected";}?>>Class 9</option>
                                    <option value="10"<?php if($view['class']==10){echo "selected";}?>>Class 10</option>
                                    
                                  </select>
                                </div>
                    </div>
                  </div>
                </div>
               
              </div>
               <input type="submit" class="btn btn-success btn-sm pull-right" name="">
            </div>

            <!-- Show assigned Users -->

            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Assigned Users</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php $users= getCourseAssignedUser($course_id);?>
                      <?php foreach($users as $res){?>
                      <?php $username= getUserNameByEmployeeID($res['user_id']);?>
                      <div class="col-md-2">
                          <div class="feed-body d-flex justify-content-between">
                          <a href="<?php echo SURL;?>admin/remove_course_assigned_users/<?php echo $res['id'];?>/<?php echo $course_id;?>"onclick="return confirm('Are you sure want to remove the user from the course ?')"><i class="fa fa-close" style="font-size:18px;color:red"></i></a>
                           <img src="<?php echo SURL;?>assets/img/placeholder.png" alt="person" class="img-fluid rounded-circle">
                             <!--  <span class="center" style="position: absolute; top: 176px; left: 77px;"></span> -->

                            </div> 
                           <p class="text-center"> <?php echo $username['name'];?></p>
                          </div>
                        <?php }?>
                        </div>

                    </div>
                  </div>
                </div>
               
              </div>
                 <?php if($this->session->userdata('user_type')==3){?>
               <input type="submit" class="btn btn-success btn-sm pull-right" name="submit"><br></br>
             <?php }else{?>
              <input type="submit" class="btn btn-success btn-sm pull-right" value="Update & Save" name="submit">
              <!--  <input type="submit" value="Publish" class="btn btn-success btn-sm pull-right" name="published" style="margin: 1px;"> -->
              <?php }?>
            </div>
            <!-- End Assigned users -->
          </form>
                </section>
              </div>
    

    <div class="tab-pane fade show active" id="course_modules" role="tabpanel" aria-labelledby="nav-module-tab">
                   <!-- ************ -->
                
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <div class="col-lg-6">
                      <h3 class="h4">Course Content</h3>
                    </div>
                    <div class="col-lg-6">
                     <button class="btn btn-success btn-sm pull-right" type="button" data-toggle="modal" data-target="#myModal">Add Module</button>
                    </div>
                    </div>
  <div id="accordion">
    
    <?php $module= getCourseModuleByID($course_id);?>
    <input type="hidden" id="checkModule" value="<?php echo count($module);?>">
  <?php $row=1;foreach ($module as $res){?>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row;?>" aria-expanded="true" aria-controls="collapseOne">
         Module <?php echo $row;?> : <?php echo $res['title']?>
        </button>
      <a href="<?php echo SURL;?>admin/delete_module/<?php echo $res['id']?>/<?php echo $course_id;?>" onclick="return confirm('Are you sure want to delete?')" class="pull-right"><i class="fa fa-close" style="font-size:18px;color:red"></i></a>
      </h5>

    </div>

    <div id="collapse<?php echo $row;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
                   <div class="card-body" id="courses_module">
                      <!-- Module class start -->
                      <div class="module_class">
                      <form action="<?php echo SURL;?>admin/update_course_module" class="form-validate" method="post" enctype="multipart/form-data">
                      <table class="table" id="module_<?php echo $row;?>">
                          <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
                          <input type="hidden" name="module_id" value="<?php echo $res['id'];?>">
                          
                          <tr>
                            <td>Module Name:</td>
                            <td><input type="text" name="module_name" value="<?php echo $res['title']?>" class="form-control" required="" data-msg="Please enter a valid Module Name"></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Description:</td>
                            <td><textarea type="text" name="description" class="form-control" required="" data-msg="Please enter a valid Description"><?php echo $res['description']?></textarea></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>File:</td>
                            <td><video width="320" height="240" controls>
                            <source src="<?php echo $res['course_file'];?>" type="video/mp4">
                            <source src="<?php echo $res['course_file'];?>" type="video/ogg">
                            </video></td>
                            <input type="hidden" name="filename" value="<?php echo $res['file_name'];?>">
                            <td><p>Update & Edit File:<small>(only mp4, wma is allowed and the file size should be less than equal to 10 MB )</small></p><input type="file" id="videoFile_<?php echo $row;?>" onchange="return ValidateVideo(this,<?php echo $row;?>)" name="course_file" class="form-control"></td>
                            <td></td>
                          </tr>
                          <tbody id="modulemcqs_<?php echo $row;?>">
                          <tr>
                            <th>Assessment MCQs</th>
                            <th></th>
                          </tr>
                          <?php $questions =getAllQuestionsByModuleID($res['id']);?>
                          <?php $count=1;foreach($questions as $ress){?>
                          <tr id='row-<?php echo $count;?>'>
                            <td class="modulequestion">Question <?php echo $count;?></td>
                            <td><input type="text" name="questions[<?php echo $count;?>][question]" value="<?php echo $ress['question']?>" class="form-control " required="" data-msg="Please enter a valid Question"></td>
                            <input type="hidden" value="<?php echo $ress['id'];?>" name="questions[<?php echo $count;?>][number]">
                            <td>Choose Correct Answer</td>
                            <td><a href="<?php echo SURL;?>admin/delete_assessment_questions/<?php echo $ress['id']?>/<?php echo $course_id;?>" onclick="return confirm('Are you sure want to delete?')" class="pull-right"><i class="fa fa-close" style="font-size:18px;color:red"></i></a></td>
                          </tr>
                          <tr id='row-<?php echo $count;?>'>
                            <td>Option 1:</td>
                            <td><input type="text" id="options1-<?php echo $count;?>" name="questions[<?php echo $count;?>][option1]" value="<?php echo $ress['choice_one']?>" class="form-control" ></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" onchange="editAnswer('options1-<?php echo $count;?>',<?php echo $count;?>)" value="1" type="radio" <?php if($ress['selected_option']==1){echo "checked";}?>  name="questions[<?php echo $count;?>][true]" class="radio-template">
                              <label for="radioCustom1"></label>
                            </div></td>
                            <td></td>
                          </tr>
                          <tr id='row-<?php echo $count;?>'>
                            <td>Option 2:</td>
                            <td><input type="text" id="options2-<?php echo $count;?>" name="questions[<?php echo $count;?>][option2]" value="<?php echo $ress['choice_two']?>" class="form-control" ></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" onchange="editAnswer('options2-<?php echo $count;?>',<?php echo $count;?>)" value="2" type="radio" <?php if($ress['selected_option']==2){echo "checked";}?> name="questions[<?php echo $count;?>][true]" class="radio-template">
                              <label for="radioCustom1"></label>
                            </div></td>
                            <td></td>
                          </tr>
                          <tr id='row-<?php echo $count;?>'>
                            <td>Option 3:</td>
                            <td><input type="text" id="options3-<?php echo $count;?>" name="questions[<?php echo $count;?>][option3]" value="<?php echo $ress['choice_three']?>" class="form-control" ></td>
                            <td>
                              <div class="i-checks">
                              <input id="radioCustom1" onchange="editAnswer('options3-<?php echo $count;?>',<?php echo $count;?>)" type="radio" value="3" <?php if($ress['selected_option']==3){echo "checked";}?> name="questions[<?php echo $count;?>][true]" class="radio-template">
                              <label for="radioCustom1"></label>
                              
                            </div>
                            </td>
                            <td></td>
                          </tr>     
                          <tr id='row-<?php echo $count;?>'>
                            <td>Option 4:</td>
                            <td><input type="text" id="options4-<?php echo $count;?>" name="questions[<?php echo $count;?>][option4]" value="<?php echo $ress['choice_four']?>" class="form-control" ></td>
                            <td>
                              <div class="i-checks">
                              <input id="radioCustom1" onchange="editAnswer('options4-<?php echo $count;?>',<?php echo $count;?>)" type="radio" value="4" <?php if($ress['selected_option']==4){echo "checked";}?> name="questions[<?php echo $count;?>][true]" class="radio-template">
                              <label for="radioCustom1"></label>
                              <input type="hidden" value="<?php echo $ress['answer'];?>" name="questions[<?php echo $count;?>][answer]" id="answers-<?php echo $count;?>">
                            </div>
                            </td>
                            <td></td>
                          </tr>
                        <?php $count++;}?>

                        </tbody>

                      </table>
                      <p><input type="submit" class="btn btn-success btn-sm pull-right" value="Update & Save" name="save"><button class="btn btn-success btn-sm " type="button" onclick="add_module_mcqs(<?php echo $row;?>)">Add MCQ</button>
                      </p>
                    </form>
                    </div>
                    <!-- Module class end -->
                  </div>
      </div>
    </div>

  
  </div>
<?php $row++;}?>

</div>
<?php if($this->session->userdata('user_type')==3 ){?>
<form action="<?php echo SURL;?>admin/update_course_module" onsubmit="return checkModule()" method="post">
  <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
  <div class="text-center">
  <input type="submit" class="btn btn-success btn-sm" name="review" value="submit for review" name="save">
</div>
</form>
<?php }?>

                  </div>
                  
                </div>
</div>   
<?php if($this->session->userdata('user_type')!=3 ){?>
  <form id ="published_form"action="<?php echo SURL;?>admin/update_new_course" onsubmit="return checkModule()" method="post">
  <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
 <div class="text-center"> 

<?php if($course_info['status']!=3){?>
<input type="button" value="Publish Course" onclick="sendNotifications()" class="btn btn-success btn-sm align-center" name="published" style="margin: 1px;">
<?php }?>
</div>
</form>
<?php }?>
                         <!--Module Modal-->
          <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Add New Module</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                             
                            <div class="modal-body">
                    <?php $courses = getAllCourses();?>
                    <div class="card-body" id="course_module">
                      <!-- Module class start -->
                      <div class="module_class">
                      <form action="<?php echo SURL;?>admin/add_course_module" class="form-validate" method="post" enctype="multipart/form-data">
                      <table class="table" id="module">
                          <input type="hidden" name="course_id" value="<?php echo $course_id;?>">
                          <tr>
                            <td>Module Name:</td>
                            <td><input type="text" name="module_name" class="form-control" required="" data-msg="Please enter a valid Module Name"></td>
                          </tr>
                          <tr>
                            <td>Description:</td>
                            <td><textarea type="text" name="description" class="form-control" required="" data-msg="Please enter a valid Description"></textarea></td>
                          </tr>
                          <tr>
                            <td>File: (only mp4, wma is allowed and the file size should be less than equal to 10MB) </td>
                            <td><input type="file" name="course_file" id="videoFile" onchange="return ValidateNewVideo(this)" class="form-control" required="" data-msg="Please Select a valid Module File"></td>
                          </tr>
                          <tbody id="mcqs">
                          <tr>
                            <th>Assessment MCQs</th>
                            <th></th>
                          </tr>
                          <tr id='row-1'>
                            <td class="question">Question 1</td>
                            <td><input type="text" name="questions[1][question]" class="form-control" required="" data-msg="Please enter a valid Question"></td>
                            <td>Choose Correct Answer</td>
                            <td><a href="#" onclick="removeRow('module',1)"><i class="fa fa-close" style="color: red;font-size:18px;"></i></a></td>
                          </tr>
                          <tr id='row-1'>
                            <td>Option 1:</td>
                            <td><input type="text" id="option1-1" name="questions[1][option1]" class="form-control" required></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" value="1" onchange="selectAnswer('option1-1',1)" type="radio"  name="questions[1][true]" class="radio-template" required>
                              
                            </div></td>
                            <td></td>
                          </tr>
                          <tr id='row-1'>
                            <td>Option 2:</td>
                            <td><input type="text" id="option2-1" name="questions[1][option2]" class="form-control" required></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" value="2" onchange="selectAnswer('option2-1',1)" type="radio"  name="questions[1][true]" class="radio-template" required>
                              
                            </div></td>
                            <td></td>
                          </tr>
                          <tr id='row-1'>
                            <td>Option 3:</td>
                            <td><input type="text" id="option3-1" name="questions[1][option3]" class="form-control" required></td>
                            <td>
                              <div class="i-checks">
                              <input id="radioCustom1" value="3" onchange="selectAnswer('option3-1',1)" type="radio"  name="questions[1][true]" class="radio-template" required>
                             
                            </div>
                            </td>
                            <td></td>
                          </tr>    
                           <tr id='row-1'>
                            <td>Option 4:</td>
                            <td><input type="text" id="option4-1" name="questions[1][option4]" class="form-control" required></td>
                            <td>
                              <div class="i-checks">
                              <input id="radioCustom1" value="4" onchange="selectAnswer('option4-1',1)" type="radio"  name="questions[1][true]" class="radio-template" required>
                             
                              <input type="hidden" value="" name="questions[1][answer]" id="answer-1">
                            </div>
                            </td>
                            <td></td>
                          </tr>

                        </tbody>

                      </table>
                      <p><input type="submit" class="btn btn-success btn-sm pull-right" value="Save" name="save"><button class="btn btn-success btn-sm " type="button" onclick="add_mcqs()">Add MCQ</button>
                      </p>
                    </form>
                    </div>
                    <!-- Module class end -->
                  </div>
                              
                            </div>
                            <div class="modal-footer">
                              <!-- <input type="submit" value="Submit" name="save" class="btn btn-primary"> -->
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <!-- Module modal end -->
      
            
                </div>
          
          </section>
       
                       <!--Edit MCQs Modal-->
                      <div id="assessmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Update MCQs Questions</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                             <form action="<?php echo SURL?>admin/edit_assessments" method="post">
                            <div class="modal-body" id="editModal_body">
                             
                                
                              
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Save Changes" name="save" class="btn btn-primary">
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- MCQs modal end -->
<script type="text/javascript">
// window.onbeforeunload = function() {
//     return confirm('Are you sure you want to Leave this page?');

// };
 function validateFileExtension(fld) {
      let input= document.getElementById('coverphoto');
      // console.log("FILE Size is ",input.files[0].size)
      let size= input.files[0].size;
        if(Number(size) > Number(1000000)){
        alert("Image size increase from the required limit!");
        fld.form.reset();
        fld.focus(); 
        return false;
      }
    if(!/(\.jpg|\.jpeg|\.png)$/i.test(fld.value)) {
        alert("Invalid image file type ! Please Select Valid Image Type");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }   
    return true; 
 } function validateFile(fld) {
      let input= document.getElementById('icon');
      // console.log("FILE Size is ",input.files[0].size)
      let size= input.files[0].size;
        if(Number(size) > Number(1000000)){
        alert("Image size increase from the required limit!");
        fld.form.reset();
        fld.focus(); 
        return false;
      }
    if(!/(\.jpg|\.jpeg|\.png)$/i.test(fld.value)) {
        alert("Invalid image file type ! Please Select Valid Image Type");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }   
    return true; 
 }
 function ValidateVideo(fld,id){
      let input= document.getElementById('videoFile_'+id);
      console.log("FILE Size is ",input.files[0].size)
      let size= input.files[0].size;
    if((Number(size) > Number(10000000))) {
        alert("File size increase from the limit!");      
        fld.form.reset();
        fld.focus();        
        return false;   
    } 
      if(!/(\.wma|\.mp4|\.pdf)$/i.test(fld.value)) {
        alert("Invalid Video/File type ! Please Select Valid Type");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }  
    return true;



 } 
 function ValidateNewVideo(fld){
      let input= document.getElementById('videoFile');
      // console.log("FILE Size is ",input.files[0].size)
      let size= input.files[0].size;
    if((Number(size) > Number(10000000))) {
        alert("File size increase from the limit!");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }   
      if(!/(\.wma|\.mp4|\.pdf)$/i.test(fld.value)) {
        alert("Invalid Video/File type ! Please Select Valid Type");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }
    return true;



 }
function checkModule(){
  var modules= $('#checkModule').val();
  if(modules>0){
 
    return true;
  }else{
    alert("Please Add one module in Course for further Process.");
    return false;
  }

}

function sendNotifications(){
  // alert("button clicked");
   <?php $users= getCourseAssignedUser($course_id);?>
    <?php foreach($users as $res){?>
    <?php $username= getUserNameByEmployeeID($res['user_id']);?> ;
    var token="<?php echo $username['fcm_token'];?>";
    console.log(token);
    notification(token);
  <?php }?>
  $("#published_form").submit();
}
  function notification(token){
                  // console.log(mesg+"<<<>>>>>>");
              let pushData = {
              "to": token,//token,
              "data": {
                "status": "",
               },
              "notification": {
                 "title": 'Mobile Learning Management System',
                  "body": "New Learning Course Assigned",
              }

        }
        // console.log("pay Load data is ",pushData);
           $.ajax({
            type : 'POST',
            url : "https://fcm.googleapis.com/fcm/send",
            headers : {
                Authorization : 'key=' + 'AAAAfdQFdQw:APA91bFBET_DH2er_aCrkUsZo-srGbsdJOUhW9fQ4bbN9GpL_sLAqNDa8wNj6-36gU3gus1g2g7zmbWxgo3YeTZ_jLhiqJlDJXszA6gec_j3MMc-hTT-SjZuu81650c9pxfTTWppV_vd'
            },
            contentType : 'application/json',
            data : JSON.stringify(pushData),
            success : function(response) {
                console.log(response);
            },
            error : function(xhr, status, error) {
                console.log(xhr.error);                   
            }
        }); 
}

  $('#users').multiselect({
    columns: 1,
    placeholder: 'Select Users',
    search: true,
    selectAll: true
});

    $('#departments').multiselect({
    columns: 1,
    placeholder: 'Select Departments',
    search: true,
    selectAll: true
});

    $('#zones').multiselect({
    columns: 1,
    placeholder: 'Select Zones',
    search: true,
    selectAll: true
});
</script>
<script type="text/javascript">


    function add_mcqs(){
       var i = $('#mcqs .question').length;
       var rows = "";
       i=i+1;
       rows += "<tr id='row-" + i + "'><td class='question'>Question " +i+ "</td><td><input type='text' class='form-control' name='questions["+i+"][question]' value='' required></td><td>Choose Correct Answer</td> <td><a href='#'' onclick=removeRow('module',"+i+")><i class='fa fa-close' style='color: red;font-size:18px;'></i></a></td></tr> <tr id='row-" + i + "'><td>Option 1:</td><td><input type='text' class='form-control' id='option1-"+i+"' name='questions["+i+"][option1]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option1-"+i+"',"+i+") type='radio' value='1'required  name='questions["+i+"][true]' class='radio-template'></div></td><td></td></tr><tr id='row-" + i + "'><td>Option 2:</td><td><input type='text' class='form-control' id='option2-"+i+"' name='questions["+i+"][option2]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option2-"+i+"',"+i+") type='radio' required value='2'  name='questions["+i+"][true]' class='radio-template'></div></td><td></td></tr><tr id='row-" + i + "'><td>Option 3:</td><td><input type='text' class='form-control' id='option3-"+i+"' name='questions["+i+"][option3]' value='' required></td><td><div class='i-checks'><input id='radioCustom1' value='3' onchange=selectAnswer('option3-"+i+"',"+i+") type='radio' required  name='questions["+i+"][true]' class='radio-template'></div></td><td></td></tr> <tr id='row-" + i + "'><td>Option 4:</td><td><input type='text' class='form-control' id='option4-"+i+"' name='questions["+i+"][option4]' value='' required></td><td><div class='i-checks'><input id='radioCustom1' value='4' onchange=selectAnswer('option4-"+i+"',"+i+") type='radio' required  name='questions["+i+"][true]' class='radio-template'></div></td><input type='hidden' value='' name='questions["+i+"][answer]' id='answer-"+i+"'> <td></td></tr>";
        $(rows).appendTo("#mcqs");
  }   
   function add_module_mcqs(id){
       var i = $('#modulemcqs_'+id+' .modulequestion').length;
       var rows = "";
       i=i+1;
       rows += "<tr id='row-" + i + "'><td class='modulequestion'>Question " +i+ "</td><td><input type='text' class='form-control' name='questions["+i+"][question]' value='' required></td><td>Choose Correct Answer</td> <td><a href='#'' onclick=removeRow('module_"+id+"',"+i+")><i class='fa fa-close' style='color: red;font-size:18px;'></i></a></td></tr> <tr id='row-" + i + "'><td>Option 1:</td><td><input type='text' class='form-control' id='option1-"+i+"' name='questions["+i+"][option1]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option1-"+i+"',"+i+") type='radio' value='1'  name='questions["+i+"][true]' required class='radio-template'></div></td><td></td></tr><tr id='row-" + i + "'><td>Option 2:</td><td><input type='text' class='form-control' id='option2-"+i+"' name='questions["+i+"][option2]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option2-"+i+"',"+i+") type='radio' value='2' required  name='questions["+i+"][true]' class='radio-template'></div></td><td></td></tr><tr id='row-" + i + "'><td>Option 3:</td><td><input type='text' class='form-control' id='option3-"+i+"' name='questions["+i+"][option3]' value='' required></td><td><div class='i-checks'><input id='radioCustom1' value='3' onchange=selectAnswer('option3-"+i+"',"+i+") type='radio'  name='questions["+i+"][true]' required class='radio-template'></div></td><td></td></tr> <tr id='row-" + i + "'><td>Option 4:</td><td><input type='text' class='form-control' id='option4-"+i+"' name='questions["+i+"][option4]' value='' required></td><td><div class='i-checks'><input id='radioCustom1' value='4' onchange=selectAnswer('option4-"+i+"',"+i+") type='radio' required  name='questions["+i+"][true]' class='radio-template'></div></td><input type='hidden' value='' name='questions["+i+"][answer]' id='answer-"+i+"'> <td></td></tr>";
        $(rows).appendTo("#modulemcqs_"+id+"");
  }

    function selectAnswer(id,count){

    var answer= $('#'+id).val();
    console.log(answer);
    // alert(answer);
    $('#answer-'+count).val(answer);
    console.log($('#answer-'+count).val());
  }    
  function editAnswer(id,count){

    var answer= $('#'+id).val();
    console.log(answer);
    // alert(answer);
    $('#answers-'+count).val(answer);
    console.log($('#answers-'+count).val());
  }


      function removeRow(table, row) {
//        alert('yesss');
    $('#' + table + ' ' + '#row-' + row).remove();
}

  function EditAssessments(id,course_id){

      $.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>admin/edit_assessments",

                data: {id:id,course_id:course_id},

                success: function(result){
           $("#editModal_body").html(result);
           
           }
                        

                }); 
}
</script>
<?php echo $footer;?>

