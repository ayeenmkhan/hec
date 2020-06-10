
<?php
function getAllUsers(){
     $CI = get_instance();
     $query = $CI->db->query("SELECT * FROM (users) where username !='admin'");
            // var_dump($query->result_array());exit;
        return $query->result_array();
}function getUserByID($id){
     $CI = get_instance();
     $query = $CI->db->query("SELECT * FROM (users) where id='$id'");
            // var_dump($query->result_array());exit;
        return $query->row_array();
}