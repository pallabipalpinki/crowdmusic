<?php 
class Contents_model extends CI_Model
{
	public function get_genere(){
	    $query = $this->db->query(" SELECT * FROM  `content_genere` WHERE genere_status='1' ORDER BY genere_id");
	    $result = $query->result();
	    return $result;
	}

	public function _get_genere($param){
	    $this->db->where($param);
        $query = $this->db->get('content_genere');
        $result = $query->first_row();
        return $result; 
	}

	public function get_content($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_data');
        $result = $query->first_row();
        return $result;                  
    }



    public function get_concat_genere($generes){
		$query = $this->db->query("SELECT GROUP_CONCAT(DISTINCT genere_name) as genere_name FROM `content_genere` WHERE genere_id IN(".$generes.")");
	    $result = $query->first_row();
	    return $result;	
	}

    public function get_contents($param,$order_by=NULL,$order='DESC',$limit=10,$start=0)
    {
        $this->db->where($param);

        if($order_by!=NULL){
        	$this->db->order_by($order_by,$order);
        }

        $this->db->limit($limit,$start);

        $query = $this->db->get('content_data');
        $result = $query->result();
        return $result;                  
    }
    public function get_artist($single_row=FALSE,$limit=0,$start=0)
    {
        $this->db->select('d.*,u.firstname,u.lastname,u.profile_image,u.user_specs');
        //$this->db->from('content_data AS d');
        $this->db->join('users AS u', 'u.id = d.content_user_id', 'LEFT');
        $this->db->where('d.status', 1);
        $this->db->where('u.user_role', 2);
        $this->db->order_by('d.created_at', 'desc'); 
     	$this->db->group_by('d.content_user_id');
        if($limit!=0){
        $this->db->limit($limit,$start); 
            }
        $query = $this->db->get('content_data AS d');
       	//print_r($this->db->last_query()); die;

        if($single_row==FALSE){
        	$result = $query->result();
        	return $result;
        }else if($single_row==TRUE){
        	$result = $query->first_row();
        	return $result;
        } 	                  
    }

public function get_speciality($spec){
		$this->db->select('spec_name');
	    $this->db->where('spec_id', $spec);
	    $this->db->where('spec_status', 1);
        $query = $this->db->get('content_speciality');
        //print_r($this->db->last_query()); die;
        $result = $query->first_row();
        return $result;    

}


    public function get_artist_music($id)
    {
        $this->db->select('d.*,u.*,ur.role_name');
        $this->db->from('users AS u');
        $this->db->join('content_data AS d', 'd.content_user_id=u.id', 'LEFT');
        // $this->db->join('content_album AS a', 'a.album_user_id = u.id', 'LEFT');
        $this->db->join('users_role AS ur', 'ur.role_id = u.user_role', 'LEFT');
        $this->db->where('u.status', 1);
        $this->db->where('d.status', 1);
        $this->db->where('u.id', $id);
        $this->db->order_by('d.created_at', 'desc'); 
     	$query = $this->db->get();
        //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;                  
    }

    public function get_total_tracks($param=null,$group_by=NULL,$return_query=FALSE){
		if($param!=null){
			$this->db->where($param);
		}

		if($group_by!=NULL){
			$this->db->group_by($group_by);
		}
		$num_rows = $this->db->count_all_results('content_data');

		if($return_query==TRUE){
			return $this->db->last_query();
		}else{
			return $num_rows;
		}		
	}

