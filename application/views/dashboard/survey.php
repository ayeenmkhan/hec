<?php echo $header_script;?>
<?php echo $header;?>

<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-6">  
              <h2 class="no-margin-bottom">Welcome To Menabev Management System </h2>
            </div>
          
            </div>
            </div>
          </header>
  

<!-- Tabs -->
<section id="tabs" class="updates no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
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
      <div class="col-md-12 ">
                  <div class="daily-feeds card"> 
                  
                    <div class="card-header">
                     
                      <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Create Survey</button>
                     <!-- <h3>Registered Students</h3> -->
                    </div>

              <div class="card-body no-padding">
             
                <div class="table-responsive">
                    <table id="datatable2"  class="table">
                      <thead>
                        <tr>
                          <th>Sr#</th>
                          <th>Name En</th>
                          <th>Name Ar</th>
                          <th>Age</th>
                          <th>Phone Number</th>
                          <th>Coupon Number</th>
                          <th>School</th>
                          <th>Email ID</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php $count=1;foreach($students as $res){?>
                          <?php $school= getSchoolByID($res['school_id'])?>
                          <?php $student= getStudentByID($res['student_id'])?>
                        <tr>
                          <td><?php echo $count;?></td>
                          <td><?php echo $student['name_en'];?></td>
                          <td><?php echo $student['name_ar'];?></td>
                          <td><?php echo $student['age'];?></td>
                          <td><?php echo $student['phone_number'];?></td>
                          <td><?php echo $student['coupon_number'];?></td>
                          <td><?php echo $school['name_en'];?></td>
                          <td><?php echo $student['email_id'];?></td>
                          <td>
                            <p>
                             <!--  <a href="#" data-toggle="modal" data-target="#userModal" onclick="EditUser(<?php echo $res['id']?>)"><i class="fa fa-edit fa-2x"></i></a> -->
                              <a href="<?php echo SURL?>admin/delete_student/<?php echo $res['id'];?>" onclick="return confirm('Are you sure want to delete ?') "><i class="fa fa-trash fa-2x"></i></a>
                            </p>
                          </td>
                        </tr>
                        <?php $count++;}?>                                              

                      </tbody>
                    </table>
                  </div>
                      <!-- Item-->
                    </div>
            <!--USER Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Survey Informaiton</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                  <div class="card-body" id="course_module">
                      <!-- Module class start -->
                      <div class="module_class">
                      <form action="<?php echo SURL;?>admin/add_survey" class="form-validate" method="post" enctype="multipart/form-data">
                      <table class="table" id="module">
                        <tr>
                            <td>Survey Name:</td>
                            <td><input type="text" name="survey_name" class="form-control" required="" data-msg="Please enter a valid Module Name"></td>
                          </tr>
                          <tbody id="mcqs">
                          <tr>
                            <th colspan="4">Survey Questions</th>
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
                              <input id="radioCustom1" onchange="selectAnswer('option1-1',1)" type="radio"  name="questions[1][true]" class="radio-template" value="1">
                              <label for="radioCustom1">Option 1</label>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Option 2:</td>
                            <td><input type="text" id="option2-1" name="questions[1][option2]" class="form-control" required></td>
                            <td><div class="i-checks">
                              <input id="radioCustom1" onchange="selectAnswer('option2-1',1)" type="radio"  name="questions[1][true]" class="radio-template" value="2">
                              <label for="radioCustom1">Option 2</label>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Option 3:</td>
                            <td><input type="text" id="option3-1" name="questions[1][option3]" class="form-control" required></td>
                            <td>
                              <div class="i-checks">
                              <input id="radioCustom1" onchange="selectAnswer('option3-1',1)" type="radio"  name="questions[1][true]" class="radio-template" value="3">
                              <label for="radioCustom1">Option 3</label>
                              <input type="hidden" value="" name="questions[1][answer]" id="answer-1">
                            </div>
                            </td>
                          </tr>

                        </tbody>

                      </table>
                      <p><input type="submit" class="btn btn-success btn-sm pull-right" value="Save" name="save"><button class="btn btn-success btn-sm " type="button" onclick="add_mcqs()">Add More</button>
                      </p>
                    </form>
                    </div>
                    <!-- Module class end -->
                  </div>
                          </div>
                        </div>

                      </div>
                    

                      <!-- User modal end -->

                       <!--Edit USER Modal-->
                      <div id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Update School Detail</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                             <form action="<?php echo SURL?>admin/edit_school"  method="post" class="form-validate">
                            <div class="modal-body" id="editModal_body">
                             
                                
                              
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Save Changes" name="save" class="btn btn-primary">
                            </div>
                            </form>
                      
                          </div>
                        </div>
                      </div>

        </div>
      
      </div>
    </div>
  </div>
</section>
</div>
<!-- ./Tabs -->

<script type="text/javascript">

   function add_mcqs(){
       var i = $('#mcqs .question').length;
       var rows = "";
       i=i+1;
       rows += "<tr id='row-" + i + "'><td class='question'>Question " +i+ "</td><td><input type='text' class='form-control' name='questions["+i+"][question]' value='' required></td><td>Choose Correct Answer</td></tr> <tr id='row-" + i + "'><td>Option 1:</td><td><input type='text' class='form-control' id='option1-"+i+"' name='questions["+i+"][option1]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option1-"+i+"',"+i+") type='radio'  name='questions["+i+"][true]' class='radio-template'><label for='radioCustom1'>Option 1</label></div></td></tr><tr id='row-" + i + "'><td>Option 2:</td><td><input type='text' class='form-control' id='option2-"+i+"' name='questions["+i+"][option2]' value='' required ></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option2-"+i+"',"+i+") type='radio'  name='questions["+i+"][true]' class='radio-template'><label for='radioCustom1'>Option 2</label></div></td></tr><tr id='row-" + i + "'><td>Option 3:</td><td><input type='text' class='form-control' id='option3-"+i+"' name='questions["+i+"][option3]' value='' required></td><td><div class='i-checks'><input id='radioCustom1' onchange=selectAnswer('option3-"+i+"',"+i+") type='radio'  name='questions["+i+"][true]' class='radio-template'><label for='radioCustom1'>Option 3</label></div></td><input type='hidden' value='' name='questions["+i+"][answer]' id='answer-"+i+"'></tr>";
        $(rows).appendTo("#mcqs");
  }

    function selectAnswer(id,count){

    var answer= $('#'+id+'').val();
    // alert(answer);
    $('#answer-'+count).val(answer);
  }

        function removeRow(table, row) {
//        alert('yesss');
    $('#' + table + ' ' + '#row-' + row).remove();
}

  function EditUser(id){
      $.ajax({

                type: "POST",
                url: "<?php echo SURL; ?>admin/edit_school",
                data: {school_id:id},
                success: function(result){
                $("#editModal_body").html(result);
           
           }
                        

                }); 
} 
// function checkDuplicateUser(id){

// let employee_id= id;
//       $.ajax({
//                 type: "POST",
//                 url: "<?php echo SURL; ?>admin/checkDuplicateUser",
//                 data: {employee_id:employee_id},
//                 success: function(result){

//                 console.log("Response is ",result);
//                   // return false;
//                   if(result==1){
//                     $('#employee_id').val('');
//                     $('#error').html("<p id='err' style='color:red'>Employee Already Exist!</p>");
//                     return false;
//                   }
//                   else if(result==0)
//                   {
//                     $('#err').remove();
//                     console.log("Not found")
//                     return true;
//                   }
//            }             
// }); 
// }

</script>
<?php echo $footer;?>


