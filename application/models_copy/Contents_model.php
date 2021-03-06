<?php 
class Contents_model extends CI_Model
{
	public function get_genere(){
	    $query = $this->db->query(" SELECT * FROM  `content_genere` WHERE genere_status='1' ORDER BY genere_id");
	    $result = $query->result();
	    return $result;
	}

	public function get_content($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_data');
        $result = $query->first_row();
        return $result;                  
    }

    // public function get_contents($param,$order_by=NULL,$order='DESC',$limit=10,$start=0)
    // {
    //     $this->db->where($param);

    //     if($order_by!=NULL){
    //     	$this->db->order_by($order_by,$order);
    //     }

    //     $this->db->limit($limit,$start);

    //     $query = $this->db->get('content_data');
    //     $result = $query->result();
    //     return $result;                  
    // }

public function get_contents()
    {
        $this->db->select('d.*,u.id,count(ct.thumbs_track_id) AS cntoflike');
        $this->db->from('content_data AS d');
        $this->db->join('users AS u', 'u.id=d.content_user_id', 'LEFT');
        $this->db->join('content_thumbs AS ct', 'ct.thumbs_track_id = d.content_id', 'LEFT');
        $this->db->where('u.status', 1);
        $this->db->where('d.status', 1);
        $this->db->where('ct.thumbs_value', 'up');
        $this->db->group_by('ct.thumbs_track_id');
        $this->db->order_by('cntoflike', 'desc');
        $this->db->limit(10,0); 
        $query = $this->db->get();
       //print_r($this->db->last_query()); die;
       $result = $query->result();
        return $result;                  
    }
    


    public function get_artist($single_row=FALSE)
    {
        $this->db->select('d.*,u.firstname,u.lastname,u.profile_image');
        //$this->db->from('content_data AS d');
        $this->db->join('users AS u', 'u.id = d.content_user_id', 'LEFT');
        $this->db->where('d.status', 1);
        $this->db->order_by('d.created_at', 'desc'); 
     	$this->db->group_by('d.content_user_id'); 
        $query = $this->db->get('content_data AS d');
       	// print_r($this->db->last_query()); die;

        if($single_row==FALSE){
        	$result = $query->result();
        	return $result;
        }else if($single_row==TRUE){
        	$result = $query->first_row();
        	return $result;
        } 	                  
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
		$this->db->select('content_data.*');

		$i = 0;
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
			
			$query = $this->db->get('content_data');

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


	
    public function get_content_thumbs($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_thumbs');
        $result = $query->first_row();
        return $result;                  
    }
}