	 public function get_total_albums($param=null,$group_by=NULL,$return_query=FALSE){
		if($param!=null){
			$this->db->where($param);
		}

		if($group_by!=NULL){
			$this->db->group_by($group_by);
		}
		$num_rows = $this->db->count_all_results('content_album');

		if($return_query==TRUE){
			return $this->db->last_query();
		}else{
			return $num_rows;
		}		
	}

public function get_album_music($id)
    {
        $this->db->select('a.*,u.id');
        $this->db->from('users AS u');
      	$this->db->join('content_album AS a', 'a.album_user_id = u.id', 'LEFT');
        $this->db->join('users_role AS ur', 'ur.role_id = u.user_role', 'LEFT');
        $this->db->where('u.status', 1);
        $this->db->where('a.status', 1);
        $this->db->where('u.id', $id);
        $this->db->order_by('a.created_at', 'desc'); 
     	$query = $this->db->get();
       //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;                  
    }

public function get_album_music_track($artist_id,$album_id)
    {
        $this->db->select('d.*,u.*,ur.role_name');
        $this->db->from('users AS u');
        $this->db->join('content_data AS d', 'd.content_user_id=u.id', 'LEFT');
        $this->db->join('users_role AS ur', 'ur.role_id = u.user_role', 'LEFT');
        $this->db->where('u.status', 1);
        $this->db->where('d.status', 1);
        $this->db->where('u.id', $artist_id);
        $this->db->where('d.content_album_id', $album_id);
        $this->db->order_by('d.created_at', 'desc'); 
     	$query = $this->db->get();
       //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;                   
    }


public function get_album_track($aid,$uid)
    {
       
        $this->db->where('status', 1);
        $this->db->where('content_user_id ', $uid);
        $this->db->where('content_album_id', $aid);
        $this->db->order_by('created_at', 'desc'); 
     	$query = $this->db->get('content_data');
       //print_r($this->db->last_query()); die;
       $result = $query->result_array();
        return $result;                  
    }



    

    public function get_album($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_album');
        $result = $query->first_row();
        return $result;                  
    }

    public function update_album_data($data,$param)
    {
        $this->db->where($param);
        $query = $this->db->update('content_album', $data);

        return $query;
    }

    public function add_content_data($content_data)
    {
        $this->db->insert('content_data',$content_data);
        return $this->db->insert_id();
    }

    public function delete_content_data($param){
    	return $this->db->delete('content_data',$param);
    }

    public function update_content_data($data,$param)
    {
        $this->db->where($param);
        $query = $this->db->update('content_data', $data);

        return $query;
    }

    public function add_content_album($content_album)
    {
        $this->db->insert('content_album',$content_album);
        return $this->db->insert_id();
    }

    public function update_content_album($data,$param)
    {
        $this->db->where($param);
        $query = $this->db->update('content_album', $data);

        return $query;
    }

    public function delete_content_album($param){
    	return $this->db->delete('content_album',$param);
    }


