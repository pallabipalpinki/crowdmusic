<?php 
class User_panel_model extends CI_Model{
    
    public function profile($user_id)
    {
        
        $query = $this->db->query("SELECT users.*, users_role.role_name as user_rolename FROM users LEFT JOIN users_role ON users.user_role = users_role.role_id WHERE users.id = $user_id AND users.status = 1 ;");
        //print_r($this->db->last_query());die;
        $result = $query->row_array();
        return $result;          
    }
public function get_user_role(){
    $query = $this->db->query(" SELECT * FROM  `users_role` ");
    $result = $query->result_array();
    return $result;
}
public function user_add_db($usersdata)
    {
        $this->db->insert('users',$usersdata);
        return $this->db->insert_id();
    }

public function user_show_db($user_id){

        $query = $this->db->where('status', 1);
        $query = $this->db->where('id',$user_id);
        $query = $this->db->get('users');
        if($query->num_rows()>0){
            
            return $query->row();
        }
        else {
            return $query->row();
        }
        }   
public function user_edit_db($user_id,$usersdata)
        { 
            $this->db->where('id', $user_id);
            $query = $this->db->update('users', $usersdata);
            //print_r($this->db->last_query()); die;
            return true;
        }    
    
    // public function check_username($username)
    // {        
    //     $query = $this->db->query("SELECT * FROM `members` WHERE `username` = '$username';");
    //     $result = $query->num_rows();
    //     return $result;          
    // }
    // public function check_email($email)
    // {        
    //     $query = $this->db->query("SELECT * FROM `members` WHERE `email` = '$email';");
 
    //     $result = $query->num_rows();
    //     return $result;          
    // }
    // public function get_video_details($week,$user_id){
    //     $this->db->select('V.*,A.id as assign_id,A.user_id,A.video_id,A.week_number');
    //     $this->db->from('videos AS V');
    //     $this->db->join('assign_videos AS A', 'V.id = A.video_id', 'INNER');
    //     $this->db->where('A.user_id',$user_id);
    //     $this->db->where('A.week_number',$week);
    //     $query = $this->db->get();
    //     $result = $query->row_array();
    //     return $result;
       
