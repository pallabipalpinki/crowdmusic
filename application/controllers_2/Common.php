<?php

class Common extends CI_Controller{

  public function __construct() {

    parent::__construct();
    error_reporting(0);

    $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));
    $settings_data_decoded=json_decode($settings_data->settings_value);
    $this->data['title']          = $settings_data_decoded->system_title;
    $this->data['theme']          = 'user';

    $this->load->model('user_panel_model');
    // $this->load->model('user_model');
    $this->load->model('contents_model');
  }

  public function index()
  {
   
    $this->data['page_title'] = 'Home | '.$this->data['title'];
    $this->data['module']  = 'home';
    $this->data['page'] = 'index';
    $artists=array();

    $_artists=$this->cm->get_artist();
    //print_r( $_artists);die;
    if(!empty($_artists)){
      foreach ($_artists as $key => $value) {
        $slug_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$value->content_user_id));
        //print_r($value); die;
        if(!empty($value->user_specs)){
          $user_specs=$this->cm->get_content_concat_specs($value->user_specs);
          //print_r($user_specs);die;
          $user_specs_name=$user_specs->concat_name;         
        }else{
            $user_specs_name='';
        }

        $artists[]=array(
          'artists_id'=>$value->content_user_id,
          'artists_name'=>ucwords($value->firstname.' '.$value->lastname),
          'artists_image'=>$value->profile_image,
          'artists_profile'=>base_url().'artists/'.$slug_url->slug_value,
          'artist_spec'=>$user_specs_name
        );
      }
    }
    //print_obj($artists);die;

    $this->data['artists']=$artists;
    // $albums=$this->contents_model->get_albums();
   //print_r($albums);die;
    //phpinfo();die;
    $p['order']='content_id';
    $p['length']=10;

    $tparam['status']='1';
    //This needs to be changed
    $tracks=$this->cm->_get_contents_tracks($p,$tparam);

    //echo '<pre>';print_r($tracks);die;

    if(!empty($tracks)){
      foreach ($tracks as $key => $value) {
        $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value->content_id,'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));
        $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'),FALSE);

        //echo '<pre>';print_r($track_thumbs);

        $artist_profile_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$value->content_user_id));
       

        $tracks_data[]=array(
          'content_id'=>$value->content_id,
          'content_user_id'=>$value->content_user_id,
          'content_track_user_name'=>ucwords($value->firstname.' '.$value->lastname),
          'content_track_user_profile_url'=>$artist_profile_url->slug_url_value,
          'content_track'=>$value->content_track,
          'content_image'=>$value->content_image,
          'content_track_name'=>$value->content_track_name,
          'total_like_ct'=>$track_like_count,
          'like_by_logged_user'=>$track_thumbs->thumbs_value,
          'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
          'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'fas fa-thumbs-up':'fas fa-thumbs-down'):'far fa-thumbs-up',
          'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':'',
           'artists_image'=>$value->profile_image,
          'artists_profile'=>base_url().'artists/'.$slug_url->slug_value
        );
      }
    }else{
      $tracks_data=array();
    }

    $this->data['tracks']=$tracks_data;

    $content_categories=$this->cm->get_content_specs(array('spec_status'=>'1','spec_show_in_home_page'=>'1'),FALSE,'spec_serial');

    if(!empty($content_categories)){
      foreach ($content_categories as $key => $value) {
        $slug=$this->sm->get_slug(array('slug_type'=>'CATEGORIES','slug_type_id'=>$value->spec_id));
        $categories[]=array(
          'spec_name'=>$value->spec_name,
          'spec_url'=>$slug->slug_url_value,
          'spec_img'=>$value->spec_img
        );
      }
    }else{
      $categories=array();
    }

    $this->data['categories']=$categories;

    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

  }


    public function headercontributorlist(){

    $this->data['page_title'] = 'Artist | '.$this->data['title'];
    $this->data['module']  = 'home';
    $this->data['page'] = 'artistlisting';
    $artists=array();

   // $_artists=$this->cm->get_artist();
     $_artists=$this->um->get_contributor(array('user_role'=>2,'status'=>1));
    //print_r( $_artists);die;
    if(!empty($_artists)){
      foreach ($_artists as $key => $value) {
        $slug_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$value->id));
        //print_r($value); die;
        if(!empty($value->user_specs)){
          $user_specs=$this->cm->get_content_concat_specs($value->user_specs);
          //print_r($user_specs);die;
          $user_specs_name=$user_specs->concat_name;         
        }else{
            $user_specs_name='';
        }

        $artists[]=array(
          'artists_id'=>$value->id,
          'artists_name'=>ucwords($value->firstname.' '.$value->lastname),
          'artists_image'=>$value->profile_image,
          'artists_profile'=>base_url().'artists/'.$slug_url->slug_value,
          'artist_spec'=>$user_specs_name
        );
      }
    }
   // print_obj($artists);die;

    $this->data['artists']=$artists;

    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');


  }


  public function indexCategories(){
    $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));
    $settings_data_decoded=json_decode($settings_data->settings_value);

    $segment_1=$this->uri->segment(1,0);
    $current_url=current_url();

    if($segment_1!='0' && is_string($segment_1)){
      $slug=$this->sm->get_slug(array('slug_type'=>'CATEGORIES','slug_value'=>$segment_1,'slug_url_value'=>$current_url));
      
      if(!empty($slug)){
        $category=$this->cm->get_content_specs(array('spec_id'=>$slug->slug_type_id),TRUE);

        $page_title=ucwords($category->spec_name).' for Hire | '.$settings_data_decoded->system_title;

        $param['user_role']='2';
        $param['slug_type']='USER_PROFILE';
        $param['specs']=$slug->slug_type_id;

        $category_users=$this->um->_get_users($param,'id','ASC',10);

        //echo '<pre>';print_r($category_users);die;

        if(!empty($category_users)){

          foreach ($category_users as $key => $value) {

            $name=ucwords($value->firstname.' '.$value->lastname);

            $_category_users[]=array(
              'user_name'=>$name,
              'user_about'=>subsstring($value->about,80),
              'user_slug'=>$value->slug_url_value,
              'user_image'=>($value->profile_image!='')?$value->profile_image:base_url().'uploads/user/no.jpg'
            );
          }
          
        }else{
          $_category_users=array();
        }

        $content_categories=$this->cm->get_content_specs(array('spec_status'=>'1','spec_show_in_home_page'=>'1'),FALSE,'spec_serial');

        if(!empty($content_categories)){
          foreach ($content_categories as $key => $value) {
            $slug=$this->sm->get_slug(array('slug_type'=>'CATEGORIES','slug_type_id'=>$value->spec_id));
            $categories[]=array(
              'spec_id'=>$value->spec_id,
              'spec_name'=>ucwords($value->spec_name),
              'spec_url'=>$slug->slug_url_value,
              'selected'=>($slug->slug_value==$segment_1)?'selected':''
            );
          }
        }else{
          $categories=array();
        }

        $this->data['categories']=$categories;

        $this->data['category_users']=$_category_users;

        $this->data['geners']=$this->cm->get_genere();

        $this->data['category']=$category->spec_id;

        $this->data['module']       =   'home';
        $this->data['page']         =   'categories_page';
        $this->data['page_title']   =   $page_title;


        $this->load->vars($this->data);

        $this->load->view($this->data['theme'].'/template');


      }else{
        redirect(base_url());
      }


    }else{
      redirect(base_url());
    }
  }



  public function onLoadCategoryUsers_old(){
    //if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='GET'){

      $category=$this->uri->segment(2,0);
      $generes=$this->uri->segment(3,0);
      $offset=$this->uri->segment(4,0);
      $srch=$this->input->get('p');
      

      //echo $srch;die;

      $param['user_role']='2';
      $param['slug_type']='USER_PROFILE';
      $param['specs']=$category;

      if(!empty($srch)){
        $param['srch']=$srch;
      }

      if($generes>0){
        $param['generes']=$generes;
      }

      //print_obj($param);die;

      if($offset>0){
        $_offset=$offset;
      }else{
        $_offset='0';
      }

      $category_users=$this->um->_get_users($param,'id','ASC',10,$_offset);

     // print_obj($category_users);die;

      if(!empty($category_users)){

        foreach ($category_users as $key => $value) {

          $name=ucwords($value->firstname.' '.$value->lastname);
          $_category_users[]=array(
            'user_name'=>$name,
            'user_about'=>subsstring($value->about,80),
            'user_slug'=>$value->slug_url_value,
            'user_image'=>($value->profile_image!='')?$value->profile_image:base_url().'uploads/user/no.jpg'
          );
        }
        
      }else{
        $_category_users=array();
      }


      json_header_encode($_category_users);
    // }else{
    //   redirect(base_url());
    // }
  }


  public function onLoadCategoryUsers(){
    //if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='GET'){

      $category=$this->uri->segment(2,0);
      //$generes=$this->uri->segment(3,0);
      $offset=$this->uri->segment(3,0);
      $srch=$this->input->get('p');
      

      //echo $srch;die;

      $param['user_role']='2';
      $param['slug_type']='USER_PROFILE';
      if($category>0){
        $param['specs']=$category;
      }
      

      if(!empty($srch)){
        $param['srch']=$srch;
      }

      // if($generes>0){
      //   $param['generes']=$generes;
      // }

      //print_obj($param);die;

      if($offset>0){
        $_offset=$offset;
      }else{
        $_offset='0';
      }

      $category_users=$this->um->_get_users($param,'id','ASC',10,$_offset);

     // print_obj($category_users);die;

      if(!empty($category_users)){

        foreach ($category_users as $key => $value) {

          $name=ucwords($value->firstname.' '.$value->lastname);
          $_category_users[]=array(
            'user_name'=>$name,
            'user_about'=>subsstring($value->about,80),
            'user_slug'=>$value->slug_url_value,
            'user_image'=>($value->profile_image!='')?$value->profile_image:base_url().'uploads/user/no.jpg'
          );
        }
        
      }else{
        $_category_users=array();
      }


      json_header_encode($_category_users);
    // }else{
    //   redirect(base_url());
    // }
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
                $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'),FALSE);

                //echo '<pre>';print_r($track_thumbs);
                $tracks_data[]=array(
                  'content_id'=>$value['content_id'],
                  'content_user_id'=>$value['content_user_id'],
                  'content_track'=>$value['content_track'],
                  'content_image'=>$value['content_image'],
                  'total_like_ct'=>$track_like_count,
                  'like_by_logged_user'=>$track_thumbs->thumbs_value,
                  'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
                  'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'fas fa-thumbs-up':'fas fa-thumbs-down'):'far fa-thumbs-up',
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
   //echo "hi";die;
    $this->data['page_title'] = 'Album Songs';
    $this->data['module']  = 'home';
    $this->data['page'] = 'album_tracksdetail.php';

   

    $this->data['artist']=$this->contents_model->get_artist_music($artist_id);
    $tracks=$this->contents_model->get_album_music_track($artist_id,$album_id);
    $user_following=$this->um->get_user_follower_data(array('follow_user'=>session_userdata('SESSION_USER_ID'),'follow_user_id'=>$artist_id,'follow_status'=>'following'));

    $total_followers=$this->um->get_total_user_follower_data(array('follow_user_id'=>$artist_id,'follow_status'=>'following'));
    $total_tracks=$this->cm->get_total_tracks(array('content_user_id'=>$artist_id));
    $total_albums=$this->cm->get_total_albums(array('album_user_id'=>$artist_id));
    $user_details=array(
                  'user_following'=>(!empty($user_following) && $user_following->follow_status=='following')?'Following':'Follow',
                  'user_is_following_me'=>(($artist_id!=session_userdata('SESSION_USER_ID')))?'yes':'',
                  'user_followed_by_me'=>(!empty($user_following))?$user_following->follow_status:'unfollowed',
                 'user_total_followers'=>$total_followers,
                  'total_tracks'=>$total_tracks,
                  'total_albums'=>$total_albums,
                );
    
    $tracks_data=array();
    if(!empty($tracks)){

      foreach ($tracks as $key => $value) {

    $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value['content_id'],'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));
    $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value['content_id'],'thumbs_value'=>'up'),false);
     //print_r($track_thumbs);  //die;
        //$track_thumbs=$this->um->checklike($value->content_id,session_userdata('SESSION_USER_ID'));
         //$track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'),FALSE);
        $tracks_data[]=array(
                  'content_id'=>$value['content_id'],
                  'content_user_id'=>$value['content_user_id'],
                  'content_track'=>$value['content_track'],
                  'content_image'=>$value['content_image'],
                  'total_like_ct'=>$track_like_count,
                  'like_by_logged_user'=>$track_thumbs->thumbs_value,
                  'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
                  'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'fas fa-thumbs-up':'fas fa-thumbs-down'):'far fa-thumbs-up',
                  'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':''
                );
      }
    }else{
              $tracks_data=array();
            }
    $this->data['album']=$tracks_data;
     $this->data['user_details']=$user_details;
    $albums=$tracks_data;
  // print_r($albums);die;
    
    // $albums=$this->contents_model->get_artist_music($artist_id);
    // print_r($albums);die;
    //$albums=$this->contents_model->get_album_music_track($artist_id,$album_id);
   
    $this->data['album']=$tracks_data;
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
public function Contactus(){
   
    $this->data['page_title'] = 'Contact Us | '.$this->data['title'];
    $this->data['module']  = 'contact';
    $this->data['page'] = 'contactus';
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
}

    public function Aboutus(){ 
     $this->data['page_title'] = 'About Us | '.$this->data['title'];
     $this->data['module']  = 'contact';
     $this->data['page'] = 'aboutus'; 
     $this->load->vars($this->data);
     $this->load->view($this->data['theme'].'/template');

    }
    public function Faq(){
 
     $this->data['page_title'] = 'Faq | '.$this->data['title'];
     $this->data['module']  = 'contact';
     $this->data['page'] = 'faq'; 
     $this->load->vars($this->data);
     $this->load->view($this->data['theme'].'/template');

    }

    public function PrivacyPolicy(){
     $this->data['page_title'] = 'Privacy Policy | '.$this->data['title'];
     $this->data['module']  = 'contact';
     $this->data['page'] = 'privacypolicy'; 
     $this->load->vars($this->data);
     $this->load->view($this->data['theme'].'/template');

    }
}

?>