    public function _get_contents_tracks($post=array(),$param=array(),$count=FALSE,$return_query=FALSE){
		$this->db->select('content_data.*,users.firstname,users.lastname');
		$this->db->join('users','users.id=content_data.content_user_id','LEFT');

		$i = 0;
		// if(isset($param) && $param!=NULL){
		// 	$this->db->where($param);
		// }

		if(isset($param['status'])){
			$this->db->where('content_data.status',$param['status']);
		}

		if(isset($param['content_user_id'])){
			$this->db->where('content_data.content_user_id',$param['content_user_id']);
		}

		if(isset($param['column_search'])){
			foreach ($param['column_search'] as $item)
			{
				if(isset($post['search']['value']) && $post['search']['value'])
				{
					
					if($i===0)
					{
						$this->db->group_start();
						$this->db->like($item, $post['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $post['search']['value']);
					}

					if(count($param['column_search']) - 1 == $i)
						$this->db->group_end();
				}
				
				$i++;
			}
		}

			
		if(isset($post['order']))
		{
			$column_order=$param['column_order'];
			$this->db->order_by($column_order[$post['order']['0']['column']], $post['order']['0']['dir']);
		} 
		else if(isset($param['order']))
		{
			$order = $param['order'];
			$this->db->order_by(key($order), $order[key($order)]);
		}

		if($count==FALSE){
			if(isset($post['length']) && $post['length'] != -1){
				$this->db->limit($post['length'],$post['start']);	
			}
			
			$query = $this->db->get('content_data');
				//print_r($this->db->last_query());die;
			if($return_query==FALSE){
				return $query->result();
			}else if($return_query==TRUE){
				return $this->db->last_query();
			}		
			
		}else if($count==TRUE){
			$query = $this->db->get('content_data');
			if($return_query==FALSE){
				return $query->num_rows();
			}else if($return_query==TRUE){
				return $this->db->last_query();
			}			
		}
		

	}


	public function _get_contents_albums($post=array(),$param=array(),$count=FALSE,$return_query=FALSE){
		$this->db->select('content_album.*');

		$i = 0;

		//if(isset()){}

		if(isset($param) && $param!=NULL){
			$this->db->where($param);
		}

		if(isset($param['column_search'])){
			foreach ($param['column_search'] as $item)
			{
				if(isset($post['search']['value']) && $post['search']['value'])
				{
					
					if($i===0)
					{
						$this->db->group_start();
						$this->db->like($item, $post['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $post['search']['value']);
					}

					if(count($param['column_search']) - 1 == $i)
						$this->db->group_end();
				}
				
				$i++;
			}
		}

			
		if(isset($post['order']))
		{
			$column_order=$param['column_order'];
			$this->db->order_by($column_order[$post['order']['0']['column']], $post['order']['0']['dir']);
		} 
		else if(isset($param['order']))
		{
			$order = $param['order'];
			$this->db->order_by(key($order), $order[key($order)]);
		}

		if($count==FALSE){
			if(isset($post['length']) && $post['length'] != -1){
				$this->db->limit($post['length'],$post['start']);	
			}
			
			$query = $this->db->get('content_album');

			if($return_query==FALSE){
				return $query->result();
			}else if($return_query==TRUE){
				return $this->db->last_query();
			}		
			
		}else if($count==TRUE){
			$query = $this->db->get('content_album');
			if($return_query==FALSE){
				return $query->num_rows();
			}else if($return_query==TRUE){
				return $this->db->last_query();
			}			
		}
	}

public function get_content_thumbsup_count($param,$return_query=FALSE)
    {
        $this->db->where($param);
        $query = $this->db->get('content_thumbs');
           if($return_query==FALSE){
            return $query->num_rows();
            }else if($return_query==TRUE){
              return $this->db->last_query();
            }                
    }

	
    public function get_content_thumbs($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_thumbs');
        $result = $query->first_row();
        return $result;                  
    }



    public function add_content_tags_data($content_data)
    {
        $this->db->insert('content_tags',$content_data);
        return $this->db->insert_id();
    }

    public function delete_content_tags_data($param){
    	return $this->db->delete('content_tags',$param);
    }

    public function update_content_tags_data($data,$param)
    {
        $this->db->where($param);
        $query = $this->db->update('content_tags', $data);

        return $query;
    }

    public function get_content_tags_data($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_tags');
        $result = $query->first_row();
        return $result;                  
    }


    public function _get_filter_data($against_val,$param_in=NULL,$mode='BOOLEAN',$limit=null,$offset=null,$order_by='filter_id',$order='ASC',$return_query=FALSE){
        // $this->table='content_filters';
        // return $this->get_match_against('filter_id,filter_type,filter_type_id,filter_value,filter_url','filter_value',$against_val,$param,$param_or,$param_in,$param_in_val,$mode,$order_by,$order,$limit,$offset,$return_query);


        $sql="SELECT `filter_id`, `filter_type`, `filter_type_id`, `filter_value`, `filter_url` FROM `content_filters` WHERE MATCH(filter_value) AGAINST('".$against_val."' IN ".$mode." MODE) AND filter_type IN(".$param_in.") ORDER BY ".$order_by." ".$order." LIMIT ".$offset.",".$limit;

        $query = $this->db->query($sql);

        if($return_query==FALSE){
			$result = $query->result();
	    	return $result; 
        }else{
        	return $sql;
        }
	       
    }

    public function get_match_against($returned_fields=NULL,$match_fields,$against_val,$param=NULL,$param_or=NULL,$param_in=NULL,$param_in_val=NULL,$mode,$order_by='filter_id',$order='ASC',$limit=null,$offset=null,$table='content_filters',$return_query=FALSE){

		//$this->db->cache_on();
		if($returned_fields!=NULL){
			$this->db->select($returned_fields);
		}else{
			$this->db->select('*');
		}

		$this->db->from($table);

		$this->db->where('MATCH('.$match_fields.') AGAINST("'.$against_val.'" IN '.$mode.' MODE)');

		if($param!=NULL){
			$this->db->where($param);
		}

		if($param_or!=NULL){
			$this->db->group_start();
			$this->db->or_where($param_or,TRUE);
			$this->db->group_end();
		} 

		if($param_in!=NULL && $param_in_val!=NULL){
			$this->db->where_in($param_in,$param_in_val,FALSE);
		}
		$this->db->order_by($order_by, $order);

		if($limit!=null && $offset!=null){
			$this->db->limt($limit, $offset);
		}

		$query=$this->db->get();

		// echo $query;die;
		$result = $query->result();
	    return $result;
	}

	public function get_content_specs($param,$single_row=FALSE,$order_by=NULL,$order='DESC',$return_query=FALSE)
    {
        $this->db->where($param);

        if($order_by!=NULL){
        	$this->db->order_by($order_by,$order);
        }

        $query = $this->db->get('content_speciality');

        if($return_query==FALSE){
        	if($single_row==FALSE){
				$result = $query->result();
        	}else{
        		$result=$query->first_row();
        	}
        }else{
        	$result=$this->db->last_query();
        }

        
        return $result;                  
    }

    public function get_content_concat_specs($param,$order_by='spec_id',$order='ASC',$return_query=FALSE)
    {

    	$this->db->select('GROUP_CONCAT(spec_name) as concat_name');
        $this->db->where_in('spec_id',$param,FALSE);

        if($order_by!=NULL){
        	$this->db->order_by($order_by,$order);
        }

        $query = $this->db->get('content_speciality');

        if($return_query==FALSE){
        	$result=$query->first_row();
        }else{
        	$result=$this->db->last_query();
        }

       return $result;

     }

     public function add_comment($data,$batch=FALSE,$return_query=FALSE){
		if(!empty($data)){
			if($return_query==FALSE){
				if($batch==FALSE){
					$this->db->insert('content_comments',$data);
					return $this->db->insert_id();
				}else{
					return $this->db->insert_batch('content_comments',$data);
				}	
			}else{
				return $this->db->set($data)->get_compiled_insert('content_comments');
			}
		}else{
			return 'Data is empty';
		}				
	}


	public function get_comments($param=null,$order_by='comment_id',$order='ASC',$limit=null,$start=null,$apply_group_by=FALSE,$group_by='content_track_id',$return_query=FALSE){
		$this->db->select('content_comments.*,CONCAT(users.firstname," ",users.lastname) as comment_username,users.profile_image,content_data.*');
		$this->db->join('users','users.id=content_comments.comment_user_id','LEFT');
		$this->db->join('content_data','content_data.content_id=content_comments.content_track_id','LEFT');
		if($param!=null){
			$this->db->where($param);
		}

		if($apply_group_by==TRUE){
			$this->db->group_by($group_by);
		}


		$this->db->order_by($order_by,$order);

		if($limit!=null && $start!=null){
			$this->db->limit($limit,$start);
		}

		$query=$this->db->get('content_comments');

		

		if($return_query==FALSE){
			$result= $query->result();
			return $result;
		}else if($return_query==TRUE){
			return $this->db->last_query();
		}
	}

}