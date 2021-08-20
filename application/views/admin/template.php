<?php

if($this->session->userdata('SESSION_ADMIN_ID')){
  //echo "string";die;
  if($module=='user' || $module=='music'){
    //echo "ok";die;
    $this->load->view($theme . '/includes/header');
    $this->load->view($theme . '/modules/' . $module .'/'.$page);   
    $this->load->view($theme . '/includes/footer');
  }
}
else {     

    $this->load->view($theme . '/pages/login');

}

?>