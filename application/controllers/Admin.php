<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends CI_Controller {



	function __construct(){

		// Call the Model constructor

		parent::__construct();

		

		$this->load->library('session');
		// $this->load->helper('cookie');
		$this->load->library('csvimport');

		$this->load->model('mod_users');

		$this->load->model('mod_admin');
		$this->load->model('mod_menabev');

		$this->load->helper('common');


	}

	public function dashboard_users(){
		// echo "string";exit;
if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 };

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);

		$data['header'] = $this->load->view('common/header', '', TRUE);

	$data['footer'] = $this->load->view('common/footer', '', TRUE);
	$data['zones']= getAllZones();
	$data['departments']=getAllDepartments();
	$data['content_creaters']=getAllContentCreaters();
	$data['employees']=getAllEmployees();
	$data['dashboard_users']=getAllDashboardUsers();
		$this->load->view('dashboard/dashboard_users',$data);
	
}

public function index(){
	if(@$this->session->userdata('user_id')!= ''){
	 		redirect(SURL."admin/home");
		 }
if(@$this->session->userdata('counter')){
    // var_dump("expression");exit;
	$this->session->set_userdata("attempt",$this->session->userdata('counter'));
}else{
	
	$this->session->set_userdata("attempt",0);
}
		// var_dump($this->session->all_userdata());
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		// $data['counter'] = $this->session->userdata('counter');
		$this->load->view('login/login',$data);

	}

	public function login_process(){
		if($this->input->post('g-recaptcha-response')){
			// var_dump("expression");exit;
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $userIp=$this->input->ip_address();
     	// var_dump($userIp);
     	// var_dump($recaptchaResponse);
        $secret = "6Ldp4mcUAAAAAMy31I45H1vNB2KAp3TFZBk-k6ne";
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 		try {
    $ch = curl_init();

    // Check if initialization had gone wrong*    
    if ($ch === false) {
        throw new Exception('failed to initialize');
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    // curl_setopt(/* ... */);

    $content = curl_exec($ch);

    // Check the return value of curl_exec(), too
    if ($content === false) {
        throw new Exception(curl_error($ch), curl_errno($ch));
    }

    /* Process $content here */

    // Close curl handle
    curl_close($ch);
    $status= json_decode($content, true);
    // var_dump($content);exit;
         if ($status['success']) {
            // print_r('Google Recaptcha Successful');
            // exit;
        $res=$this->mod_users->userCheck();
        if($res){
			redirect(SURL."admin/home");
		}else{
		 	$attempt= $this->input->post('counter')+1;
			$this->session->set_userdata('counter',$attempt);
			$this->session->set_flashdata('err_message', '- Username / Password Invalide, please try again.');
		 	redirect(base_url().'admin/index');

		}
        }else{
        	// var_dump("expression");exit;
            $this->session->set_flashdata('err_message', 'Sorry Google Recaptcha Verification Falied Try Again!!');
            redirect(base_url().'admin/index');
        }
} catch(Exception $e) {

    trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),E_USER_ERROR);

}
       
	}
		$res=$this->mod_users->userCheck();
           if($res){
			redirect(SURL."admin/home");
			}else{
		 	$attempt= $this->input->post('counter')+1;
			$this->session->set_flashdata('counter',$attempt);
			$this->session->set_flashdata('err_message', '- Username / Password Invalide, please try again.');
		 	redirect(base_url().'admin/index/');

		}
		
			// var_dump($res);exit();
	

	}

	public function edit_profile(){
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 };
		 if($this->input->post()){

		 	$res=$this->mod_admin->edit_profile($this->input->post());
		 	if($res){
			$this->session->set_flashdata('ok_message', '-  Profile Updated Successfully!');
			redirect(base_url().'admin/home');
			}else{

			$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
			redirect(base_url().'admin/home');
			}
		 }
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$this->load->view('login/login',$data);
	}
	public function home(){
		// echo "string";exit;
if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 };

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);
	   $data['users']=getAllUsers();
	   // $data['schools']=getAllSchools();
		$this->load->view('dashboard/patients',$data);	

}		public function sender(){
		// echo "string";exit;
if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 };

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);
	   $data['users']=getAllUsers();
	   // $data['schools']=getAllSchools();
		$this->load->view('dashboard/sender',$data);	

}		public function receiver(){
		// echo "string";exit;
if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 };

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);
	   $data['users']=getAllUsers();
	   // $data['schools']=getAllSchools();
		$this->load->view('dashboard/receiver',$data);	

}	




