<?php

class Admin extends CI_Controller{

public function __construct() {

    parent::__construct();
    error_reporting(0);
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->model('admin_login_model');
    $this->load->model('admin_panel_model');
    $this->data['title']          = 'Crowd music Admin';
    $this->data['theme']          = 'admin';
    $this->data['module'] = 'user';

    }
public function index(){

      $this->data['page_title'] = 'Sign In';
      $this->data['module']  = 'pages';
      $this->data['page'] = 'login';
      $this->load->vars($this->data);
      $this->load->view($this->data['theme'].'/template');

      }
public function login(){
        $admin_email=$this->security->xss_clean($this->input->post('admin_email'));
        $admin_pass=$this->security->xss_clean($this->input->post('admin_password'));
        $admin_password=md5($admin_pass);
        // $admin_password=$this->input->post('admin_password');
        $this->form_validation->set_rules('admin_email', 'Email','trim|required|valid_email');
        $this->form_validation->set_rules('admin_password', 'Password','trim|required');   
             if ($this->form_validation->run() === FALSE)
              {         
              $this->data['page_title'] = 'Sign In';
              $this->data['module']  = 'pages';
              $this->data['page'] = 'login';
              $this->load->vars($this->data);
              $this->load->view($this->data['theme'].'/template');
               }
              else
              { 
              $admin_dtl = $this->admin_login_model->admin_login($admin_email,$admin_password);
              if ($admin_dtl) {

              $usersdate = array(
                'admin_id'=>$admin_dtl->id,
                'admin_email'=>$admin_dtl->email,
                'username'=>$admin_dtl->username
                );
               //print_r($usersdate);die;
              $this->session->set_userdata('SESSION_ADMIN_ID',$admin_dtl->id);
              $this->session->set_userdata('SESSION_ADMIN_EMAIL',$admin_dtl->email);
              $this->session->set_userdata('SESSION_ADMIN_NAME',$admin_dtl->username);
              $this->session->set_userdata('logged_in',true);
              $this->session->set_flashdata('success','Login Successful!');
              //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';die;
              redirect('admin/dashboard');
            }else{
                  $this->session->set_flashdata('fail','Invalid email or password.');
              redirect('admin');
              }
            }
         }
public function dashboard(){
   if($this->session->userdata('SESSION_ADMIN_ID')){
        $this->data['page']='index';
        $this->data['audiancecount'] = $this->admin_panel_model->get_audiance_count();
        $this->data['contributorcount'] = $this->admin_panel_model->get_contributor_count();
        $this->data['mixercount'] = $this->admin_panel_model->get_mixer_count();
        $this->data['producercount'] = $this->admin_panel_model->get_producer_count();
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
      }else{
        redirect('admin');
      }
     }
public function logout(){
        if($this->session->userdata('SESSION_ADMIN_ID')){
          $this->session->unset_userdata('SESSION_ADMIN_ID');
          $this->session->unset_userdata('SESSION_ADMIN_EMAIL');
          $this->session->unset_userdata('SESSION_ADMIN_NAME');
         // $this->session->sess_destroy();
        redirect('admin');  
        }else{
        redirect('admin');
      }
    }
//===========audiance=========================

public function audiance()
    {   if($this->session->userdata('SESSION_ADMIN_ID')){
          $this->data['page']='audiancelist';
          $this->data['user_data'] = $this->admin_panel_model->get_audiance();
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
        
    }else{
        redirect('admin');
      }
    }
    //=================contributor==================

public function contributor()
    {   if($this->session->userdata('SESSION_ADMIN_ID')){
          $this->data['page']='contributorlist';
          $this->data['user_data'] = $this->admin_panel_model->get_contributor();
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
        
    }else{        redirect('admin');
      }
    }
    //===============mixer==============
public function mixer()
    {   if($this->session->userdata('SESSION_ADMIN_ID')){
          $this->data['page']='mixerlist';
          $this->data['user_data'] = $this->admin_panel_model->get_mixer();
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
        
    }else{
        redirect('admin');
      }
    }
//================================producer======
public function producer()
    {   if($this->session->userdata('SESSION_ADMIN_ID')){
          $this->data['page']='producerlist';
          $this->data['user_data'] = $this->admin_panel_model->get_producer();
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
        
    }else{
        redirect('admin');
      }
    }


//=============================

    
public function user_add(){
  if($this->session->userdata('SESSION_ADMIN_ID')){
        $this->data['title'] = 'User Add Form';
        $this->data['page']='add-user';
        $this->data['user_role'] = $this->admin_panel_model->get_user_role();
        $this->data['submit_url'] = 'admin/save_user';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
        
        }
        else{        redirect('admin');
        }
        }
public function save_user(){
  //print_r($this->input->post());die;
    
            $this->form_validation->set_rules('fname', 'First Name','trim|required');
            $this->form_validation->set_rules('lname', 'Last Name','trim|required');
            $this->form_validation->set_rules('address', 'Address','trim|required');
            $this->form_validation->set_rules('phone', 'Phone','trim|required|max_length[10]|min_length[10]|is_unique[users.phone]'); 
            $this->form_validation->set_rules('usertype', 'User Type','required'); 
            $this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[users.email]');
           
            $this->form_validation->set_rules('password', 'Password','trim|required');
            $this->form_validation->set_rules('cpassword', 'Re-Type password','trim|required|matches[password]');
            if ($this->form_validation->run() === FALSE)
              {   
              //echo "hi";die;      
              $this->data['title'] = 'User Add Form';
              $this->data['page']='add-user';
              $this->data['user_role'] = $this->admin_panel_model->get_user_role();
              $this->data['submit_url'] = 'admin/save_user';
              $this->load->vars($this->data);
              $this->load->view($this->data['theme'].'/template');
              }
              else
                { 
                  //echo "1";die;  
                    if (empty($_FILES['profile_image']['name'])) {
                    $profilephoto= base_url().'uploads/user/profileimage/upload.jpg';
                      }
                  else{  
                        $config['upload_path'] = './uploads/user/profileimage/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $this->load->library('upload', $config);
                      if (!$this->upload->do_upload('profile_image')) {
                            $error = array('error' => $this->upload->display_errors());
                          }
                      else{
                          $data=$this->upload->data();
                          $profilephoto= base_url()."uploads/user/profileimage/".$data['file_name'];
                          }
                      }
                      //echo $profilephoto;die;  

                $email=$this->input->post('email');
                $username=$email;
                // $password=$this->input->post('lname', TRUE).rand();
                $usersdata = array(
                     'firstname' =>$this->input->post('fname'),
                     'lastname' => $this->input->post('lname'),
                     'address'=> $this->input->post('address'),
                     'phone' => $this->input->post('phone'),
                     'email'  =>  $this->input->post('email'),
                     'profile_image'=>$profilephoto,
                     'password' => md5($this->input->post('password')),
                     'company_name' => $this->input->post('companyname'),
                     'user_role' => $this->input->post('usertype'),
                     'about'=>$this->input->post('about'),
                     'status'=>1,
                     'verified'=>1
                    );
                 //print_r($usersdata);die;
                   $result = $this->admin_panel_model->user_add_db($usersdata);
                    
                        $user_type = $this->input->post('usertype');
                        $page = 'audiance';
                          if($user_type == 1){
                              $page = 'audiance';
                          }
                          else if($user_type == 2){
                              $page = 'contributor';
                          }
                          else if($user_type == 3){
                              $page = 'mixer';
                          }
                          else if($user_type == 4){
                              $page = 'producer';
                          }

                          if($result)
                            {

                      // if(!empty($email)){
                          
                      //     $this->load->library('encryption');
                      //     $this->load->library('TutorEmail');
                      //     $receiver_email = $email;
                      //     $data_view['firstname']= $this->input->post('fname', TRUE);
                      //     $data_view['lastname']= $this->input->post('lname', TRUE);
                      //     $data_view['username']= $receiver_email;
                      //     $data_view['password']= $password;
                      //    // $data_view['message'] = '<p>'.'Hi'.' '.ucfirst($this->input->post('fname')).' '.ucfirst($this->input->post('lname')).', </p><p>'.'Your Username is : '.$username .'  &  Your Password is: '. $password .'</p>';
                      //     $subject_receiver = 'Course Registration Acknowledgement';
                      //     $message=$this->load->view('mail_template/new_usermail',$data_view,true);
                      //     $res = $this->tutoremail->smtp_mail($receiver_email,$subject_receiver,$message);
                        
                      //         if($res=1)
                      //             {

                      //   $this->session->set_flashdata('success','User Added Successfully');
                      //         redirect('admin/user');
                      //   }}
                            $this->session->set_flashdata('success','User Added Successfully');
                             redirect('admin/'.$page);
                    }  else{
                        $this->session->set_flashdata('fail','Unsuccessfull to Add User...');
                         redirect('admin/'.$page);
                         }
                      }
                    
                   }
public function user_edit($id){
    if($this->session->userdata('SESSION_ADMIN_ID')){
        $this->data['title'] = 'User Edit';
        $this->data['page']='edituser';
        $this->data['user_id'] = $id;
        $this->data['user_role'] = $this->admin_panel_model->get_user_role();
        $this->data['userdata'] = $this->admin_panel_model->user_show_db($id);
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
        }else{     redirect('admin');
        }
         }
public function update_user($id){
    if($this->session->userdata('SESSION_ADMIN_ID')){
         //print_r($this->input->post()); die;
           // echo "hi";die;
            //$id=$this->input->post('uid');
            $userdata= $this->admin_panel_model->user_show_db($id);
            $this->form_validation->set_rules('fname', 'First Name','trim|required');
            $this->form_validation->set_rules('lname', 'Last Name','trim|required');
             $this->form_validation->set_rules('address', 'Address','trim|required');
            $this->form_validation->set_rules('phone', 'Phone','trim|required|max_length[10]|min_length[10]'); 
            $this->form_validation->set_rules('usertype', 'User Type','required'); 
            $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password','trim|required');
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
                    $this->data['title'] = 'User Edit';
                    $this->data['page']='edituser';
                    $this->data['user_id'] = $id;
                    $this->data['user_role'] = $this->admin_panel_model->get_user_role();
                    $this->data['userdata'] = $this->admin_panel_model->user_show_db($id);
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
                          $data=$this->upload->data();
                          $profilephoto= base_url()."uploads/user/profileimage/".$data['file_name'];
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
                          
                  // print_r($usersdata);die;
                  $res_id=$this->admin_panel_model->user_edit_db($id,$usersdata);
                      
                        $user_type = $this->input->post('usertype');
                        $page = 'audiance';
                          if($user_type == 1){
                              $page = 'audiance';
                          }
                          else if($user_type == 2){
                              $page = 'contributor';
                          }
                          else if($user_type == 3){
                              $page = 'mixer';
                          }
                          else if($user_type == 4){
                              $page = 'producer';
                          }

                 
                   if($res_id){           
                      $this->session->set_flashdata('success','User updated Successfully');
                      redirect('admin/'.$page);
                    }
                  else{
                    $this->session->set_flashdata('success','User updated Successfully');
                    redirect('admin/'.$page);
                      }
                    }
                  }
               else{        redirect('admin');
                }
            }
public function user_delete($user_id){
        //print_r($id=$this->input->post('rmvfile'));die;
        $id=$this->input->post('rmvfile');
        $userdata = array(
            'status' => 0
        );
        $this->admin_panel_model->user_edit_db($user_id,$userdata);
        // $userdata= $this->admin_panel_model->user_show_db($id);
        //     $user_type=$userdata->type;
        //                    $page = 'audiance';
        //                   if($user_type == 1){
        //                       $page = 'audiance';
        //                   }
        //                   else if($user_type == 2){
        //                       $page = 'contributor';
        //                   }
        //                   else if($user_type == 3){
        //                       $page = 'mixer';
        //                   }
        //                   else if($user_type == 4){
        //                       $page = 'producer';
        //                   }
                 
        // $this->session->set_flashdata('success','user Deleted Successfully');
        // redirect('admin/'.$page);
        }


}
?>
