<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

require_once APPPATH.'third_party/vendor/autoload.php';

class Dashboard extends CI_Controller{

    public function __construct() {

        parent::__construct(); 
        error_reporting(0);  $this->data['title']  = 'crowd music';
        $this->data['theme']          = 'user';
        $this->load->model('user_panel_model');
        
        $this->load->library('Encryption','encrypt');
        $this->load->model('user_login_model');

    }
        
    public function index()
    {   
        // print_r( $this->session->userdata('SESSION_USER_ID'));   
        // print_r( $this->session->userdata('SESSION_USER_type')); 
        // print_r( $this->session->userdata('SESSION_USER_EMAIL'));
      if(!$this->session->userdata('SESSION_USER_ID')){
          redirect(base_url());
        }
      else{
        $uid= $this->session->userdata('SESSION_USER_ID');
        $this->data['page_title'] = 'Edit Profile';
        $this->data['page_title'] = 'Dashboard';
        $this->data['module']  = 'profile';
        $this->data['user_details']=$this->user_panel_model->profile($uid);
        $this->data['page'] =($this->session->userdata('SESSION_USER_ID')=='1')? 'index':'p_audience';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');

        }  
    }  

    public function is_valid_login(){
        //echo "string";die;
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //print_r($this->input->post());die;

         if (!isset($username) || $username == '' || $username == 'undefined') {
            /*If Username that we recieved is invalid, go here, and return 2 as output*/
            echo 2;
            exit();
        }
        if (!isset($password) || $password == '' || $password == 'undefined') {
            /*If Password that we recieved is invalid, go here, and return 3 as output*/
            echo 3;
            exit();
        }
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            /*If Both Username &  Password that we recieved is invalid, go here, and return 4 as output*/
            echo 4;
            exit();
        } else {
            /*Create object of model MLogin.php file under models folder*/
             $result = $this->user_login_model->check_login($username,$password);

            if (($result['status']) == 1) {
                  /*If everything is fine, then go here, and return 1 as output and set session*/
                  // $data = array(
                  //     'idUser' => $result[0]->idUser,
                  //     'username' => $result[0]->username
                  // );
                   $this->session->set_userdata('SESSION_USER_ID',$result['id']);   
                   $this->session->set_userdata('SESSION_USER_type',$result['type']); 
                   $this->session->set_userdata('SESSION_USER_EMAIL',$result['email']);
                  echo 1;
            } else {
                echo 5;
            }
        }

    }    

    public function logout(){
        if($this->session->userdata('SESSION_USER_ID')){
          $this->session->unset_userdata('SESSION_USER_ID');
          $this->session->unset_userdata('SESSION_USER_EMAIL');
          $this->session->unset_userdata('SESSION_USER_type');
          $this->session->sess_destroy();
            redirect(base_url());  
        }else{
            redirect(base_url());
        }
    }


    public function profile_edit($id)
    {  
     
      if(!$this->session->userdata('SESSION_USER_ID')){
          redirect(base_url());
        }
      else{
        $uid= $this->session->userdata('SESSION_USER_ID');
        $this->data['page_title'] = 'Edit Profile';
        $this->data['page_title'] = 'Dashboard';
        $this->data['module']  = 'profile';
        $this->data['user_role'] = $this->user_panel_model->get_user_role();
        $this->data['user_details']=$this->user_panel_model->profile($uid);
        $this->data['page'] ='profile_edit';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');

        }  
    }  

    public function profile_update(){
        if($this->session->userdata('SESSION_USER_ID')){
        //print_r($this->input->post()); die;
           // echo "hi";die;
            $uid=$this->input->post('uid');
            $userdata= $this->user_panel_model->user_show_db($uid);
            //print_r($userdata->email);die;
            $this->form_validation->set_rules('fname', 'First Name','trim|required');
            $this->form_validation->set_rules('lname', 'Last Name','trim|required');
             $this->form_validation->set_rules('address', 'Address','trim|required');
            $this->form_validation->set_rules('phone', 'Phone','trim|required|max_length[10]|min_length[10]'); 
            //$this->form_validation->set_rules('usertype', 'User Type','required'); 
            $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
           
            $editpassword= ($userdata->password == $this->input->post('password')) ? $userdata->password : md5($this->input->post('password'));
           
            $emailch=$userdata->email;
            $phonech=$userdata->phone;
          
              if($emailch!=$this->input->post('email')){
              $this->form_validation->set_rules('email', 'Email','is_unique[users.email]');
              }
              if($phonech!=$this->input->post('phone')){
              $this->form_validation->set_rules('phone', 'Phone','is_unique[users.phone]');
              }
          
                if ($this->form_validation->run() === FALSE)
                    {  
                      //echo "string";die;
                    $this->data['page_title'] = 'Edit Profile';
                    $this->data['page_title'] = 'Dashboard';
                    $this->data['module']  = 'profile';
                    $this->data['user_role'] = $this->user_panel_model->get_user_role();
                    $this->data['user_details']=$this->user_panel_model->profile($uid);
                    $this->data['page'] ='profile_edit';
                    $this->load->vars($this->data);
                    $this->load->view($this->data['theme'].'/template');
                    }
                else
                    {
                      //echo "hi";die;
                      // $company = ($this->input->post('usertype')=='C') ? $this->input->post('companyname'): '';
                        if (empty($_FILES['profile_image']['name'])) {
                          
                           $profilephoto= $userdata->profile_image;
                      }
                  else{  
                        $config['upload_path'] = './uploads/user/profileimage/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $this->load->library('upload', $config);
                      if (!$this->upload->do_upload('profile_image')) {
                            $error = array('error' => $this->upload->display_errors());
                          }
                      else{
                          $imageurl = str_replace(base_url()."uploads/user/profileimage/", '',$userdata->profile_image);
                          $image_path= FCPATH.'uploads/user/profileimage/'.$imageurl;
                          unlink( $image_path); 
                          $data=$this->upload->data();
                          $profilephoto= base_url()."uploads/user/profileimage/".$data['file_name'];
                          //echo $profilephoto;
                          }
                      }


                      //echo $profilephoto;die;
                       $usersdata = array(
                         'firstname' =>$this->input->post('fname'),
                         'lastname' => $this->input->post('lname'),
                         'address'=> $this->input->post('address'),
                         'phone' => $this->input->post('phone'),
                         'email'  =>  $this->input->post('email'),
                         'profile_image'=>$profilephoto,
                         'password' => $editpassword,
                         'company_name' => $this->input->post('companyname'),
                         'user_role' => $this->input->post('usertype'),
                         'about'=>$this->input->post('about'),
                         'status'=>1,
                         'verified'=>1
                          );
                          
                    //print_r($usersdata);die;
                  $res_id=$this->user_panel_model->user_edit_db($uid,$usersdata);
                      
                        
                   if($res_id){           
                      $this->session->set_flashdata('success','User updated Successfully');
                      redirect('user-dashboard');
                    }
                 
                    }
                  }
               else{        redirect('admin');
                }
    }


    public function onGAuthURL(){
        if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='GET'){
            $social_auth_type=$this->input->get('_social_auth');

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

        echo $g_code;die;

        $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));

        $settings_data_decoded=json_decode($settings_data->settings_value);

        echo '<pre>';print_r($settings_data_decoded);

        if($g_code!=null){
            $this->social->clientID=$settings_data_decoded->system_google_client_id;
            $this->social->clientSecret=$settings_data_decoded->system_google_secret_key;
            $this->social->redirectUri=$settings_data_decoded->system_social_redirect_url;

            $auth_data=$this->social->google_login($g_code);

            echo 'hi';

            echo '<pre>';print_r($auth_data);die;

            if(!empty($auth_data) && $auth_data!=FALSE && !empty($auth_data->email) && $auth_data->verifiedEmail=='1'){
                $user_name          =   $auth_data->email;
                $name               =   $auth_data->name;
                $user_image_url     =   $auth_data->picture;

                echo $user_image_url;die;
            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }


  }

?>