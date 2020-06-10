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
                      <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Create Coupan Book</button>
                     
                    </div>

              <div class="card-body no-padding">
             
                <div class="table-responsive">
                    <table id="datatable2"  class="table">
                      <thead>
                        <tr>
                          <th>Sr#</th>
                          <th>Book Number</th>
                          <th>Owner Name En</th>
                          <th>Owner Name Ar</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php $count=1;foreach($coupons as $res){?>
                        <tr>
                          <td><?php echo $count;?></td>
                          <td><?php echo $res['book_number'];?></td>
                          <td><?php echo $res['owner_name_en'];?></td>
                          <td><?php echo $res['owner_name_ar'];?></td>
                          <td>
                            <p>
                              <a href="#" data-toggle="modal" data-target="#userModal" onclick="EditUser(<?php echo $res['id']?>)"><i class="fa fa-edit fa-2x"></i></a>
                              <a href="<?php echo SURL?>admin/delete_coupon/<?php echo $res['id'];?>" onclick="return confirm('Are you sure want to delete ?') "><i class="fa fa-trash fa-2x"></i></a>
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
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">New Coupon Book</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <form action="<?php echo SURL?>admin/add_new_book" method="post" class="form-validate">
                            <div class="modal-body">
                                <div class="form-group">       
                                  <label>Book Number</label>
                                  <input type="text" placeholder="Book Number" name="book_number" class="form-control" required="" data-msg="Please enter a valid">
                                </div>  
                                <div class="form-group">       
                                  <label>Enter First Serial Number</label>
                                  <input type="number" placeholder="001" name="first_number" class="form-control" required="" data-msg="Please enter a valid">
                                </div> 
                                  <div class="form-group">       
                                  <label>Enter Last Serial Number</label>
                                  <input type="number" placeholder="100" name="last_number" class="form-control" required="" data-msg="Please enter a valid">
                                  </div> 
                                <div class="form-group">       
                                  <label>Owner Name English</label>
                                  <input type="text" placeholder="Owner name English..." name="owner_name_en" class="form-control" required="" data-msg="Please enter a valid">
                                </div> 
                                <div class="form-group">       
                                  <label>Owner Name Arabic</label>
                                  <input type="text" placeholder="Owner name Arabic..." name="owner_name_ar" class="form-control" required="" data-msg="Please enter a valid">
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
                              <h4 id="exampleModalLabel" class="modal-title">Update Coupons Detail</h4>
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
                url: "<?php echo SURL; ?>admin/edit_coupon",
                data: {coupon_id:id},
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


