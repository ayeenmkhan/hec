<?php
class mod_admin extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }

public function like($data){
  extract($data);
  if (isset($_POST['liked'])) {
    $question_id = $_POST['question_id'];
    $result = $this->db->query("SELECT * FROM student_likes WHERE question_id='".$question_id."'");
    $row = $result->result_array();
    $n = count($row);
    $likeData=array(
        "user_id"=>$this->session->userdata('employee_id'),
        "question_id"=>$question_id,
        "is_like"=>1,
    );
    $this->db->dbprefix('student_likes');
    $ins_into_db = $this->db->insert('student_likes', $likeData);

 $updateData=array(
        "no_like"=>$n+1,
    );
    $this->db->dbprefix('students_questions');
    $this->db->where('id',$question_id);
    $ins_into_db = $this->db->update('students_questions', $updateData);

    return $n+1;
  }
}public function unlike(){

   if (isset($_POST['unliked'])) {
    $question_id = $_POST['question_id'];
    $result = $this->db->query("SELECT * FROM student_likes WHERE question_id='".$question_id."'");
    $row = $result->result_array();
    $user_id = $this->session->userdata('employee_id');
    $n = count($row);
        $this->db->query("DELETE FROM student_likes WHERE question_id='".$question_id."'and user_id='".$user_id."'");
 $updateData=array(
        "no_like"=>$n-1,
    );
    $this->db->dbprefix('students_questions');
    $this->db->where('id',$question_id);
    $ins_into_db = $this->db->update('students_questions', $updateData);

    return $n-1;
  }
}
public function import_employees(){
  
        if (!empty($_FILES['import_file']['name'])) {
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = '*';
            $config['file_name'] = "csv_import_" . $_FILES['import_file']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // var_dump($this->upload->initialize($config));exit;

            if (!$this->upload->do_upload('import_file')) {
                $error = $this->upload->display_errors();

                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
                $file_path = './uploads/users/' . $file;
                //var_dump($file_path);exit;
                if ($this->csvimport->get_array($file_path)) {
                    //var_dump($this->csvimport->get_array($file_path));
                    $csv_array = $this->csvimport->get_array($file_path);
//                var_dump($csv_array);exit;
                    $this->db->trans_start();
                    foreach ($csv_array as $row) {
                      $check= $this->db->query("SELECT * FROM (employees) where epi='".$row['Employee ID']."'");
                       $result= $check->row_array();
                          if(count($result)==0){   
                             $ins_data = array(
                               'epi' => $this->db->escape_str(trim($row['Employee ID'])),
                               'name' => $this->db->escape_str(trim($row['Name'])),
                               'zone' => $this->db->escape_str(trim($row['Zone'])),
                               'department' => $this->db->escape_str(trim($row['Department'])),
                               'phone_no' => $this->db->escape_str(trim($row['Phone no'])),
                               'email_id' => $this->db->escape_str(trim($row['Email ID'])),
                            );
                            //var_dump($insert_data);
                            $this->db->dbprefix('employees');
                            $ins_into_db = $this->db->insert('employees', $ins_data);
                            $user_id=$this->db->insert_id();

                            $user_data= array(
                               'employee_id' => $this->db->escape_str(trim($user_id)),
                               'username' => $this->db->escape_str(trim($row['Employee ID'])),
                               'password' => $this->db->escape_str(trim(md5(123456))),
                               'rainbow' => $this->db->escape_str(trim(123456)),
                               'user_type' => 4,
                            );
                            
                            $this->db->dbprefix('users');
                            $ins_into_db = $this->db->insert('users', $user_data);
                    }
                  }
                    $this->db->trans_complete();
                    if ($this->db->trans_status() === FALSE) {
                        # Something went wrong.
                        $this->db->trans_rollback();
                        return FALSE;
                    } else {

                        return true;

                    }

                }
            }

        } else {
            $file = '';
        }

}

