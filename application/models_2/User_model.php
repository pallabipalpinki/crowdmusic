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
				$result=$query->first_row();
				return $result;
			}
		}else{
			return 'Parameter not given';
		}		
	}

	public function get_users($param=null,$order_by='id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('users.*,users_role.role_name');
		$this->db->join('users_role','users_role.role_id=users.user_role','LEFT');
		// $this->db->join('slugs','slugs.slugs_type_id=users.id','LEFT');
		if($param!=null){
			$this->db->where($param);
		}
		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}

		$query=$this->db->get('users');

		if($return_query==FALSE){
			$result= $query->result();
			return $result;
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

	public function _get_users($param=null,$order_by='id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('users.*,users_role.role_name,slugs.*,slugs.*');
		$this->db->join('users_role','users_role.role_id=users.user_role','LEFT');
		$this->db->join('slugs','slugs.slug_type_id=users.id','LEFT');

		if(isset($param['user_status']) && $param['user_status']!=''){
			$this->db->where('status',$param['user_status']);
		}

		if(isset($param['user_role']) && $param['user_role']!=''){
			$this->db->where('user_role',$param['user_role']);
		}

		if(isset($param['slug_type']) && $param['slug_type']!=''){
			$this->db->where('slug_type',$param['slug_type']);
		}

		if(isset($param['specs']) && $param['specs']!=''){
			$this->db->where_in('user_specs',$param['specs'],FALSE);
		}

		if(isset($param['generes']) && $param['generes']!=''){
			$this->db->where('FIND_IN_SET('.$param['generes'].',user_geners)<>0');
		}

		if(isset($param['srch']) && $param['srch']!=''){
			//$this->db->where('MATCH(firstname,lastname) AGAINST("'.$param['srch'].'" IN NATURAL MODE)');

			$this->db->like('firstname',$param['srch']);			
			$this->db->or_like('lastname',$param['srch']);
		}

		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}

		$query=$this->db->get('users');

		if($return_query==FALSE){
			return $query->result();			
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}


	public function get__users($param=null,$order_by='id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('users.*,users_role.role_name,slugs.*,slugs.*');
		$this->db->join('users','users.id=users_specs.user_id','LEFT');
		$this->db->join('users_role','users_role.role_id=users.user_role','LEFT');
		$this->db->join('slugs','slugs.slug_type_id=users_specs.user_id','LEFT');

		if(isset($param['user_role']) && $param['user_role']!=''){
			$this->db->where('user_role',$param['user_role']);
		}

		if(isset($param['slug_type']) && $param['slug_type']!=''){
			$this->db->where('slug_type',$param['slug_type']);
		}

		if(isset($param['specs']) && $param['specs']!=''){
			$this->db->where('user_spec_id',$param['specs'],FALSE);
		}

		if(isset($param['generes']) && $param['generes']!=''){
			$this->db->where_in('user_geners',$param['generes'],FALSE);
		}

		if(isset($param['srch']) && $param['srch']!=''){
			//$this->db->where('MATCH(firstname,lastname) AGAINST("'.$param['srch'].'" IN NATURAL MODE)');

			$this->db->like('firstname',$param['srch']);			
			$this->db->or_like('lastname',$param['srch']);
		}

		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}

		$query=$this->db->get('users_specs');

		if($return_query==FALSE){
			return $query->result();			
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

	public function get_filtered_users($against_val,$param,$mode='BOOLEAN',$limit=null,$offset=null,$order_by='id',$order='ASC',$return_query=FALSE){

        $sql="SELECT * FROM `users` WHERE MATCH(firstname,lastname) AGAINST('".$against_val."' IN ".$mode." MODE) AND ".$param." ORDER BY ".$order_by." ".$order." LIMIT ".$offset.",".$limit;


        //echo $sql;die;

        $query = $this->db->query($sql);

        if($return_query==FALSE){
			$result = $query->result();
	    	return $result; 
        }else{
        	return $sql;
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


	public function get_user_role($param=null,$return_query=FALSE){	    
		

		if($param!=null){
			$this->db->where($param);
		}
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

public function get_contributor($param=null,$order_by='users.id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('users.*');
	
		if($param!=NULL){
			$this->db->where($param);
		}

		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}
		$result=$this->db->get('users');
		//print_r($this->db->last_query());die;
		

		if($return_query==FALSE){
			return $result->result();
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

	public function get_contributorsonglist($param=null,$order_by='content_data.content_id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('users.*,content_data.*');
		//$this->db->join('content_data','content_data,content_user_id=users.id','LEFT');
		$this->db->join('users','users,id=content_data.content_user_id','INNER');
		if($param!=NULL){
			$this->db->where($param);
		}

		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}
		$result=$this->db->get('content_data');
		//print_r($this->db->last_query());die;
		

		if($return_query==FALSE){
			return $result->result();
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}


	public function add_msg($data,$batch=FALSE,$return_query=FALSE){
		if(!empty($data)){
			if($return_query==FALSE){
				if($batch==FALSE){
					$this->db->insert('message_board',$data);
					return $this->db->insert_id();
				}else{
					return $this->db->insert_batch('message_board',$data);
				}	
			}else{
				return $this->db->set($data)->get_compiled_insert('message_board');
			}
		}else{
			return 'Data is empty';
		}				
	}

	public function get_messages($param=null,$param_or=null,$apply_first_or=FALSE,$order_by='msg_id',$order='ASC',$limit=null,$start=null,$return_query=FALSE){
		$this->db->select('message_board.*,u1.id as senderid,u2.id as recieverid,CONCAT(u1.firstname," ",u1.lastname) as sender_name,u1.profile_image as sender_img,u1.user_role as sender_role,CONCAT(u2.firstname," ",u2.lastname) as reciever_name,u2.profile_image as reciever_img,u2.user_role as reciever_role');
		$this->db->join('users u1','u1.id=message_board.sender_id','INNER');
		$this->db->join('users u2','u2.id=message_board.reciever_id','INNER');

		if($param!=NULL){
			if($apply_first_or==TRUE){
				$this->db->group_start();
				$this->db->or_where($param);
				$this->db->group_end();
			}else{
				$this->db->where($param);
			}
			
		}
		if($param_or!=NULL){
			$this->db->group_start();
			$this->db->or_where($param_or);
			$this->db->group_end();
		}

		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}

		$result=$this->db->get('message_board');

		if($return_query==FALSE){
			return $result->result();
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

	public function get_user_follower_data($param,$join=TRUE,$return_query=FALSE){
		if($param!=NULL){
			if($join==TRUE){
				$this->db->select('users_followers.*,users.firstname,users.lastname');
				$this->db->join('users','users,id=users_followers.follow_user_id','LEFT');
			}else if($join==FALSE){
				$this->db->select('users_followers.*');
			}
			
			$this->db->where($param);
			$query=$this->db->get('users_followers');
			if($return_query==TRUE){
				return $this->db->last_query();
			}else{
				$result=$query->first_row();
				return $result;
			}
		}else{
			return 'Parameter not given';
		}		
	}

	public function get_total_user_follower_data($param=null,$group_by=NULL,$return_query=FALSE){
		if($param!=null){
			$this->db->where($param);
		}

		if($group_by!=NULL){
			$this->db->group_by($group_by);
		}
		$num_rows = $this->db->count_all_results('users_followers');

		if($return_query==TRUE){
			return $this->db->last_query();
		}else{
			return $num_rows;
		}		
	}

	public function add_user_follower_data($data,$batch=FALSE,$return_query=FALSE){
		if(!empty($data)){
			if($return_query==FALSE){
				if($batch==FALSE){
					$this->db->insert('users_followers',$data);
					return $this->db->insert_id();
				}else{
					return $this->db->insert_batch('users_followers',$data);
				}	
			}else{
				return $this->db->set($data)->get_compiled_insert('users_followers');
			}
		}else{
			return 'Data is empty';
		}				
	}

	public function update_user_follower_data($data=array(),$param=array(),$batch=FALSE,$return_query=FALSE){
		if(!empty($data) && !empty($param)){
			if($return_query==FALSE){
				if($batch==FALSE){
					return $this->db->update('users_followers',$data,$param);
				}else{
					return $this->db->update_batch('users_followers',$data,$param);
				}
			}else{
				if($batch==FALSE){
					$this->db->update('users_followers',$data,$param);
				}else{
					$this->db->update_batch('users_followers',$data,$param);
				}
				return $this->db->last_query();
			}
		}else{
			return 'Data and param are empty';
		}			
	}

}