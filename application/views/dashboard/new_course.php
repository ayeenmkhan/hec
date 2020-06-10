<?php echo $header_script;?>
<?php echo $header;?>
<div class="content-inner">
  
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
            
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                   <!-- ************ -->
            <section class=""> 
            <form action="<?php echo SURL;?>admin/add_new_course" method="post" id="formid" class="form-validate" enctype="multipart/form-data" >
            <div class="container-fluid">
            <div class="row">
                     <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Help Info</h3>
                    </div>
                    <div class="card-body">
                      <p>Please add all course related details in following panel. Add brief course description to define course discipline. Students can be selected class wise.<br>

Add all course content into following panel. Give Heading title and brief description of every module. Add assessment question afterwards save the module.
Publish the course in order to assign it to the selected class student.</p>
                    </div>
                  </div>
                </div>
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
                        <div class="form-group">
                          <label class="form-control-label">Course Name</label>
                          <input type="text" placeholder="Course Name" name="course_name" class="form-control" required="" data-msg="Please enter a valid Course Name">
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Description</label>
                          <textarea placeholder="Description" name="description" class="form-control" required="" data-msg="Please enter a Course Description"></textarea>
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
                           <div class="form-group" id="stud">
                                  <label>Class</label>
                                  <select class="form-control" name="class" required="" data-msg="Please Select">
                                    <option value="">Select Class</option>
                                    <option value="1">Class 1</option>
                                    <option value="2">Class 2</option>
                                    <option value="3">Class 3</option>
                                    <option value="4">Class 4</option>
                                    <option value="5">Class 5</option>
                                    <option value="6">Class 6</option>
                                    <option value="7">Class 7</option>
                                    <option value="8">Class 8</option>
                                    <option value="9">Class 9</option>
                                    <option value="10">Class 10</option>
                                    
                                  </select>
                                </div>
                    </div>
                  </div>
                </div>
               
              </div>
               <input type="submit" class="btn btn-success btn-sm pull-right" name="">
            </div>
          </form>
                </section>
              </div>
              
          <div class="tab-pane fade" id="course_modules" role="tabpanel" aria-labelledby="nav-module-tab">
                   <!-- ************ -->
                
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <div class="col-lg-6">
                      <h3 class="h4">Course Content</h3>
                    </div>
                    <div class="col-lg-6">
                      <!-- <button class="btn btn-success btn-sm pull-right" type="button" onclick="add_new_module()">Add Module</button> -->
                    </div>
                    </div>
  <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
   <div class="card-header d-flex align-items-center">
                      <div class="col-lg-6">
                      <h3 class="h4">Add Module</h3>
                    </div>
                    <div class="col-lg-6">
                      <!-- <button class="btn btn-success btn-sm pull-right" type="button" onclick="add_new_module()">Add Module</button> -->
                    </div>
                    </div>
                    <?php $courses = getAllCourses();?>
                    <div class="card-body" id="course_module">
                      <!-- Module class start -->
                      <div class="module_class">
                      <form action="<?php echo SURL;?>admin/add_course_module" class="form-validate" method="post" enctype="multipart/form-data">
                      <table class="table" id="module">
                        
                          <tr>
                            <td>Module Name:</td>
                            <td><input type="text" name="module_name" class="form-control" required="" data-msg="Please enter a valid Module Name"></td>
                          </tr>
                          <tr>
                            <td>Description:</td>
                            <td><textarea type="text" name="description" class="form-control" required="" data-msg="Please enter a valid Module Description"></textarea></td>
                          </tr>
                          <tr>
                            <td>File:</td>
                            <td><input type="file" name="course_file" class="form-control" required="" data-msg="Please Select a valid Module File"></td>
                          </tr>
                          <tbody id="mcqs">
                          <tr>
                            <th>Assessment MCQs</th>
                            <th></th>
                          </tr>
                          <tr>
                            <td class="question">Question 1</td>
                            <td><input type="text" name="questions[1][question]" class="form-control" required></td>
                            <td>Choose Correct Answer</td>
                          </tr>
                          <tr>
                            <td>Option 1:</td>
                            <td><input type="text" id="option1-1" name="questions[1][option1]" class="form-control" required></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" onchange="selectAnswer('option1-1',1)" type="radio"  name="true" class="radio-template">
                              <label for="radioCustom1">Option 1</label>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Option 2:</td>
                            <td><input type="text" id="option2-1" name="questions[1][option2]" class="form-control" required></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" onchange="selectAnswer('option2-1',1)" type="radio"  name="true" class="radio-template">
                              <label for="radioCustom1">Option 2</label>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Option 3:</td>
                            <td><input type="text" id="option3-1" name="questions[1][option3]" class="form-control" required></td>
                            <td>
                              <div class="i-checks">
                              <input id="radioCustom1" onchange="selectAnswer('option3-1',1)" type="radio"  name="true" class="radio-template">
                              <label for="radioCustom1">Option 3</label>
                              <input type="hidden" value="" name="questions[1][answer]" id="answer-1">
                            </div>
                            </td>
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
                  
                </div>
                </form>