public function logout_user(){
		$this->session->sess_destroy();
		redirect(SURL."admin");
}

public function checkDuplicateUser(){

if($this->input->post()){
	// var_dump($this->input->post('employee_id'));exit;
	$check=getUserNameByEmployeeID($this->input->post('employee_id'));
	if(count($check)>0){
				echo "1";	
			}else{
				echo "0";
			}

		 	
		 }

	}
	
function add_user(){
$res= $this->mod_menabev->add_user($this->input->post());

	if($res){
		
		$this->session->set_flashdata('ok_message', '- User Created successfully.');
        redirect(base_url().'admin/home?h=active');
		}
		else
		{
			$this->session->set_flashdata('err_message', '- Not Created. Something went wrong, please try again.');
			redirect(base_url().'admin/home?h=active');

				

		}
}
function edit_user(){
if($this->input->post('save')){

// var_dump($_POST);exit;
		$res=$this->mod_menabev->edit_user($this->input->post());

		if($res){
				$this->session->set_flashdata('ok_message', '- User  Updated successfully.');

				redirect(base_url().'admin/home?h=active');		

		}else{

				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');

					redirect(base_url().'admin/home?h=active');
		}
	}

$view=getUserByID($this->input->post('user_id'));
// $dates=getCouponsCodesByID($this->input->post('coupon_id'))
?>	
 <input type="hidden" value="<?php echo $this->input->post('user_id');?>" name="id">
   								<div class="form-group">       
                                  <label>Name</label>
                                  <input type="text" placeholder="Name..." value="<?php echo $view['name']?>" name="name" class="form-control" required="" data-msg="Please enter a valid name">
                                </div> 
                                <div class="form-group">       
                                  <label>Phone Number</label>
                                  <input type="text" placeholder="Phone..." value="<?php echo $view['phone_no']?>" name="phone_no" class="form-control" required="" data-msg="Please enter a valid name">
                                </div> 
                                <div class="form-group">       
                                  <label>Email ID</label>
                                  <input type="text" placeholder="Email" value="<?php echo $view['email']?>" name="email" class="form-control" required="" data-msg="Please enter a valid name">
                                </div>  
                                <div class="form-group">       
                                  <label>Address</label>
                                  <input type="text" placeholder="Address" value="<?php echo $view['address']?>" name="address" class="form-control" required="" data-msg="Please enter a valid name">
                                </div>     
                                <div class="form-group"> 
                                <input type="hidden" value="<?php echo $view['image_name']?>" name="old_image">      
                                  <label>Picture</label>
                                  <input type="file" placeholder="Address" name="image" class="form-control" required="" data-msg="Please enter a valid name">
                                </div> 
                                  <div class="form-group">       
                                  <label>Username</label>
                                  <input type="text" placeholder="Username" value="<?php echo $view['username']?>" name="username" class="form-control" required="" data-msg="Please enter a valid name">
                                  </div> 
                                  <div class="form-group">       
                                  <label>Password</label>
                                  <input type="password" placeholder="*************" name="password" class="form-control" required="" data-msg="Please enter a valid name">
                                </div> 
                                 
                              

<?php
}

	public function delete_user($id){
if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }


		$res=$this->mod_menabev->delete_user($id);

					if($res){

				

				$this->session->set_flashdata('ok_message', '- User Deleted successfully.');

				redirect(base_url().'admin/home?h=active');

				

		}else{

				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');

					redirect(base_url().'admin/home?h=active');

				

		}



	}



}