    // }
    // public function get_step_details($week,$user_id){
    //     $query = $this->db->query("SELECT vs.*,(SELECT id FROM user_step_completed WHERE video_id = vs.video_id AND step_id = vs.id AND user_id = $user_id) as usc_id,
    //         CASE WHEN (SELECT is_completed FROM user_step_completed WHERE video_id = vs.video_id AND step_id = vs.id AND user_id = $user_id AND is_completed = 1) = 1 THEN 1
    //         WHEN (SELECT is_completed FROM user_step_completed WHERE video_id = vs.video_id AND step_id = vs.id AND user_id = $user_id AND is_completed = 0) = 0 THEN 0
    //         WHEN (SELECT is_completed FROM user_step_completed WHERE video_id = vs.video_id AND step_id = vs.id AND user_id = $user_id AND is_completed = 1) IS NULL THEN 0
    //         ELSE ''
    //         END as is_complete
    //         FROM video_steps vs INNER JOIN assign_videos av ON vs.video_id = av.video_id WHERE  av.user_id = $user_id AND av.week_number = $week");
    //     $result = $query->result_array();
    //     // print_r($this->db->last_query());die;
    //     return $result;
    // }
    // public function get_resource_details($week,$user_id){
    //     $this->db->select('*');
    //     $this->db->from('video_resources AS R');
    //     $this->db->join('assign_videos AS A', 'R.video_id = A.video_id', 'INNER');
    //     $this->db->where('A.user_id',$user_id);
    //     $this->db->where('A.week_number',$week);
    //     $query = $this->db->get();
    //     $result = $query->result_array();
    //     return $result;
    //     //echo "<pre>";print_r($result);die;
    // }
    // public function get_step_count($week,$user_id){
    //     $this->db->select('*');
    //     $this->db->from('video_steps AS S');
    //     $this->db->join('assign_videos AS A', 'S.video_id = A.video_id', 'INNER');
    //     $this->db->where('A.user_id',$user_id);
    //     $this->db->where('A.week_number',$week);
    //     $query = $this->db->get();
    //     $result = $query->num_rows();
    //     return $result;
    //     //echo "<pre>";print_r($result);die;
    // }
    // public function count_steps($user_id){
    //     $this->db->select('*');
    //     $this->db->from('assign_videos AS A');
    //     $this->db->join('video_steps AS S', 'S.video_id = A.video_id', 'INNER');
    //     $this->db->where('A.user_id',$user_id);
    //     $query = $this->db->get();
    //     $result = $query->num_rows();
    //     return $result;
    // }
    // public function count_completed_steps($user_id){
    //     $this->db->select('*');
    //     $this->db->from('user_step_completed C');
    //     $this->db->where('C.user_id',$user_id);
    //     $query = $this->db->get();
    //     $result = $query->num_rows();
    //     return $result;
    // }
    // public function get_assign_weeks($user_id){
    //     $qt='SELECT a.*,usc.id as uscid,(SELECT COUNT(id) FROM video_steps WHERE video_id = a.video_id) as steps,(SELECT COUNT(id) FROM user_step_completed WHERE video_id = a.video_id AND user_id = a.user_id AND is_completed = 1) as completed_step FROM `assign_videos` `a` LEFT JOIN user_step_completed usc ON usc.video_id = a.video_id AND usc.user_id = a.user_id WHERE `a`.`user_id` = '.$user_id.' GROUP BY a.week_number';
    //     //print_r($qt);die;
    //     $query=$this->db->query($qt);
    //     $result=$query->result_array();
    //     //echo '<pre>';print_r($result);die;
    //     return $result;
    // }
    // public function total_trainig_weeks($user_id){
    //      $qt='SELECT av.*,(SELECT COUNT(id) FROM video_steps WHERE video_id = av.video_id) as total_steps,(SELECT COUNT(id) FROM user_step_completed WHERE video_id = av.video_id AND user_id = av.user_id AND is_completed = 1) as completed_step,vv.is_viewed FROM assign_videos av LEFT JOIN video_steps vs ON av.video_id = vs.video_id LEFT JOIN user_step_completed usc ON usc.video_id = av.video_id AND usc.user_id = av.user_id LEFT JOIN video_viewed vv ON vv.video_id = av.video_id AND vv.user_id = av.user_id WHERE av.user_id = '.$user_id.' GROUP BY av.week_number';
    //     //print_r($qt);die;
    //     $query=$this->db->query($qt);
    //     $result=$query->result_array();
    //     //echo '<pre>';print_r($result);die;
    //     return $result;
    // }

    // public function get_step_by_week($week,$user_id){
    //     $query = $this->db->query("SELECT a.*,usc.id as uscid,(SELECT COUNT(id) FROM video_steps WHERE video_id = a.video_id) as total_steps,(SELECT COUNT(id) FROM user_step_completed WHERE video_id = a.video_id AND user_id = a.user_id AND is_completed = 1) as completed_step FROM `assign_videos` `a` LEFT JOIN user_step_completed usc ON usc.video_id = a.video_id AND usc.user_id = a.user_id WHERE `a`.`user_id` = $user_id AND a.week_number = $week GROUP BY a.week_number");
    //     $result = $query->row_array();
    //     // print_r($this->db->last_query());die;
    //     return $result;
    // }

    //  public function user_edit_db($id,$usersdata){ 
    //          $this->db->where('id', $id);
    //          //$this->db->where('password', $password);
    //         $query = $this->db->update('users', $usersdata);
    //         return $query;
    //         //print_r($this->db->last_query());die;
    //     }

    // public function get_user_step_details_by_id($id){
    //     $query = $this->db->query("SELECT * FROM user_step_completed WHERE id=$id");
    //     $result = $query->row_array();
    //     return $result;
    // }

    // public function get_check_video_viewed($video_id,$user_id)
    // {        
    //     $query = $this->db->query("SELECT * FROM `video_viewed` WHERE `user_id` = '$user_id' AND `video_id` = '$video_id';");
    //     $result = $query->num_rows();
    //     return $result;          
    // }
    
}
?>