public function edit_profile($data){
  extract($data);
  // var_dump($_FILES);exit;
        $this->db->trans_start();
            if (!empty($_FILES['picture']['name'])) {
            $config['upload_path'] = './uploads/profile_pic/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['picture']['name'];
            // var_dump($config['upload_path']);exit;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // var_dump($this->upload->initialize($config));exit;

            if (!$this->upload->do_upload('picture')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }
        }else{
            $file=$old_image;
        } 
          $ins_data = array(
       'epi' => $this->db->escape_str(trim($this->session->userdata('employee_id'))),
       'name' => $this->db->escape_str(trim($name)),
       'zone' => $this->db->escape_str(trim($zone)),
       'department' => $this->db->escape_str(trim($department)),
       'phone_no' => $this->db->escape_str(trim($phone_no)),
       'email_id' => $this->db->escape_str(trim($email_id)),
       'profile_picture' => $this->db->escape_str(trim(SURL."uploads/profile_pic/".$file)),
       'filename' => $this->db->escape_str(trim($file)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('employees');
                 $this->db->where('epi',$this->session->userdata('employee_id'));
                 $ins_into_db = $this->db->update('employees', $ins_data);

      if($password!=''){
        $newpassword=md5($password);
      }else{
        $newpassword=$old_password;
      }
      $dashboard_user = array(
       'username' => $this->db->escape_str(trim($username)),
       'password' => $this->db->escape_str(trim($newpassword)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('dashboard_users');
                 $this->db->where('id',$this->session->userdata('user_id'));
                 $ins_into_db = $this->db->update('dashboard_users', $dashboard_user);
                 
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{

                     return true;

                    }
}
    public function add_question($data){
        extract($data);
        $class= getUserNameByEmployeeID($this->session->userdata('employee_id'));
        // var_dump($skills);exit;
        $created_date= date('Y-m-d');
        $this->db->trans_start();
        $ins_data = array(
       'question' => $this->db->escape_str(trim($question)),
       'course_id' => $this->db->escape_str(trim($course_id)),
       'user_id' => $this->db->escape_str(trim($this->session->userdata('employee_id'))),
       'class' => $this->db->escape_str(trim($class['class'])),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('students_questions');
                 $ins_into_db = $this->db->insert('students_questions', $ins_data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return true;

                    }
    }    public function add_employee($data){
        extract($data);
        // var_dump($skills);exit;
        $created_date= date('Y-m-d');
        $this->db->trans_start();
        $ins_data = array(
       'epi' => $this->db->escape_str(trim($emp_id)),
       'name' => $this->db->escape_str(trim($name)),
       'user_type' => $this->db->escape_str(trim($users)),
       'class' => $this->db->escape_str(trim(@$class)),
       'phone_no' => $this->db->escape_str(trim($phone_no)),
       'email_id' => $this->db->escape_str(trim($email_id)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('employees');
                 $ins_into_db = $this->db->insert('employees', $ins_data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return true;

                    }
    }
        public function edit_employee($data){
        extract($data);
        // var_dump($skills);exit;
        $created_date= date('Y-m-d');
        $this->db->trans_start();
          $ins_data = array(
       'epi' => $this->db->escape_str(trim($emp_id)),
       'name' => $this->db->escape_str(trim($name)),
       'phone_no' => $this->db->escape_str(trim($phone_no)),
       'email_id' => $this->db->escape_str(trim($email_id)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('employees');
                 $this->db->where('id',$id);
                 $ins_into_db = $this->db->update('employees', $ins_data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{

                     return true;

                    }
    }

    public function delete_employee($id){
            $this->db->trans_start();
        $this->db->query("DELETE FROM employees WHERE id=".$id.";");
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }
}

        public function add_user($data){
        extract($data);
        // var_dump($skills);exit;
        $created_date= date('Y-m-d');
        $this->db->trans_start();
        $hash_password=md5($password);
        $ins_data = array(
       'employee_id' => $this->db->escape_str(trim($employee_id)),
       'username' => $this->db->escape_str(trim($username)),
       'password' => $this->db->escape_str(trim($hash_password)),
       'rainbow' => $this->db->escape_str(trim($password)),
       'user_type' => $this->db->escape_str(trim($user_type)),
    );
            // var_dump($ins_data);exit;
        $this->db->dbprefix('users');
        $ins_into_db = $this->db->insert('users', $ins_data);
        $emailID=getEmployeeByID($employee_id);
          $this->sendMail($password,$username,$emailID['email_id']);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return true;

                    }
    }

public function sendMail($password,$username,$email="")
{
// $config = Array(
//   'protocol' => 'smtp',
//   'smtp_host' => 'ssl://smtp.googlemail.com',
//   'smtp_port' => 465,
//   'smtp_user' => 'locumotiveforemail@gmail.com', // change it to yours
//   'smtp_pass' => 'AdminLocum', // change it to yours
//   'mailtype' => 'html',
//   'charset' => 'iso-8859-1',
//   'wordwrap' => TRUE
// );
$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'locumotiveforemail@gmail.com',
    'smtp_pass' => 'AdminLocum',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
// Set to, from, message, etc.

$result = $this->email->send();

      $message="Hi,<br>New Course Lecture had been added and assign to you please login to your account! to access your courses and assessments.<br>

                    Regargs<br>
                    <div class='background-color:#666;color:#fff;padding:6px;
                    text-align:center;'>
                    Team LMS.
                    </div>";
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('ayeenmk@gmail.com'); // change it to yours
      $this->email->to('ayeenmuhammad@gmail.com');// change it to yours
      $this->email->subject('New Course Assign');
      $this->email->message($message);
      if($this->email->send())
     {
      return array('status' => TRUE, 'errors' => array());
     }
     else
    {
     // show_error($this->email->print_debugger());
      $errors = $this->email->print_debugger();
           // echo "<pre>";
           // print_r($errors);
           // exit;
            return array('status' => FALSE, 'errors' => $errors);
    }

}
  public function edit_user($data){
        extract($data);
        // var_dump($skills);exit;
        $created_date= date('Y-m-d');
        $this->db->trans_start();

        $hash_password=md5($password);
        $ins_data = array(
       'employee_id' => $this->db->escape_str(trim($employee_id)),
       'username' => $this->db->escape_str(trim($username)),
       'password' => $this->db->escape_str(trim($hash_password)),
       'rainbow' => $this->db->escape_str(trim($password)),
       'user_type' => 4,
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('users');
                 $this->db->where('id',$id);
                 $ins_into_db = $this->db->update('users', $ins_data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return true;

                    }
    }

        public function delete_user($id){

        $this->db->trans_start();
        $this->db->query("DELETE FROM users WHERE id='$id';");
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }

    }


     public function add_new_course($data,$user_ids){
        extract($data);
          // var_dump($data);exit;
        // $userArray= array_unique($user_ids);
        $created_date= date('Y-m-d');
        $this->db->trans_start();
             $course_data = array(
            'name' => $this->db->escape_str(trim($course_name)),
            'description' => $this->db->escape_str(trim($description)),
            'status'=>0,
            'created_by'=>$this->session->userdata('employee_id')

        );
         // var_dump($user_ids);exit;
        $this->db->dbprefix('courses');
        $ins_into_db = $this->db->insert('courses', $course_data);
        $course_id = $this->db->insert_id();

        
        $classData = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'class' => $this->db->escape_str(trim($class)),
    );
        // var_dump($ins_data);exit;
        $this->db->dbprefix('course_class');
        $this->db->insert('course_class', $classData); 

        $reindexed_array = array_values($user_ids);
        if($reindexed_array!=''){
        $ins_data=[];
        for($i=0;$i<count($reindexed_array);$i++){

        $ins_data[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'user_id' => $this->db->escape_str(trim($reindexed_array[$i])),
    );
      }

             // var_dump($ins_data);exit;
                $this->db->dbprefix('course_users');
                $this->db->insert_batch('course_users', $ins_data); 
        }

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return $course_id;

                    }
    }  

public function submit_assessment($data){
extract($data);
$course_id= $data['info'][0]['course_id'];
       
        $status=array(
            "status"=>4
        );

        $this->db->dbprefix('courses');
        $this->db->where('id',$course_id);
        $this->db->update('courses',$status);
        
        $this->db->dbprefix('course_assesment_user_answers');
        $ins_into_db = $this->db->insert_batch('course_assesment_user_answers', $data['info']);
      if($ins_into_db){
        return true;
      }else{
        return false;
      }

}

public function delete_course($id){
        $this->db->trans_start();
           $courseName= getCourseInfoByID($id);
           $logsData= array(
          'user_id'=>$this->session->userdata('employee_id'),
          'log_title'=> "Course ".$courseName['name']." is Deleted"
        );
        $this->db->dbprefix('activity_logs');
        $this->db->insert('activity_logs', $logsData);
        
        $this->db->query("DELETE FROM courses WHERE id=".$id.";");
        $this->db->query("DELETE FROM course_users WHERE course_id=".$id.";");
        $this->db->query("DELETE FROM course_modules WHERE course_id=".$id.";");
        
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }
}
     public function update_published_course($data,$user_ids){
        extract($data);
         // var_dump($data);exit;
        // $userArray= array_unique($user_ids);
        $created_date= date('Y-m-d');
        $this->db->trans_start();

            if (!empty($_FILES['cover_photo']['name'])) {
            $config['upload_path'] = './uploads/course_content/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['cover_photo']['name'];
            // var_dump($config['upload_path']);exit;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // var_dump($this->upload->initialize($config));exit;

            if (!$this->upload->do_upload('cover_photo')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }
        }else{
            $file=$filename;
        }           
         if (!empty($_FILES['icon']['name'])) {
            $config['upload_path'] = './uploads/course_content/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['icon']['name'];
            // var_dump($config['upload_path']);exit;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // var_dump($this->upload->initialize($config));exit;

            if (!$this->upload->do_upload('icon')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $iconfile = $uploadData['file_name'];
            }
        }else{
            $iconfile=$filename;
        } 
        if($content_creater_id==''){
          $status=0;
        }else{
          $status=3;
        }
             $course_data = array(
            'name' => $this->db->escape_str(trim($course_name)),
            'description' => $this->db->escape_str(trim($description)),
            'tags' => implode(',',$tags),
            'cover_photo' => SURL . "uploads/course_content/".$file,
            'filename' => $file,
            'course_icon' => SURL . "uploads/course_content/".$iconfile,
            'icon_filename' => $iconfile,
            'content_creater_id' => $content_creater_id,
            'status'=>$status

        );
         // var_dump($user_ids);exit;
        $this->db->dbprefix('courses');
        $this->db->where('id',$course_id);
        $ins_into_db = $this->db->update('courses', $course_data);

        $this->db->query("DELETE FROM course_departments WHERE course_id='".$course_id."'");
        $this->db->query("DELETE FROM course_zones WHERE course_id='".$course_id."'");
        $departmentData=[];
        if(count(@$department_id)>0){
        for($i=0;$i<count($department_id);$i++){
        $departmentData[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'department_id' => $this->db->escape_str(trim($department_id[$i])),
    );
        }

        // var_dump($ins_data);exit;
                $this->db->dbprefix('course_departments');
                $this->db->insert_batch('course_departments', $departmentData);   
}
        
        if(count(@$zone_id)>0){
          $zoneData=[];
        for($i=0;$i<count($zone_id);$i++){
        $zoneData[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'zone_id' => $this->db->escape_str(trim($zone_id[$i])),
    );
        }
        $this->db->dbprefix('course_zones');
       $this->db->insert_batch('course_zones', $zoneData);  
      }


        $reindexed_array = array_values($user_ids);
        if(count($reindexed_array)>0){
        if($reindexed_array!=''){
        $ins_data=[];
        for($i=0;$i<count($reindexed_array);$i++){
          $query= $this->db->query("Select * FROM course_users where user_id='".$reindexed_array[$i]."' and course_id='".$course_id."'");
          $result= $query->result_array();
          if(count($result)>0){
              $this->db->query("DELETE FROM course_users WHERE user_id='".$reindexed_array[$i]."' and course_id='".$course_id."'");
          }
        $ins_data[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'user_id' => $this->db->escape_str(trim($reindexed_array[$i])),
    );
      }

             // var_dump($ins_data);exit;
                $this->db->dbprefix('course_users');
                $this->db->insert_batch('course_users', $ins_data); 
        }
      }
          $logsData= array(
          'user_id'=>$this->session->userdata('employee_id'),
          'log_title'=> "Content of Course ".$course_name." Updated"
        );
                $this->db->dbprefix('activity_logs');
                $this->db->insert('activity_logs', $logsData);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return true;

                    }
    }
     public function update_new_course($data,$user_ids){
        extract($data);
         // var_dump($data);exit;
        // $userArray= array_unique($user_ids);
        $created_date= date('Y-m-d');
        $this->db->trans_start();

            if (!empty($_FILES['cover_photo']['name'])) {
            $config['upload_path'] = './uploads/course_content/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['cover_photo']['name'];
            // var_dump($config['upload_path']);exit;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // var_dump($this->upload->initialize($config));exit;

            if (!$this->upload->do_upload('cover_photo')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }
        }else{
            $file=$filename;
        }         
           if (!empty($_FILES['icon']['name'])) {
            $config['upload_path'] = './uploads/course_content/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['icon']['name'];
            // var_dump($config['upload_path']);exit;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // var_dump($this->upload->initialize($config));exit;

            if (!$this->upload->do_upload('icon')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $ifile = $uploadData['file_name'];
            }
        }else{
            $ifile=$iconfile;
        } 

        if($content_creater_id==''){
          $status=0;
        }else{
          $status=1;
        }
             $course_data = array(
            'name' => $this->db->escape_str(trim($course_name)),
            'description' => $this->db->escape_str(trim($description)),
            'tags' => implode(',',$tags),
            'cover_photo' => SURL . "uploads/course_content/".$file,
            'filename' => $file,
            'icon_filename' => $ifile,
            'course_icon' => SURL . "uploads/course_content/".$ifile,
            'content_creater_id' => $content_creater_id,
            'status'=>$status

        );
         // var_dump($user_ids);exit;
        $this->db->dbprefix('courses');
        $this->db->where('id',$course_id);
        $ins_into_db = $this->db->update('courses', $course_data);

        $this->db->query("DELETE FROM course_departments WHERE course_id='".$course_id."'");
        $this->db->query("DELETE FROM course_zones WHERE course_id='".$course_id."'");
        $departmentData=[];
        if(count(@$department_id)>0){
        for($i=0;$i<count($department_id);$i++){
        $departmentData[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'department_id' => $this->db->escape_str(trim($department_id[$i])),
    );
        }

        // var_dump($ins_data);exit;
                $this->db->dbprefix('course_departments');
                $this->db->insert_batch('course_departments', $departmentData);   
}
        
        if(count(@$zone_id)>0){
          $zoneData=[];
        for($i=0;$i<count($zone_id);$i++){
        $zoneData[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'zone_id' => $this->db->escape_str(trim($zone_id[$i])),
    );
        }
        $this->db->dbprefix('course_zones');
       $this->db->insert_batch('course_zones', $zoneData);  
      }


        $reindexed_array = array_values($user_ids);
        if(count($reindexed_array)>0){
        if($reindexed_array!=''){
        $ins_data=[];
        for($i=0;$i<count($reindexed_array);$i++){
          $query= $this->db->query("Select * FROM course_users where user_id='".$reindexed_array[$i]."' and course_id='".$course_id."'");
          // var_dump($this->db->last_query());
          $result= $query->result_array();
          if(count($result)>0){
              $this->db->query("DELETE FROM course_users WHERE user_id='".$reindexed_array[$i]."' and course_id='".$course_id."'");
              // var_dump($this->db->last_query());
          }
        $ins_data[] = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'user_id' => $this->db->escape_str(trim($reindexed_array[$i])),
    );
      }

             // var_dump($ins_data);exit;
                $this->db->dbprefix('course_users');
                $this->db->insert_batch('course_users', $ins_data); 
        }
      }
        $logsData= array(
          'user_id'=>$this->session->userdata('employee_id'),
          'log_title'=> "Content of Course ".$course_name." Updated"
        );
                $this->db->dbprefix('activity_logs');
                $this->db->insert('activity_logs', $logsData);

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
    
                     return true;

                    }
    }

function publish_course($data){
extract($data);
  $update=array(
    'status'=>3,
  );

  $this->db->where('id',$course_id);
  $res=$this->db->update('courses',$update);
  $courseName= getCourseInfoByID($course_id);
    $logsData= array(
          'user_id'=>$this->session->userdata('employee_id'),
          'log_title'=> "Course ".$courseName['name']." Submitted for review"
        );
                $this->db->dbprefix('activity_logs');
                $this->db->insert('activity_logs', $logsData);
  if($res){
    return true;
  }else{
    return false;
  }

}function submit_for_review($data){
extract($data);
  $update=array(
    'status'=>2,
  );

  $this->db->where('id',$course_id);
  $res=$this->db->update('courses',$update);
    $courseName= getCourseInfoByID($course_id);
    $logsData= array(
          'user_id'=>$this->session->userdata('employee_id'),
          'log_title'=> "Course ".$courseName['name']." Submitted for review"
        );
                $this->db->dbprefix('activity_logs');
                $this->db->insert('activity_logs', $logsData);
  if($res){
    return true;
  }else{
    return false;
  }

}
    function add_course_module($data){
        extract($data);
        // var_dump($_FILES);exit;
            if (!empty($_FILES['course_file']['name'])) {
            $config['upload_path'] = './uploads/course_content/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['course_file']['name'];
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('course_file')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }
        }else{
            $file=@$filename;
        }
        $ins_data = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'title' => $this->db->escape_str(trim($module_name)),
       'description' => $this->db->escape_str(trim($description)),
       'course_file' => $this->db->escape_str(trim(SURL."uploads/course_content/".$file)),
       'file_name' => $this->db->escape_str(trim($file)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('course_modules');
                 $ins_into_db = $this->db->insert('course_modules', $ins_data);
                 $module_id = $this->db->insert_id();

                 // var_dump($questions);exit;
          $questionsData=[];
          for($i=0;$i<count($questions);$i++){
            $count=$i+1;

            $questionsData[$i]['course_id']=$course_id;
            $questionsData[$i]['module_id']=$module_id;
            $questionsData[$i]['question']=$questions[$count]['question'];
            $questionsData[$i]['choice_one']=$questions[$count]['option1'];
            $questionsData[$i]['choice_two']=$questions[$count]['option2'];
            $questionsData[$i]['choice_three']=$questions[$count]['option3'];
            $questionsData[$i]['choice_four']=$questions[$count]['option4'];
            $questionsData[$i]['answer']=$questions[$count]['answer'];
            $questionsData[$i]['selected_option']=$questions[$count]['true'];

          }
            if(!empty($questionsData)){
               // var_dump($questionsData);exit;

                  $inserted = $this->db->insert_batch('course_assesment_questions', $questionsData); 
                    if($inserted){

                      return true;
                    }else{

                      return false;
                    } 
               }


    }   
        public function delete_module($id){
            $this->db->trans_start();
        $this->db->query("DELETE FROM course_modules WHERE id=".$id.";");
        $this->db->query("DELETE FROM course_assesment_questions WHERE module_id=".$id.";");
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }
}
     function update_course_module($data){
           extract($data);
           // var_dump($data);exit;
            if (!empty($_FILES['course_file']['name'])) {
            $config['upload_path'] = './uploads/course_content/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['course_file']['name'];
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('course_file')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }
        }else{
            $file=@$filename;
        }
        $ins_data = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'title' => $this->db->escape_str(trim($module_name)),
       'description' => $this->db->escape_str(trim($description)),
       'course_file' => $this->db->escape_str(trim(SURL."uploads/course_content/".$file)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('course_modules');
                 $this->db->where('id',$module_id);
                 $ins_into_db = $this->db->update('course_modules', $ins_data);
                 // $module_id = $this->db->insert_id();

                  // var_dump($questions);exit;
          $questionsData=[];
          $newData=[];
          for($i=0;$i<count($questions);$i++){
            $count=$i+1;
            if(@$questions[$count]['number']==''){
            $newData[$i]['course_id']=$course_id;
            $newData[$i]['module_id']=$module_id;
            $newData[$i]['question']=$questions[$count]['question'];
            $newData[$i]['choice_one']=$questions[$count]['option1'];
            $newData[$i]['choice_two']=$questions[$count]['option2'];
            $newData[$i]['choice_three']=$questions[$count]['option3'];
            $newData[$i]['choice_four']=$questions[$count]['option4'];
            $newData[$i]['answer']=$questions[$count]['answer'];
            $newData[$i]['selected_option']=$questions[$count]['true'];
            }else{
            $questionsData[$i]['id']=$questions[$count]['number'];
            $questionsData[$i]['course_id']=$course_id;
            $questionsData[$i]['module_id']=$module_id;
            $questionsData[$i]['question']=$questions[$count]['question'];
            $questionsData[$i]['choice_one']=$questions[$count]['option1'];
            $questionsData[$i]['choice_two']=$questions[$count]['option2'];
            $questionsData[$i]['choice_three']=$questions[$count]['option3'];
            $questionsData[$i]['choice_four']=$questions[$count]['option4'];
            $questionsData[$i]['answer']=$questions[$count]['answer'];
            $questionsData[$i]['selected_option']=$questions[$count]['true'];
            }
            

          }
            if(!empty($newData)){
               $inserted= $this->db->insert_batch('course_assesment_questions', $newData);
               } 
               if(!empty($questionsData)){
                $inserted= $this->db->update_batch('course_assesment_questions', $questionsData,'id'); 
                
               }
                   if($inserted){
                      return true;
                    }else{
                      return false;
                    } 
    }
	function add_mcqs($data){
  extract($data);
        $ins_data = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'module_id' => $this->db->escape_str(trim($module_id)),
       'question' => $this->db->escape_str(trim($question)),
       'choice_one' => $this->db->escape_str(trim($choice_one)),
       'choice_two' => $this->db->escape_str(trim($choice_two)),
       'choice_three' => $this->db->escape_str(trim($choice_three)),
       'answer' => $this->db->escape_str(trim($answer)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('course_assesment_questions');
                 $ins_into_db = $this->db->insert('course_assesment_questions', $ins_data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
                return true;
                    }
  } function edit_assessments_mcqs($data){
  extract($data);
        $ins_data = array(
       'course_id' => $this->db->escape_str(trim($course_id)),
       'module_id' => $this->db->escape_str(trim($module_id)),
       'question' => $this->db->escape_str(trim($question)),
       'choice_one' => $this->db->escape_str(trim($choice_one)),
       'choice_two' => $this->db->escape_str(trim($choice_two)),
       'choice_three' => $this->db->escape_str(trim($choice_three)),
       'answer' => $this->db->escape_str(trim($answer)),
    );
            // var_dump($ins_data);exit;
                 $this->db->dbprefix('course_assesment_questions');
                 $this->db->where('id',$id);
                 $ins_into_db = $this->db->update('course_assesment_questions', $ins_data);

                 $update=array(
                  'status'=>2
                 );
                $this->db->dbprefix('courses');
                 $this->db->where('id',$course_id);
                 $ins_into_db = $this->db->update('courses',$ins_data);

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                 $this->db->trans_rollback();
                 return FALSE;
                } else{
                return true;
                    }
  }

  function delete_assessment_questions($id){

         $this->db->trans_start();
        $this->db->query("DELETE FROM course_assesment_questions WHERE id='$id';");
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }
  }  
  function delete_course_module($id){

         $this->db->trans_start();
        $this->db->query("DELETE FROM course_modules WHERE id='$id';");
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }
  }  function remove_course_assigned_users($id){

         $this->db->trans_start();
        $this->db->query("DELETE FROM course_users WHERE id='$id';");
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
           $this->db->trans_rollback();
            return FALSE;
       }else{
           return TRUE;
       }
  }
}
?>