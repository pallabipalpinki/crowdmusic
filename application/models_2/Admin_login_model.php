<?php 
class admin_login_model extends CI_Model
{


public function admin_login($admin_email,$admin_password){
            $query = $this->db->where('email',$admin_email);
            $query = $this->db->where('password',$admin_password);
            $query = $this->db->get('admins');
            if($query->num_rows()==1){
                return $query->row();
            }else{
                return false;
            }
          }




    public function is_valid_login($username,$password)
   {

        $this->db->select('ADMINID,user_role');
        $this->db->from('administrators');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $result = $this->db->get()->row_array();
       
       /* $query = $this->db->query("SELECT ADMINID,user_role FROM `administrators` WHERE `username` = '".$username."' AND `password` = '".md5($password)."'; ");
	   $result = $query->row_array();*/

        return $result;        
            }    
    public function is_valid_password($id,$password){


        $this->db->select('ADMINID,user_role');
        $this->db->from('administrators');
        $this->db->where('ADMINID', $id);
        $this->db->where('password', md5($password));
        $result = $this->db->get()->row_array();
        
        /* $query = $this->db->query("SELECT ADMINID FROM `administrators` WHERE `ADMINID` = '".$id."' AND `password` = md5('".$password."'); ");
        $result = $query->num_rows(); */        
        
        return $result;        
            }        
     
            
}
?>