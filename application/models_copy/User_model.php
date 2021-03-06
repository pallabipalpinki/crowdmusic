<?php


/**
 * 
 */
class User_model extends CI_Model
{
	
	public function get_user($param,$join=TRUE,$return_query=FALSE){
		if($param!=NULL){
			if($join==TRUE){
				$this->db->select('users.*,users_role.role_name');
				$this->db->join('users_role','users_role,role_id=users.user_role','LEFT');
			}else if($join==FALSE){
				$this->db->select('users.*');
			}
			
			$this->db->where($param);
			$query=$this->db->get('users');
			if($return_query==TRUE){
				return $this->db->last_query();
			}else{
				return $query->first_row();
			}
		}else{
			return 'Parameter not given';
		}		
	}

	public function get_users($param=null,$order_by='id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('users.*,users_role.role_name');
		$this->db->join('users_role','users_role,role_id=users.user_role','LEFT');
		if($param!=NULL){
			$this->db->where($param);
		}

		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}

		$result=$this->db->get('users');

		if($return_query==FALSE){
			return $result->result();
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

	public function add_user($data,$batch=FALSE,$return_query=FALSE){
		if(!empty($data)){
			if($return_query==FALSE){
				if($batch==FALSE){
					$this->db->insert('users',$data);
					return $this->db->insert_id();
				}else{
					return $this->db->insert_batch('users',$data);
				}	
			}else{
				return $this->db->set($data)->get_compiled_insert('users');
			}
		}else{
			return 'Data is empty';
		}				
	}

	public function update_user($data=array(),$param=array(),$batch=FALSE,$return_query=FALSE){
		if(!empty($data) && !empty($param)){
			if($return_query==FALSE){
				if($batch==FALSE){
					return $this->db->update('users',$data,$param);
				}else{
					return $this->db->update_batch('users',$data,$param);
				}
			}else{
				if($batch==FALSE){
					$this->db->update('users',$data,$param);
				}else{
					$this->db->update_batch('users',$data,$param);
				}
				return $this->db->last_query();
			}
		}else{
			return 'Data and param are empty';
		}			
	}

	public function delete_user($param,$truncate=0,$return_query=FALSE){
		if($return_query==FALSE){
			if($truncate==0){
				return $this->db->delete('users',$param);
			}else if($truncate==1){
				return $this->db->empty_table('users');
			}else if($truncate==2){
				return $this->db->truncate('users');
			}
		}else{
			if($truncate==0){
				$this->db->delete('users',$param);
			}else if($truncate==1){
				$this->db->empty_table('users');
			}else if($truncate==2){
				$this->db->truncate('users');
			}
			return $this->db->last_query();
		}	
	}


	public function get_duplicate_user($param=array(),$param_or=array(),$group_in=FALSE,$field=null,$return_query=FALSE){
		if($field==null){
			$this->db->select('COUNT(*) AS counted');
		}else{
			$this->db->select($field.',COUNT('.$field.') AS counted');
		}
		if($param!=null){
			$this->db->where($param);
		}

		if($group_in==TRUE){
			$this->db->group_start();
		}

		if($param_or!=null){
			$this->db->or_where($param_or);
		}

		if($group_in==TRUE){
			$this->db->group_end();
		}
		
		if($field!=null){
			$this->db->group_by($field);
			$this->db->having('COUNT('.$field.')>1');
		}

		$query=$this->db->get('users');
		
		if($return_query==TRUE){
			return $this->db->last_query();
		}else{
			return $query->first_row();
		}
	}


	public function get_user_role($return_query=FALSE){	    
		$result=$this->db->get('users_role');

		if($return_query==FALSE){
			return $result->result();
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

public function get_genre_userbyid($id)
	{
		$this->db->select('d.content_genere_id,dg.genere_name');
        $this->db->from('content_data AS d');
        $this->db->join('content_genere AS dg', 'dg.genere_id = d.content_genere_id', 'INNER');
        $this->db->where('d.status', 1);
        $this->db->where('d.content_user_id',$id);
        $this->db->group_by('d.content_genere_id');
        $this->db->order_by('d.content_track_name', 'ASC'); 
        $query = $this->db->get();
        //print_r($this->db->last_query());die;
        $result = $query->result_array();
        return $result;
	}
public function user_add_like($usersdata)
    {
        $this->db->insert('content_thumbs',$usersdata);
        return $this->db->insert_id();
    }
public function user_update_like($thumbs_id,$usersdata)
    {	$this->db->where('thumbs_id', $thumbs_id);
        $this->db->update('content_thumbs',$usersdata);
        return $this->db->insert_id();
    }
	public function checklike($track_id,$user_id) {
        $condition = "thumbs_user_id =" . "'" . $user_id . "' AND " . "thumbs_track_id =" . "'" . $track_id . "'";
        $this->db->select('*');
        $this->db->from('content_thumbs');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }



}