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
                    	<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Create School</button>
                     
                    </div>

              <div class="card-body no-padding">
             
                <div class="table-responsive">
                    <table id="datatable2"  class="table">
                      <thead>
                        <tr>
                          <th>Sr#</th>
                          <th>Name En</th>
                          <th>Name Ar</th>
                          <th>Address En</th>
                          <th>Address Ar</th>
                          <th>Contact Name</th>
                          <th>Contact Number</th>
                          <th>Contact Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	
                      	<?php $count=1;foreach($schools as $res){?>
                        <tr>
                          <td><?php echo $count;?></td>
                          <td><?php echo $res['name_en'];?></td>
                          <td><?php echo $res['name_ar'];?></td>
                          <td><?php echo $res['address_en'];?></td>
                          <td><?php echo $res['address_ar'];?></td>
                          <td><?php echo $res['contact_person_name'];?></td>
                          <td><?php echo $res['contact_person_number'];?></td>
                          <td><?php echo $res['contact_person_email'];?></td>
                          <td>
                          	<p>
                          		<a href="#" data-toggle="modal" data-target="#userModal" onclick="EditUser(<?php echo $res['id']?>)"><i class="fa fa-edit fa-2x"></i></a>
                          		<a href="<?php echo SURL?>admin/delete_school/<?php echo $res['id'];?>" onclick="return confirm('Are you sure want to delete ?') "><i class="fa fa-trash fa-2x"></i></a>
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
                              <h4 id="exampleModalLabel" class="modal-title">School Informaiton</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                      <form action="<?php echo SURL?>admin/add_school" method="post" class="form-validate">
                            <div class="modal-body">
                                <div class="form-group">       
                                  <label>School name</label>
                                  <input type="text" placeholder="School Name..." name="name_en" class="form-control" required="" data-msg="Please enter a valid name">
                                </div>  
                                <div class="form-group">       
                                  <label>School Arabic name</label>
                                  <input type="text" placeholder="School Name..." name="name_ar" class="form-control" required="" data-msg="Please enter a valid name">
                                </div> 
                                <div class="form-group">       
                                  <label>Address</label>
                                  <textarea class="form-control" name="address_en" placeholder="Address..." required=""></textarea>
                                </div>
                                 <div class="form-group">       
                                  <label>Arabic Address</label>
                                  <textarea class="form-control" placeholder="Address..." name="address_ar" required=""></textarea>
                                </div>
                                  <div class="form-group">       
                                  <label>Contact Person name</label>
                                  <input type="text" placeholder="Person Name" name="poc" class="form-control" required="" data-msg="Please enter a valid name">
                                  </div> 
                                  <div class="form-group">       
                                  <label>Contact Person Number</label>
                                  <input type="text" placeholder="+960000000000" name="number" class="form-control" required="" data-msg="Please enter a valid name">
                                </div>  
                                <div class="form-group">       
                                  <label>Contact Person Email</label>
                                  <input type="email" placeholder="Email" name="email" class="form-control" required="" data-msg="Please enter a valid name">
                                </div>  
                                <div class="form-group">       
                                  <label>School Visits Date</label>
                                  <button class="btn btn-success btn-sm pull-right" type="button" onclick="add_dates()">Add Dates</button>
                                  <table id="school">
                                    <tbody id="VisitsDate">
                                    <tr id="row-1">
                                      <td class="dates"><lable>Date 1</lable></td>
                                      <td><input type="date" name="dates[]" class="form-control"></td>
                                    </tr>
                                  </tbody>
                                  </table>
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
                url: "<?php echo SURL; ?>admin/edit_school",
                data: {school_id:id},
                success: function(result){
                $("#editModal_body").html(result);
           
           }
                        

                }); 
} 


</script>
<?php echo $footer;?>


