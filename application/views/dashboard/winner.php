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
               <form action="<?php echo SURL;?>admin/generate_list" method="post">
              <div class="row">
              <div class="col-md-4">
               <label>School</label>
                <select class="form-control" name="school_id" required="" onchange="getStudents(this.value)">
                <option value="">Select</option>
                <?php $school= getAllSchools();?>
                <?php foreach($school as $res){?>
                <option value="<?php echo $res['id']?>"><?php echo $res['name_en']?></option>
                <?php }?>
              </select>
            </div>
             <div class="col-md-4">
              <label>No Of Winner</label>
              <input type="number" name="no_of_winner" class="form-control">
             </div>
              <div class="col-md-4">
             <p>
              <br>
             <button type="submit" id="generate_btn" class="btn btn-primary btn-sm">Generate Winner List</button>
             <!-- <button type="button" class="btn btn-primary btn-sm">Verify</button> -->
           </p>
           </div>
         
            </div>
              </form>
            </div>

              <div class="card-body no-padding">
             
                <div class="table-responsive">
                    <table id="datatable222"  class="table">
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
                      <tbody id="students">
                        
                                                                

                      </tbody>
                    </table>
                  </div>
                      <!-- Item-->
                    </div>
            <!--USER Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">New Gift Item</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <form action="<?php echo SURL?>admin/add_gift" method="post" class="form-validate" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">       
                                  <label>Item Name English</label>
                                  <input type="text" placeholder="Item Name" name="name_en" class="form-control" required="" data-msg="Please enter a valid">
                                </div> 
                                <div class="form-group">       
                                  <label>Item Name Arabic</label>
                                  <input type="text" placeholder="Item Name" name="name_ar" class="form-control" required="" data-msg="Please enter a valid">
                                </div>  
                                <div class="form-group">       
                                  <label>Description English</label>
                                  <textarea class="form-control" name="description_en" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">       
                                  <label>Description Arabic</label>
                                  <textarea class="form-control" name="description_ar" placeholder="Description"></textarea>
                                </div> 
                                  <div class="form-group">       
                                  <label>Picture</label>
                                  <input type="file" name="item_pic" class="form-control">
                                  </div> 
                               
                              
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Submit" name="save" class="btn btn-primary">
                            </div>
                            </form>
                          </div>
                        </div>

                      </div>
                    

                      <!-- User modal end -->

                       <!--Edit USER Modal-->
                      <div id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Update Gift Detail</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                             <form action="<?php echo SURL?>admin/edit_gift"  method="post" class="form-validate">
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
 function add_dates(){
       var i = $('#VisitsDate .dates').length;
       var rows = "";
       i=i+1;
       rows += "<tr id='row-" + i + "'><td class='dates'>Date "+i+"</td><td><input type='date' class='form-control' name='dates[]'></td><td><a href='#'' onclick=removeRow('school',"+i+")><i class='fa fa-close' style='color: red;font-size:18px;'></i></a></td></tr>";
        $(rows).appendTo("#VisitsDate");
  }
      function removeRow(table, row) {
       // alert(table);
    $('#' + table + ' ' + '#row-' + row).remove();
}

  function EditUser(id){
      $.ajax({

                type: "POST",
                url: "<?php echo SURL; ?>admin/edit_gift",
                data: {gift_id:id},
                success: function(result){
                $("#editModal_body").html(result);
           
           }
                        

                }); 
} 
function getStudents(id){

      $.ajax({
                type: "POST",
                url: "<?php echo SURL; ?>admin/get_student_by_school",
                data: {school_id:id},
                success: function(result){
                  checkStatus(id);
                $("#students").html(result);
           }             
}); 
}
function checkStatus(id){

      $.ajax({
                type: "POST",
                url: "<?php echo SURL; ?>admin/checkStatus",
                data: {school_id:id},
                success: function(result){

                if(result==1){
                  $('#generate_btn').show();
                }else{
                  $('#generate_btn').hide();
                }
           }             
}); 
}

</script>
<?php echo $footer;?>