</div>       

            
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
    if(!/(\.jpg|\.jpeg|\.png)$/i.test(fld.value) ) {
        alert("Invalid image file type ! Please Select Valid Image Type");      
        fld.form.reset();
        fld.focus();        
        return false;   
    }   
    return true; 
 }
  function validateFile(fld) {
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
  // $("input[type='file']").on("change", function () {
  //    if(this.files[0].size > 2000000) {
  //      alert("Please upload file less than 2MB. Thanks!!");
  //      $(this).val('');
  //    }
    //});

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
       rows += "<tr id='row-" + i + "'><td class='question'>Question " +i+ "</td><td><input type='text' class='form-control' name='questions["+i+"][question]' value='' required></td><td>Choose Correct Answer</td></tr> <tr id='row-" + i + "'><td>Option 1:</td><td><input type='text' class='form-control' id='option1-"+i+"' name='questions["+i+"][option1]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option1-"+i+"',"+i+") type='radio'  name='true"+i+"' class='radio-template'><label for='radioCustom1'>Option 1</label></div></td></tr><tr id='row-" + i + "'><td>Option 2:</td><td><input type='text' class='form-control' id='option2-"+i+"' name='questions["+i+"][option2]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option2-"+i+"',"+i+") type='radio'  name='true"+i+"' class='radio-template'><label for='radioCustom1'>Option 2</label></div></td></tr><tr id='row-" + i + "'><td>Option 3:</td><td><input type='text' class='form-control' id='option3-"+i+"' name='questions["+i+"][option3]' value='' required></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option3-"+i+"',"+i+") type='radio'  name='true"+i+"' class='radio-template'><label for='radioCustom1'>Option 3</label></div></td><input type='hidden' value='' name='questions["+i+"][answer]' id='answer-"+i+"'></tr>";
        $(rows).appendTo("#mcqs");
  }

    function selectAnswer(id,count){

    var answer= $('#'+id+'').val();
    // alert(answer);
    $('#answer-'+count).val(answer);
  }


  function add_new_module(){
   
       var i = $('#module tbody tr').length;
        var rows = "";
      var j=i+4;
       i=i+j;
       rows += "<div class='module_class'>"+
                "<form action='<?php echo SURL;?>admin/add_course_module' method='post' enctype='multipart/form-data'>"+
                 "<table class='table' id='module'>"+     
                          "<tr>"+
                            "<td>Module Name:</td>"+
                            "<td><input type='text' name='module_name' class='form-control'></td>"+
                          "</tr>"+
                          "<tr>"+
                            "<td>Description:</td>"+
                            "<td><textarea type='text' name='description' class='form-control'></textarea></td>"+
                          "</tr>"+
                          "<tr>"+
                            "<td>File:</td>"+
                            "<td><input type='file' name='course_file' class='form-control'></td>"+
                          "</tr>"+
                          "<tbody id='mcqs'>"+
                          "<tr>"+
                            "<th>Assessment MCQs</th>"+
                            "<th></th>"+
                          "</tr>"+
                          "<tr>"+
                            "<td class='question'>Question 1</td>"+
                            "<td><input type='text' name='questions[1][question]' class='form-control' required></td>"+
                            "<td>Choose Correct Answer</td>"+
                          "</tr>"+
                          "<tr>"+
                            "<td>Option 1:</td>"+
                            "<td><input type='text' id='option1-1' name='questions[1][option1]' class='form-control' required></td>"+
                            "<td><div class='i-checks'>"+
                            "<input id='radioCustom1' onchange='selectAnswer('option1-1',1)' type='radio'  name='true' class='radio-template'>"+
                              "<label for='radioCustom1'>Option 1</label>"+
                            "</div></td>"+
                          "</tr>"+
                          "<tr>"+
                            "<td>Option 2:</td>"+
                            "<td><input type='text' id='option2-1' name='questions[1][option2]' class='form-control' required></td>"+
                            "<td><div class='i-checks'>"+
                              "<input id='radioCustom1' onchange='selectAnswer('option2-1',1)' type='radio'  name='true' class='radio-template'>"+
                              "<label for='radioCustom1'>Option 2</label>"+
                            "</div></td>"+
                          "</tr>"+
                         " <tr>"+
                            "<td>Option 3:</td>"+
                          "<td><input type='text' id='option3-1' name='questions[1][option3]' class='form-control' required></td>"+
                            "<td><div class='i-checks'>"+
                              "<input id='radioCustom1' onchange='selectAnswer('option3-1',1)' type='radio'  name='true' class='radio-template'>"+
                              "<label for='radioCustom1'>Option 3</label>"+
                            "</div></td>"+
                          "</tr>"+

                        "</tbody>"+

                      "</table>"+
                      "<p><input type='submit' class='btn btn-success btn-sm pull-right' value='Save' name='save' style='margin: 1px'><button class='btn btn-success btn-sm pull-right' type='button' onclick='add_mcqs()'>Add MCQ</button>"+
                      "</p>"+
                    "</form>"+
                    "</div>";
        $(rows).appendTo("#course_module");
  }  

  function add_module(){
   
       var i = $('#module tbody tr').length;
        var rows = "";
      var j=i+4;
       i=i+j;
       rows += "<tr id='row-" + i + "'><td>" +i+ "</td><td><input type='text' class='form-control' name='module["+i+"][name]' value='Module "+i+"' readonly></td><td><textarea  class='form-control' name='module["+i+"][description]' value='' ></textarea></td><td><input type='file' class='form-control'name='filename[]' value='' required></td><td><button class='btn btn-danger btn-sm' onclick=removeRow('module'," + i + ")><i class='fa fa-trash'></button></td></tr>";
        $(rows).appendTo("#module tbody");
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

