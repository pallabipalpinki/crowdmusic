<?php


/**
 * 
 */
class Settings_model extends CI_Model
{
	
	public function get_settings($param)
    {
        $this->db->where($param);
        $query = $this->db->get('settings');
        $result = $query->first_row();
        return $result;                  
    }

    public function add_slug($data,$batch=FALSE,$return_query=FALSE){
        if(!empty($data)){
            if($return_query==FALSE){
                if($batch==FALSE){
                    $this->db->insert('slugs',$data);
                    return $this->db->insert_id();
                }else{
                    return $this->db->insert_batch('slugs',$data);
                }   
            }else{
                return $this->db->set($data)->get_compiled_insert('slugs');
            }
        }else{
            return 'Data is empty';
        }               
    }

    public function get_slug($param,$return_query=FALSE){
        if($param!=NULL){
            $this->db->where($param);
            $query=$this->db->get('slugs');
            if($return_query==TRUE){
                return $this->db->last_query();
            }else{
                return $query->first_row();
            }
        }else{
            return 'Parameter not given';
        }       
    }

    public function update_slug($data=array(),$param=array(),$batch=FALSE,$return_query=FALSE){
        if(!empty($data) && !empty($param)){
            if($return_query==FALSE){
                if($batch==FALSE){
                    return $this->db->update('slugs',$data,$param);
                }else{
                    return $this->db->update_batch('slugs',$data,$param);
                }
            }else{
                if($batch==FALSE){
                    $this->db->update('slugs',$data,$param);
                }else{
                    $this->db->update_batch('slugs',$data,$param);
                }
                return $this->db->last_query();
            }
        }else{
            return 'Data and param are empty';
        }           
    }
}