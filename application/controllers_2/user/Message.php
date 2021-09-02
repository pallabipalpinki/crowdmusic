<?php

class Message extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        error_reporting(0);
    }



    public function onLoadArtistsProducer(){
    	if(session_userdata('SESSION_USER_ID')){
    		if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='GET'){
    			$user_type=$this->input->get('u_type');
    			$user_id=session_userdata('SESSION_USER_ID');

    			$_searched_param=$this->input->get('_searched_param');

    			$suser_data=$this->um->get_user(array('id'=>$user_id));

    			if($user_type=='4'){
    				$user_role='2';
    			}else if($user_type=='2'){
    				$user_role='4';
    			}

    			if($_searched_param==''){
					$user_data=$this->um->get_users(array('user_role'=>$user_role,'status'=>1),'id','ASC',10,0,FALSE);
    			}else{
					$user_data=$this->um->get_filtered_users($_searched_param,"user_role='".$user_role."' AND status=1",'NATURAL LANGUAGE',10,0,'id','ASC',FALSE);
    			}

    			//print_obj($user_data);die;

				if(!empty($user_data)){
					foreach ($user_data as $key => $value) {

						$user_name=ucwords($value->firstname.' '.$value->lastname);
						$user_image=(!empty($value->profile_image) && $value->profile_image!='')?$value->profile_image:base_url('uploads/user/no.jpg');

						$user_last_msg=$this->um->get_messages(array('sender_id'=>$value->id),NULL,FALSE,'msg_id','DESC',1);

						$userdata[]=array(
							'user_id'=>$value->id,
							'user_type'=>$value->user_role,
							'user_sender_type'=>$suser_data->user_role,
							'user_name'=>$user_name,
							'user_image'=>$user_image,
							'user_last_message'=>(!empty($user_last_msg) && $user_last_msg[0]->msg_sent!=NULL)?$user_last_msg[0]->msg_sent:'No message',
							'user_online_status'=>$value->online_status
						);
					}
				}else{
					$userdata=array();
				}


				//print_obj($userdata);die;


				$last_user_msg='';

				json_header_encode($userdata);

    		}else{
    			redirect(base_url());
    		}
    	}else{
    		redirect(base_url());
    	}

    }


    public function onSendMessage(){
    	if(session_userdata('SESSION_USER_ID')){
    		if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){
    			$user_type=post_data('u_type');
    			$user_id=session_userdata('SESSION_USER_ID');
    			$reciver_id=post_data('reciever');

    			$message=post_data('message');

    			$reciever_data=$this->um->get_users(array('user_role'=>$user_type,'id'=>$reciver_id));

    			$msg_data=array(
    				'sender_id'=>$user_id,
    				'reciever_id'=>$reciver_id,
    				'user_type'=>$user_type,
    				'msg_sent'=>$message,
    				'msg_type'=>'text',
    				'msg_seen'=>($reciever_data->online_status=='1')?'1':'2'
    			);

    			$added=$this->um->add_msg($msg_data);

    			if($added){
    				$return['success']='Message Sent';
    			}else{
    				$return['error']='Some error occurred';
    			}

    			json_header_encode($userdata);
    		}else{
    			redirect(base_url());
    		}
    	}else{
    		redirect(base_url());
    	}
    }


    public function onLoadMessages(){
    	if(session_userdata('SESSION_USER_ID')){
    		if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='GET'){
    			$user_id=session_userdata('SESSION_USER_ID');
    			$reciver_id=$this->input->get('reciever');
    			$user_data=$this->um->get_user(array('id'=>$user_id));

    			$msg_data=array();

    			$user_msgs=$this->um->get_messages(array('u1.id'=>$user_id,'u2.id'=>$user_id),array('u1.id'=>$reciver_id,'u2.id'=>$reciver_id),TRUE,'msg_id','ASC',10,0,FALSE);

    			//echo '<pre>';print_r($user_msgs);die;

    			if(!empty($user_msgs)){
    				foreach ($user_msgs as $key => $value) {
    					$msg_data[]=array(
    						'msg_id'=>$value->msg_id,
    						'msg_sent'=>$value->msg_sent,
    						'msg_date'=>date('F d, Y',strtotime($value->created_at)),
    						'msg_sender_img'=>$value->sender_img,
    						'msg_reciever_img'=>$value->reciever_img,
    						'msg_sender_role'=>$value->sender_role,
    						'msg_user_role'=>$user_data->user_role,
    						'msg_type'=>($value->sender_role==$user_data->user_role)?'sent':'replies'
    					);
    				}
    			}

    			json_header_encode($msg_data);
    		}else{
    			redirect(base_url());
    		}
    	}else{
    		redirect(base_url());
    	}
    }



}