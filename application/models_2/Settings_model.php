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

    public function add_filter($data,$batch=FALSE,$return_query=FALSE){
        if(!empty($data)){
            if($return_query==FALSE){
                if($batch==FALSE){
                    $this->db->insert('content_filters',$data);
                    return $this->db->insert_id();
                }else{
                    return $this->db->insert_batch('content_filters',$data);
                }
            }else{
                return $this->db->set($data)->get_compiled_insert('content_filters');
            }
        }else{
            return 'Data is empty';
        }
    }

    public function update_filter($data=array(),$param=array(),$batch=FALSE,$return_query=FALSE){

        if(!empty($data) && !empty($param)){
            if($return_query==FALSE){
                if($batch==FALSE){
                    return $this->db->update('content_filters',$data,$param);
                }else{
                    return $this->db->update_batch('content_filters',$data,$param);
                }
            }else{
                if($batch==FALSE){
                    $this->db->update('content_filters',$data,$param);
                }else{
                    $this->db->update_batch('content_filters',$data,$param);
                }

                return $this->db->last_query();
            }
        }else{
            return 'Data and param are empty';
        }
    }

    public function get_filter($param)
    {
        $this->db->where($param);
        $query = $this->db->get('content_filters');
        $result = $query->first_row();
        return $result;
    }

}