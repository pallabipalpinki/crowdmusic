<?php
if(session_userdata('SESSION_USER_ID')){

  $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>session_userdata('SESSION_USER_ID')));
  $this->data['profile_url']=$user_slug->slug_url_value;

  if(in_array($module, array('home','album','user','profile','contents','message'))){
     $this->load->view($theme . '/includes/header',$this->data);
     $this->load->view($theme . '/modules/' . $module .'/'.$page);   
     $this->load->view($theme . '/includes/footer');
  }
  else{
      if($module=="user"){
        $this->load->view($theme . '/modules/' . $module .'/'.$page);   
      }
  }
}else{ 
  if(in_array($module, array('home','album','user','profile','contents'))){
       $this->load->view($theme . '/includes/header');
       $this->load->view($theme . '/modules/' . $module .'/'.$page);   
       $this->load->view($theme . '/includes/footer');
  }
  else{
    if($module=="user"){
      $this->load->view($theme . '/modules/' . $module .'/'.$page);   
    }
  }
}
?>