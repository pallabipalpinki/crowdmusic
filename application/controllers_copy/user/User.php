<?php

class User extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        error_reporting(0);
        
        $this->data['theme'] = 'user';

    }

    public function indexSignup()
    {
        $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));

        $settings_data_decoded=json_decode($settings_data->settings_value);


        $this->data['title'] = 'Register with '.$settings_data_decoded->system_title;
        $this->data['module'] = 'user';
        $this->data['page'] = 'add-user';
        $this->data['user_role'] = $this->um->get_user_role();
        $this->data['submit_url'] = 'user/save_user';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function indexPublicpage(){

        $segment_1=$this->uri->segment(1,0);
        $segment_2=$this->uri->segment(2,0);
        
        if($segment_1!='0' && $segment_2!='0' && $segment_1=='profiles' && is_string($segment_2)){

            $exp=explode('-', $segment_2);
            $user_id=$exp[0];

            if(is_numeric($user_id)){
                $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));
                $settings_data_decoded=json_decode($settings_data->settings_value);

                $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id,'slug_value'=>$segment_2));

                if(!empty($user_slug)){
                   $userdata=$this->um->get_user(array('id'=>$user_id));

                   if(!empty($userdata)){
                        $fullname=ucwords($userdata->firstname .' '.$userdata->lastname);

                        $tracks=$this->cm->get_contents(array('content_user_id'=>$user_id),'content_id','ASC',$limit=10);

                        $generes=$this->um->get_genre_userbyid($user_id);

                        if(!empty($generes)){
                            foreach ($generes as $key => $value) {
                                $_user_genres[]=$value['genere_name'];
                            }

                            $user_geners=implode(' | ', $_user_genres);
                        }else{
                            $user_geners=array();
                        }

                        $user_details=array(
                            'user_name'=>$fullname,
                            'user_email'=>$userdata->email,
                            'user_phone'=>$userdata->phone,
                            'user_address'=>$userdata->address,
                            'user_about'=>$userdata->about,
                            'user_role'=>$userdata->role_name,
                            'user_profile_url'=>$user_slug->slug_url_value,
                            'user_profile_edit_url'=>(session_userdata('SESSION_USER_ID'))?$user_slug->slug_url_value.'/profiledit':'',
                            'user_content_url'=>$user_slug->slug_url_value.'/contents',
                            'user_dp_image'=>(!empty($userdata->dp_image))?$userdata->dp_image:base_url().'assets/images/innercover.jpg',
                            'user_profile_image'=>(!empty($userdata->profile_image))?$userdata->profile_image:base_url().'assets/images/innercover.jpg',
                            'user_tracks'=>$tracks,
                            'user_genres'=>$user_geners
                        );

                        //echo session_userdata('SESSION_USER_ID');

                        //print_obj($user_details);die;

                        $this->data['module']  = 'profile';
                        $this->data['page'] ='index';
;
                        $this->data['page_title']=$fullname.' | '.$settings_data_decoded->system_title;
                        $this->data['user_details']=$user_details;
                        $this->load->vars($this->data);

                        //echo $this->data['theme'];die;
                        $this->load->view($this->data['theme'].'/template');
                   }else{
                    redirect(base_url());
                   }
                }else{
                    redirect(base_url());
                }
            }else{
                redirect(base_url());
            }   

        }else{
            redirect(base_url());
        }
    }

    public function indexPublicpageEdit(){
        
        $segment_1=$this->uri->segment(1,0);
        $segment_2=$this->uri->segment(2,0);
        $segment_3=$this->uri->segment(3,0);

        //echo $segment_3;die;

        
        if($segment_1!='0' && $segment_2!='0' && $segment_3!='0' && $segment_1=='profiles' && is_string($segment_2) && $segment_3=='profiledit'){

            $exp=explode('-', $segment_2);
            $user_id=$exp[0];

            if(is_numeric($user_id) && $user_id==session_userdata('SESSION_USER_ID')){
                $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));
                $settings_data_decoded=json_decode($settings_data->settings_value);
                $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id,'slug_value'=>$segment_2));

                if(!empty($user_slug)){
                    if(session_userdata('SESSION_USER_ID')){
                        $userdata=$this->um->get_user(array('id'=>$user_id));

                        if(!empty($userdata)){
                            $user_roles=$this->um->get_user_role();

                            foreach ($user_roles as $key => $value) {
                                $_user_roles[]=array(
                                    'user_role_id'=>$value->role_id,
                                    'user_role_name'=>$value->role_name,
                                    'selected'=>($value->role_id==$userdata->user_role)?'selected':''
                                );
                            }

                            $user_details=array(
                                'user_name'=>ucwords($userdata->firstname .' '.$userdata->lastname),
                                'user_fname'=>$userdata->firstname,
                                'user_lname'=>$userdata->lastname,
                                'user_email'=>$userdata->email,
                                'user_phone'=>$userdata->phone,
                                'user_company_name'=>$userdata->company_name,
                                'user_address'=>$userdata->address,
                                'user_about'=>$userdata->about,
                                'user_role'=>$userdata->role_name,
                                'user_created_at'=>date('jS F Y', strtotime($userdata->created_at)),
                                'user_profile_url'=>$user_slug->slug_url_value,
                                'user_profile_edit_url'=>(session_userdata('SESSION_USER_ID'))?$user_slug->slug_url_value.'profiledit':'',
                                'user_content_url'=>$user_slug->slug_url_value.'/contents',
                                'user_dp_image'=>(!empty($userdata->dp_image))?$userdata->dp_image:base_url().'assets/images/innercover.jpg',
                                'user_profile_image'=>(!empty($userdata->profile_image))?$userdata->profile_image:base_url().'assets/images/innercover.jpg',
                                'user_roles'=>$_user_roles
                            );

                            $this->data['module']  = 'profile';
                            $this->data['page'] ='profile_edit';

                            $this->data['user_details']=$user_details;
                            $this->data['page_title']=$fullname.' | '.$settings_data_decoded->system_title;
                            $this->load->vars($this->data);

                            //echo $this->data['theme'];die;
                            $this->load->view($this->data['theme'].'/template');
                        }else{
                            redirect(base_url());
                        }
                    }else{
                        redirect($user_slug->slug_url_value);
                    }    
                }else{
                    redirect(base_url());
                }
            }else{
                redirect(base_url());
            }  

        }else{
            redirect(base_url());
        }
    }

    public function onLogin(){
        if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

            $username=post_data('username');
            $password=post_data('password');

            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run() == FALSE){
                $return['error']='Username & Password required';
            }else{
                $userdata=$this->um->get_user("email='".$username."' AND password=md5('".$password."') AND verified=1");

                if(!empty($userdata)){

                    if($userdata->status=='1'){
                        $session_data=array(
                            'SESSION_USER_ID'=>$userdata->id,
                            'SESSION_USER_TYPE'=>$userdata->user_role,
                            'SESSION_USER_EMAIL'=>$userdata->email
                        );

                        session_set_userdata($session_data);

                        $user_slug_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$userdata->id));

                        if($userdata->user_role>0){
                            $redirect_url=$user_slug_url->slug_url_value;
                        }else{
                            $redirect_url=$user_slug_url->slug_url_value.'/profiledit';
                        }

                        $return['success']='Loggedin successfully';
                        $return['redirect']=$redirect_url;
                    }else{
                        $return['error']='You ID has been deactivated.Contact system adminstrator';
                    }
                        
                }else{
                    $return['error']='Invalid Credentials';
                }
            }

            json_header_encode($return);

        }else{
            redirect(base_url());
        }
    }

    public function onLogout(){
        if(session_userdata('SESSION_USER_ID')){
            $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>session_userdata('SESSION_USER_ID')));
            $session_values=array('SESSION_USER_ID','SESSION_USER_EMAIL','SESSION_USER_type');
            session_unset_userdata($session_values);
            if(!empty($user_slug)){
                $logout_redirect=$user_slug->slug_url_value;
            }else{
                $logout_redirect=base_url();
            }
            redirect($logout_redirect);  
        }else{
            redirect(base_url());
        }
    }

    public function onRegister(){
       if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

            $fname=post_data('fname');
            $lname=post_data('lname');
            $phone=post_data('phone');
            $email=post_data('email');
            $address=post_data('address');
            $about=post_data('about');
            $usertype=post_data('usertype');
            $companyname=post_data('companyname');
            $password=post_data('password');

            $duplicate_data=$this->um->get_duplicate_user(null,array('email'=>$email,'phone'=>$phone));

            if($duplicate_data->counted==0){

                $data_to_store=array(
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'password' => md5($password) ,
                    'company_name' => $companyname,
                    'user_role' => $usertype,
                    'about' => $about,
                    'status' => 1,
                    'verified' => 1
                );

                $added=$this->um->add_user($data_to_store);

                if($added){

                    $this->load->library('image_lib');
                    $media_disk_path=FCPATH.'/uploads/user/profileimage/';

                    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!=''){
                        $config['upload_path']   = $media_disk_path;
                        $new_name = strtotime(date('d-m-Y h:i:s')).str_replace(' ', '_', $_FILES["profile_image"]['name']);
                        $config['file_name'] = $new_name;
                        $config['max_size']      = '10000';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $this->load->library('upload');                         

                        $this->upload->initialize($config);

                        if ( ! $this->upload->do_upload('profile_image')) {
                        }else {
                                                   
                          $upload_image = $this->upload->data();

                          $path=$media_disk_path.'/'.$upload_image['file_name'];

                          $relative_path=base_url().'uploads/user/profileimage/'.$new_name;
                          $disk_path=$path;

                          //$this->resizeImage($path,$path,'366','365');
                          $this->um->update_user(array('profile_image_disk_path'=>$disk_path,'profile_image'=>$relative_path),array('id'=>$added));
                        }
                    }


                    $slug=$added.'-'.url_slug($fname).'-'.url_slug($lname);

                    $slu_data_to_store=array(
                        'slug_type'=>'USER_PROFILE',
                        'slug_type_id'=>$added,
                        'slug_value'=>$slug,
                        'slug_url_value'=>base_url().'profiles/'.$slug
                    );

                    $this->sm->add_slug($slu_data_to_store);

                    $return['success']='Thank you for your interest.You have registered successfull';


                }else{
                    $return['error']='There was an system error.Try after sometime.';
                }

            }else{
                $return['error']='Email/Phone No already taken.';
            }

            json_header_encode($return);
       }else{
        redirect(base_url());
       }
    }

    public function onUpdateProfile(){
        if(session_userdata('SESSION_USER_ID')){
            if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

                $user_id=session_userdata('SESSION_USER_ID');
                $fname=post_data('fname');
                $lname=post_data('lname');
                $phone=post_data('phone');
                $email=post_data('email');
                $address=post_data('address');
                $about=post_data('about');
                $usertype=post_data('usertype');
                $companyname=post_data('companyname');
                $password=post_data('password');

                $duplicate_data=$this->um->get_user('id!='.$user_id.' AND (email="'.$email.'" OR phone="'.$phone.'")',FALSE);

                if(empty($duplicate_data)){

                    $user_data=$this->um->get_user(array('id'=>$user_id));

                    if($password!=''){
                        $data_to_store=array(
                            'firstname' => $fname,
                            'lastname' => $lname,
                            'address' => $address,
                            'phone' => $phone,
                            'email' => $email,
                            'password' => md5($password),
                            'company_name' => $companyname,
                            'user_role' => $usertype,
                            'about' => $about,
                            'updated_at'=>date("Y-m-d H:i:s"),
                            'updated_by'=>$this->session->userdata('SESSION_USER_ID'),
                        );
                    }else{
                        $data_to_store=array(
                            'firstname' => $fname,
                            'lastname' => $lname,
                            'address' => $address,
                            'phone' => $phone,
                            'email' => $email,
                            'company_name' => $companyname,
                            'user_role' => $usertype,
                            'about' => $about,
                            'updated_at'=>date("Y-m-d H:i:s"),
                            'updated_by'=>$this->session->userdata('SESSION_USER_ID'),
                        );
                    }

                    $updated=$this->um->update_user($data_to_store,array('id'=>$user_id));

                    if($updated){

                        if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name']!=''){
                            $this->load->library('image_lib');
                            $media_disk_path=FCPATH.'/uploads/user/profileimage/';
                            $config['upload_path']   = $media_disk_path;
                            $new_name = strtotime(date('d-m-Y h:i:s')).str_replace(' ', '_', $_FILES["profile_image"]['name']);
                            $config['file_name'] = $new_name;
                            $config['max_size']      = '10000';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $this->load->library('upload');                         

                            $this->upload->initialize($config);

                            if ( ! $this->upload->do_upload('profile_image')) {
                            }else {
                                                       
                              $upload_image = $this->upload->data();

                              $path=$media_disk_path.'/'.$upload_image['file_name'];

                              $relative_path=base_url().'uploads/user/profileimage/'.$new_name;
                              $disk_path=$path;
                              if(is_file($user_data->profile_image_disk_path)){
                                @unlink($user_data->profile_image_disk_path);
                              }

                              //$this->resizeImage($path,$path,'366','365');
                              $this->um->update_user(array('profile_image_disk_path'=>$disk_path,'profile_image'=>$relative_path),array('id'=>$user_id));
                            }
                        }

                        $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id));

                        if(!empty($user_slug)){
                            $slug=$user_id.'-'.url_slug($fname).'-'.url_slug($lname);

                            $slug_url=base_url().'profiles/'.$slug.'/profiledit';

                            $slu_data_to_store=array(
                                'slug_type'=>'USER_PROFILE',
                                'slug_type_id'=>$user_id,
                                'slug_value'=>$slug,
                                'slug_url_value'=>base_url().'profiles/'.$slug
                            );

                            $this->sm->update_slug($slu_data_to_store,array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id));
                        }else{
                            $slug_url=$user_slug->slug_url_value.'/profiledit';
                        }


                        if($usertype!=session_userdata('SESSION_USER_TYPE')){
                            $session_data=array(
                                'SESSION_USER_ID'=>$user_id,
                                'SESSION_USER_TYPE'=>$usertype,
                                'SESSION_USER_EMAIL'=>$email
                            );

                            session_set_userdata($session_data);
                        }

                        $return['redirect']=$slug_url;
                        $return['success']='Profile updated successfully';
                    }else{
                        $return['error']='There was an system error.Try after sometime.';
                    }
                }else{
                    $return['error']='Email/Phone No already taken.';
                }

                json_header_encode($return);

            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }

    public function onGAuthURL(){
        if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='GET'){
            $social_auth_type=$this->input->get('_social_auth');

            //echo $social_auth_type;die;

            $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));

            $settings_data_decoded=json_decode($settings_data->settings_value);

            if($social_auth_type=='gauth'){
                $this->social->clientID=$settings_data_decoded->system_google_client_id;
                $this->social->clientSecret=$settings_data_decoded->system_google_secret_key;
                $this->social->redirectUri=$settings_data_decoded->system_social_redirect_url;
                $return['auth_url']=$this->social->get_google_authurl();
            }else if($social_auth_type=='fbauth'){
                $this->social->clientID=$this->data['fbclientID'];
                $this->social->clientSecret=$this->data['fbclientSecret'];
                $this->social->redirectUri=$this->data['redirectUri'];

                //echo $this->social->clientID.'<br>'.$this->social->clientSecret;die;

                //print_obj($this->social->get_fb_authurl());die;
                $return['auth_url']=$this->social->get_fb_authurl();
            }
            else{
                $return['error']='Social authentication is not supported';
            }

            //echo '<pre>';print_r($return);die;

            header('Content-Type: application/json');

            echo json_encode($return);
        }else{
            redirect(base_url());
        }
    }

    public function onGAuthSocial(){
        $g_code=$this->input->get('code', TRUE);

        $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));

        $settings_data_decoded=json_decode($settings_data->settings_value);

        if($g_code!=null){
            $this->social->clientID=$settings_data_decoded->system_google_client_id;
            $this->social->clientSecret=$settings_data_decoded->system_google_secret_key;
            $this->social->redirectUri=$settings_data_decoded->system_social_redirect_url;

            $auth_data=$this->social->google_login($g_code);

            //print_obj($auth_data);

            if(!empty($auth_data) && $auth_data!=FALSE && !empty($auth_data->email)){
                $email              =   $auth_data->email;
                $name               =   $auth_data->name;
                $familyName         =   $auth_data->familyName;
                $givenName          =   $auth_data->givenName;
                $user_image_url     =   $auth_data->picture;
                $verifiedEmail      =   $auth_data->verifiedEmail;

                $user_data=$this->um->get_user(array('email'=>$email),FALSE);

                //print_obj($user_data);die;

                if(empty($user_data)){
                    $data_to_store=array(
                        'firstname' => $givenName,
                        'lastname' => $familyName,
                        'address' => null,
                        'phone' => null,
                        'email' => $email,
                        'password' => md5('Password@123') ,
                        'company_name' => null,
                        'user_role' => '0',
                        'about' => null,
                        'profile_image'=>$user_image_url,
                        'status' => 1,
                        'verified' => $verifiedEmail,
                        'created_through'=>'google'
                    );

                    //print_obj($data_to_store);

                    $added=$this->um->add_user($data_to_store);

                    //echo $added;die;

                    if($added){
                        $this->um->update_user(array('created_by'=>$added),array('id'=>$added));
                        $slug=$added.'-'.url_slug($givenName).'-'.url_slug($familyName);

                        $slug_url=base_url().'profiles/'.$slug;

                        $edit_url=$slug_url.'/profiledit';

                        $slu_data_to_store=array(
                            'slug_type'=>'USER_PROFILE',
                            'slug_type_id'=>$added,
                            'slug_value'=>$slug,
                            'slug_url_value'=>$slug_url
                        );

                        $this->sm->add_slug($slu_data_to_store);

                        $session_data=array(
                            'SESSION_USER_ID'=>$added,
                            'SESSION_USER_TYPE'=>'0',
                            'SESSION_USER_EMAIL'=>$email
                        );

                        session_set_userdata($session_data);

                        redirect($edit_url);
                    }
                }else{
                    $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_data->id));

                    $slug_url=$user_slug->slug_url_value;

                    $edit_url=$slug_url.'/profiledit';

                    if($user_data->user_role>0){
                        $redirect_url=$slug_url;
                    }else{
                        $redirect_url=$edit_url;
                    }

                    $session_data=array(
                        'SESSION_USER_ID'=>$user_data->id,
                        'SESSION_USER_TYPE'=>$user_data->user_role,
                        'SESSION_USER_EMAIL'=>$user_data->email
                    );

                    session_set_userdata($session_data);

                    redirect($redirect_url);
                }
            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }

}