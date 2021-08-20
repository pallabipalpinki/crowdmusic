<?php 
class admin_panel_model extends CI_Model
{
    

    public function get_user()
    {        
    $query = $this->db->query("SELECT * FROM `users` WHERE `status` = 1 ;");
        $result = $query->result_array();
        return $result;                  
    }


public function get_audiance()
    {        
          $this->db->where('status', 1);
          $this->db->where('user_role',1);
          $this->db->order_by('id', 'ASC');
          $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;                  
    }
public function get_contributor()
    {        
         $this->db->where('status', 1);
         $this->db->where('user_role',2);
          $this->db->order_by('id', 'ASC');
          $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;                  
    }
public function get_mixer()
    {        
           $this->db->where('status', 1);
          $this->db->where('user_role',3);
          $this->db->order_by('id', 'ASC');
          $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;                  
    }
    public function get_producer()
    {        
           $this->db->where('status', 1);
          $this->db->where('user_role',4);
          $this->db->order_by('id', 'ASC');
          $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;                  
    }

public function get_audiance_count(){
    $query = $this->db->query(" SELECT * FROM  `users` WHERE `user_role` = 1 AND `status` = 1");
    $result = $query->num_rows();
    return $result;
    }
public function get_contributor_count(){
     $query = $this->db->query(" SELECT * FROM  `users` WHERE `user_role` = 2 AND `status` = 1");
    $result = $query->num_rows();
    return $result;
    }
public function get_mixer_count(){
         $query = $this->db->query(" SELECT * FROM  `users` WHERE `user_role` = 3 AND `status` = 1");
        $result = $query->num_rows();
        return $result;
          }

public function get_producer_count(){
         $query = $this->db->query(" SELECT * FROM  `users` WHERE `user_role` = 4 AND `status` = 1");
        $result = $query->num_rows();
        return $result;
          }
public function get_album_count(){
         $query = $this->db->query(" SELECT * FROM  `content_album`");
         $result = $query->num_rows();
        return $result;
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

public function user_edit_db($user_id,$usersdata)
        { 
            $this->db->where('id', $user_id);
            $query = $this->db->update('users', $usersdata);
            //print_r($query->last_query()); die;
        }

public function get_genres(){
    $query = $this->db->query(" SELECT * FROM `content_genere`");
   // print_r($query->last_query()); die;
    $result = $query->result_array();

    return $result;
}
public function insert_genres($array){
           $this->db->insert('content_genere', $array);
            $insert_id = $this->db->insert_id();
           //   print_r($this->db->last_query());die;
            return  $insert_id;
         }

public function genres_music_db($id){
            $query = $this->db->where('genere_id',$id);
            $query = $this->db->get('content_genere');
           
            if($query->num_rows()>0){
                return $query->row();
            }
            else {
                return $query->row();
            }
            }


public function update_genres_db($gid,$usersdata){ 
                $this->db->where('genere_id', $gid);
                $query = $this->db->update('content_genere', $usersdata);
             }


    
public function get_albums(){
        $this->db->select('a.*,u.firstname,u.lastname');
        $this->db->from('content_album AS a');
        $this->db->join('users AS u', 'u.id = a.album_user_id', 'INNER');
        $this->db->where('a.status', 1);
        $this->db->order_by('u. firstname', 'ASC'); 
        $query = $this->db->get();
        //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;
}
public function get_albums_dtl($album_id){
        $this->db->select('a.*,r.role_name as role_name,d.*,dg.genere_name');
        $this->db->from('content_album AS a');
        $this->db->join('users AS u', 'u.id = a.album_user_id', 'INNER');
        $this->db->join('users_role AS r', 'r.role_id = a.album_user_type', 'INNER');
        $this->db->join('content_data AS d', 'd.content_album_id = a.album_id', 'INNER');
        $this->db->join('content_genere AS dg', 'dg.genere_id = d.content_genere_id', 'LEFT');
        $this->db->where('a.status', 1);
        $this->db->where('a.album_id', $album_id);
        $this->db->order_by('a.album_name', 'ASC'); 
        $query = $this->db->get();
        //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;
}
public function get_content_data($mid){ 
    $query = $this->db->query(" SELECT * FROM  `content_data` WHERE `content_id` = $mid ");
    //print_r($this->db->last_query()); die;
    $result = $query->result_array();
    return $result;
}

public function get_only_tracks(){
        $this->db->select('r.role_name as role_name,d.*,dg.genere_name,u.*');
        $this->db->from('content_data AS d');
        $this->db->join('users AS u', 'u.id = d.content_user_id', 'INNER');
        $this->db->join('users_role AS r', 'r.role_id = d.content_user_type', 'INNER');
        $this->db->join('content_genere AS dg', 'dg.genere_id = d.content_genere_id', 'INNER');
        $this->db->where('d.status', 1);
        $this->db->order_by('d.content_track_name', 'ASC'); 
        $query = $this->db->get();
        //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;
    }

public function update_content_track($usersdata,$cid){ 
                $this->db->where('content_id', $cid);
                $query = $this->db->update('content_data', $usersdata);
                return $query;
             }


public function get_albums_detail($id){
            $query = $this->db->where('album_id',$id);
            $query = $this->db->get('content_album');
           
            if($query->num_rows()>0){
                return $query->row();
            }
            else {
                return $query->row();
            }
            }
public function get_content_detail($id){
      $query = $this->db->query(" SELECT * FROM  `content_data` WHERE `content_album_id` = $id");
      $result = $query->result_array();
      //print_r($result); die;
          return $result;
        }


public function update_album_track($usersdata,$cid){ 
                $this->db->where('album_id', $cid);
                $query = $this->db->update('content_album', $usersdata);
                return $query;
             }

   
    
}
?>