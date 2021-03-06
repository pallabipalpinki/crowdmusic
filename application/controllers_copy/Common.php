<?php

class Common extends CI_Controller{

  public function __construct() {

    parent::__construct();
    error_reporting(0);

    $this->data['title']          = 'crowd music';
    $this->data['theme']          = 'user';

    $this->load->model('user_panel_model');
    // $this->load->model('user_model');
    $this->load->model('contents_model');
  }

  public function index()
  {
   
    $this->data['page_title'] = 'Home';
    $this->data['module']  = 'home';
    $this->data['page'] = 'index';
    $artists=array();

    $_artists=$this->cm->get_artist();

    if(!empty($_artists)){
      foreach ($_artists as $key => $value) {
        $slug_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$value->content_user_id));

        $artists[]=array(
          'artists_id'=>$value->content_user_id,
          'artists_name'=>ucwords($value->firstname.' '.$value->lastname),
          'artists_image'=>$value->profile_image,
          'artists_profile'=>base_url().'artists/'.$slug_url->slug_value
        );
      }
    }

    $this->data['artists']=$artists;
  // $albums=$this->contents_model->get_albums();
   //print_r($albums);die;
    //$tracks=$this->contents_model->get_contents(array('status'=>'1'),'content_id');
     $tracks=$this->contents_model->get_contents();
      //echo '<pre>';print_r($tracks);die;
    if(!empty($tracks)){
      foreach ($tracks as $key => $value) {
        $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value->content_id,'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));

        //echo '<pre>';print_r($track_thumbs);
        $tracks_data[]=array(
          'content_id'=>$value->content_id,
          'content_user_id'=>$value->content_user_id,
          'content_track'=>$value->content_track,
          'content_image'=>$value->content_image,
          'content_track_name'=>$value->content_track_name,
          'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
          'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'far fa-thumbs-up':'far fa-thumbs-down'):'far fa-thumbs-up',
          'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':''
        );
      }
    }else{
      $tracks_data=array();
    }

    $this->data['tracks']=$tracks_data;
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

  }
  

  public function album_details()
  {
   
    $this->data['page_title'] = 'Album details';
    $this->data['module']  = 'album';
    $this->data['page'] = 'album_details';
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

  }


  public function indexArtistview()
  {
    $segment_1=$this->uri->segment(1,0);
    $segment_2=$this->uri->segment(2,0);

    if($segment_1!='0' && $segment_2!='0' && $segment_1=='artists' && is_string($segment_2)){

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

            $user_details=array(
                'user_name'=>ucwords($userdata->firstname .' '.$userdata->lastname),
                'user_fname'=>$userdata->firstname,
                'user_lname'=>$userdata->lastname,
                'user_email'=>$userdata->email,
                'user_phone'=>$userdata->phone,
                'user_address'=>$userdata->address,
                'user_about'=>$userdata->about,
                'user_role'=>$userdata->role_name,
                'user_created_at'=>date('jS F Y', strtotime($userdata->created_at)),
                'user_dp_image'=>(!empty($userdata->dp_image))?$userdata->dp_image:base_url().'assets/images/innercover.jpg',
                'user_profile_image'=>(!empty($userdata->profile_image))?$userdata->profile_image:base_url().'assets/images/innercover.jpg',
            );

            $this->data['artist_details']=$user_details;

            //$_artists=$this->cm->get_artist(TRUE);

            //echo '<pre>';print_r($_artists);die;
   
            $this->data['page_title']=$fullname.' | '.$settings_data_decoded->system_title;
            $this->data['module']  = 'home';
            $this->data['page'] = 'artistdetail_page';
            $artist_tracks=$this->contents_model->get_artist_music($user_id);

            //echo '<pre>';print_r($artist_tracks);die;

            if(!empty($artist_tracks)){
              foreach ($artist_tracks as $key => $value) {
                $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value['content_id'],'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));

                //echo '<pre>';print_r($track_thumbs);
                $tracks_data[]=array(
                  'content_id'=>$value['content_id'],
                  'content_user_id'=>$value['content_user_id'],
                  'content_track'=>$value['content_track'],
                  'content_image'=>$value['content_image'],
                  'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
                  'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'far fa-thumbs-up':'far fa-thumbs-down'):'far fa-thumbs-up',
                  'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':''
                );
              }
            }else{
              $tracks_data=array();
            }

            //echo '<pre>';print_r($tracks_data);die;
             $this->data['artist_tracks']=$tracks_data;
             $this->data['album']=$this->contents_model->get_album_music($user_id);
            $albums=$this->contents_model->get_album_music($user_id);
            //print_r($this->data['artist']);die;
           
            $this->load->vars($this->data);
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

  public function album_track_view($album_id,$artist_id)
  {
   
    $this->data['page_title'] = 'Album Songs';
    $this->data['module']  = 'home';
    $this->data['page'] = 'album_tracksdetail.php';
    $this->data['artist']=$this->contents_model->get_artist_music($artist_id);
    $tracks=$this->contents_model->get_album_music_track($artist_id,$album_id);
    // print_r($tracks);die;
    
    $tracks_data=array();
    if(!empty($tracks)){

      foreach ($tracks as $key => $value) {
        $track_thumbs=$this->um->checklike($value->content_id,session_userdata('SESSION_USER_ID'));
        $tracks_data[]=array(
                  'content_id'=>$value['content_id'],
                  'content_user_id'=>$value['content_user_id'],
                  'content_track'=>$value['content_track'],
                  'content_image'=>$value['content_image'],
                  'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
                  'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'far fa-thumbs-up':'far fa-thumbs-down'):'far fa-thumbs-up',
                  'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':''
                );
      }
    }else{
              $tracks_data=array();
            }
    $this->data['album']=$tracks_data;
    $albums=$tracks_data;
   // print_r($albums);die;
    
    // $albums=$this->contents_model->get_artist_music($artist_id);
    // print_r($albums);die;
    //$albums=$this->contents_model->get_album_music_track($artist_id,$album_id);
   
   
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

  }


  public function onLikeTracks(){
    if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){
      $d=post_data('d');
      $track_id=post_data('track_id');
      $artist_id=post_data('artist_id');

      //echo $d;

      $checklike = $this->um->checklike($track_id,session_userdata('SESSION_USER_ID'));

      

      $thumbsdata = array(
       'thumbs_track_id' =>$track_id,
       'thumbs_track_user_id' => $artist_id,
       'thumbs_user_id' => session_userdata('SESSION_USER_ID'),
       'thumbs_value'=> $d
      );

      //echo '<pre>';print_r($thumbsdata);die;

      if(empty($checklike)){
        $res_id=$this->um->user_add_like($thumbsdata);

        if($res_id!=''){
          $return['success']='';
        }else{
          $return['error']='';
        }
      }else{
        $res_id=$this->um->user_update_like($checklike->thumbs_id,$thumbsdata);

        if($res_id!=''){
          $return['success']='';
        }else{
          $return['error']='';
        }
      }

      json_header_encode($return);
    }else{
      redirect(base_url());
    }
  }




}

?>
