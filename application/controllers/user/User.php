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


        $this->data['page_title'] = 'Register with '.$settings_data_decoded->system_title;
        $this->data['module'] = 'user';
        $this->data['page'] = 'add-user';
        $this->data['user_role'] = $this->um->get_user_role(array('role_status'=>'1'));
        $this->data['content_specs']=$this->cm->get_content_specs(array('spec_status'=>'1'));
        $this->data['submit_url'] = 'user/save_user';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function indexPublicpage(){

        $segment_1=$this->uri->segment(1,0);
        $segment_2=$this->uri->segment(2,0);
        $segment_3=$this->uri->segment(3,0);

        $user_details=array();

        $settings_data=$this->sm->get_settings(array('settings_key'=>'system_settings'));
        $settings_data_decoded=json_decode($settings_data->settings_value);

        if($segment_1!='0' && $segment_2!='0' && in_array($segment_1, array('profiles','tracks','artists')) && is_string($segment_2)){

            $exp=explode('-', $segment_2);
            $user_id=$exp[0];

            if(is_numeric($user_id)){
                $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id,'slug_value'=>$segment_2));

                if(!empty($user_slug)){
                    $userdata=$this->um->get_user(array('id'=>$user_id));

                   // echo '<pre>';print_r($userdata);die;

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

                        $user_following=$this->um->get_user_follower_data(array('follow_user'=>session_userdata('SESSION_USER_ID'),'follow_user_id'=>$user_id,'follow_status'=>'following'));

                        $total_followers=$this->um->get_total_user_follower_data(array('follow_user_id'=>$user_id,'follow_status'=>'following'));

                        $user_details=array(
                            'user_id'=>$userdata->id,
                            'user_name'=>$fullname,
                            'user_fname'=>$userdata->firstname,
                            'user_lname'=>$userdata->lastname,
                            'user_email'=>$userdata->email,
                            'user_phone'=>$userdata->phone,
                            'user_company_name'=>$userdata->company_name,
                            'user_address'=>$userdata->address,
                            'user_about'=>$userdata->about,
                            'user_roleid'=>$userdata->user_role,
                            'user_role'=>$userdata->role_name,
                            'user_created_at'=>date('jS F Y', strtotime($userdata->created_at)),
                            'user_profile_url'=>(session_userdata('SESSION_USER_ID') && ($userdata->id==session_userdata('SESSION_USER_ID')))?$user_slug->slug_url_value:'',
                            'user_profile_edit_url'=>(session_userdata('SESSION_USER_ID') && ($userdata->id==session_userdata('SESSION_USER_ID')))?$user_slug->slug_url_value.'/profiledit':'',
                            'user_content_url'=>(session_userdata('SESSION_USER_ID') && ($userdata->id==session_userdata('SESSION_USER_ID')) && $userdata->user_role!='4')?$user_slug->slug_url_value.'/contents':'',
                            'user_contributorlist_url'=>(session_userdata('SESSION_USER_ID') && ($userdata->id==session_userdata('SESSION_USER_ID')) && $userdata->user_role=='4')?$user_slug->slug_url_value.'/contributors':'',
                            'user_notification_url'=>(session_userdata('SESSION_USER_ID') && ($userdata->id==session_userdata('SESSION_USER_ID')))? base_url().'profile-home-newsline/'.$user_slug->slug_value :'',
                            'user_dp_image'=>(!empty($userdata->dp_image))?$userdata->dp_image:base_url().'assets/images/innercover.jpg',
                            'user_profile_image'=>(!empty($userdata->profile_image))?$userdata->profile_image:base_url().'assets/images/innercover.jpg',
                            'user_tracks'=>$tracks,
                            'user_genres'=>$user_geners,                            
                            'user_message_link'=>(session_userdata('SESSION_USER_ID') && ($userdata->id==session_userdata('SESSION_USER_ID')) && in_array($userdata->user_role, array(2,4)))?$user_slug->slug_url_value.'/messages':'',
                            'user_is_following_me'=>(($userdata->id!=session_userdata('SESSION_USER_ID')))?'yes':'',
                            'user_following'=>(!empty($user_following) && $user_following->follow_status=='following')?'Following':'Follow',
                            'user_followed_by_me'=>(!empty($user_following))?$user_following->follow_status:'unfollowed',
                            'user_total_followers'=>$total_followers
                        );
                    }
                }
            }


            if($segment_3=='0'){
                if($segment_1=='artists'){
                    $module  = 'home';
                    $page      ='artistdetail_page';

                    $artist_tracks=$this->cm->get_artist_music($user_id);

                    //echo '<pre>';print_r($artist_tracks);die;

                    $total_tracks=$this->cm->get_total_tracks(array('content_user_id'=>$user_id));
                    $total_albums=$this->cm->get_total_albums(array('album_user_id'=>$user_id));

                    if(!empty($artist_tracks)){
                      foreach ($artist_tracks as $key => $value) {
                    $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value['content_id'],'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));
                     $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value['content_id'],'thumbs_value'=>'up'),FALSE);
                     $track_comment_count=$this->cm->get_content_comment_count(array('content_track_id'=>$value->content_id),FALSE);

                        //echo '<pre>';print_r($track_thumbs);
                        $tracks_data[]=array(
                          'content_id'=>$value['content_id'],
                          'content_user_id'=>$value['content_user_id'],
                          'content_track'=>$value['content_track'],
                          'content_image'=>$value['content_image'],
                          'total_like_ct'=>$track_like_count,
                          'total_comment_count'=>$track_comment_count,
                          'like_by_logged_user'=>$track_thumbs->thumbs_value,
                          'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
                          'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'fas fa-thumbs-up':'fas fa-thumbs-down'):'far fa-thumbs-up',
                          'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':''
                           );
                      }
                    }else{
                      $tracks_data=array();
                    }

                    $user_details['album']=$this->cm->get_album_music($user_id);

                    $user_details['artist_tracks']=$tracks_data;

                    $user_details['total_tracks']=$total_tracks;
                    $user_details['total_albums']=$total_albums;
                }else if($segment_1=='profiles'){
                    $module  = 'profile';
                    if($userdata->user_role=='4'){
                        $page ='producer_profile';
                    }else{
                        $page ='index';
                    }
                }
                
                $page_title=$fullname.' | '.$settings_data_decoded->system_title;
            }else if($segment_3=='profiledit'){
                $user_roles=$this->um->get_user_role(array('role_status'=>'1'));

                foreach ($user_roles as $key => $value) {
                    $_user_roles[]=array(
                        'user_role_id'=>$value->role_id,
                        'user_role_name'=>$value->role_name,
                        'selected'=>($value->role_id==$userdata->user_role)?'selected':''
                    );
                }

                $content_specs=$this->cm->get_content_specs(array('spec_status'=>'1'));

                if($userdata->user_role=='2'){
                    if($userdata->user_specs!=null){
                        $user_specs[]=explode(',', $userdata->user_specs);
                    }else{
                        $user_specs=array();
                    }
                }else{
                    $_user_specs=array();
                }

                foreach ($content_specs as $_k => $_v) {
                    $_user_specs[]=array(
                        'spec_id'=>$_v->spec_id,
                        'spec_name'=>$_v->spec_name,
                        'selected'=>((!empty($user_specs) && is_array($user_specs)) && in_array($_v->spec_id, $user_specs[0]))?'selected':''
                    );
                }

                $slug_data=$this->sm->get_slug(array('slug_type'=>'CONTENT_TRACK_TAGS','slug_value'=>$segment_3));
                $track_data=$this->cm->get_content(array('content_id'=>$slug_data->slug_type_id));
                if(!empty($track_data)){
                    $page_title=$track_data->content_track_name.'('.$fullname.')'.' | '.$settings_data_decoded->system_title;
                }else{
                    $page_title=$fullname.' | '.$settings_data_decoded->system_title;
                }
                

                $user_details['user_roles']=$_user_roles;
                $user_details['user_specs']=$_user_specs;

                $module  = 'profile';
                $page ='profile_edit';

            }else if($segment_3=='messages'){
                if(in_array($userdata->user_role,array(2,4))){
                    $module  = 'message';
                    $page ='index';
                    $page_title=$fullname.' | '.$settings_data_decoded->system_title;
                }else{
                    redirect($user_slug->slug_url_value);
                } 
            }else if($segment_3=='contents'){
                if(in_array($userdata->user_role,array(2))){
                    $module  = 'contents';
                    $page ='index';
                    $page_title=$fullname.' (Contents) | '.$settings_data_decoded->system_title;
                    $this->data['content_generes']=$this->cm->get_genere(array('status'=>'1'));
                }else{
                    redirect($user_slug->slug_url_value);
                }     
            }else if($segment_3=='contributors'){
                $module  = 'profile';
                $page ='contributorshow';
                $page_title=$fullname.' (Contributors) | '.$settings_data_decoded->system_title;

                $this->data['contributorsonglist'] =$this->um->get_contributorsonglist(array('users.user_role'=>2));
                $this->data['contributordata'] =$this->um->get_contributor(array('user_role'=>2));
                $this->data['content_generes']=$this->cm->get_genere(array('status'=>'1'));
            }


           // echo $page;die;

            //echo '<pre>';print_r($user_details);

            $this->data['module']       =   $module;
            $this->data['page']         =   $page;
            $this->data['page_title']   =   $page_title;
            $this->data['user_details'] =   $user_details;

            $this->load->vars($this->data);

            $this->load->view($this->data['theme'].'/template');

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
                            'SESSION_USER_EMAIL'=>$userdata->email,
                            'SESSION_USER_Firstname'=>$userdata->firstname,
                            'SESSION_USER_Lastname'=>$userdata->lastname 
                        );

                        session_set_userdata($session_data);

                        $this->um->update_user(array('online_status'=>'online'),array('id'=>$userdata->id));

                        $user_slug_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$userdata->id));

                        if($userdata->user_role>0){
                            //$redirect_url=$user_slug_url->slug_url_value;
                            $redirect_url=base_url().'profile-home-newsline/'.$user_slug_url->slug_value;
                        }else{
                            $redirect_url=$user_slug_url->slug_url_value.'/profiledit';

                        }

                        $return['success']='Logged in successfully';
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




public function indexLandingpage()
{
   $this->data['title'] = 'Newslines';
    $this->data['page_title'] = 'Profile | '.$this->data['title'];
    $this->data['module']  = 'profile';
    $this->data['page'] = 'loginlandingpage';
    $artists=array();

    $loged_user_data=$this->um->get_user(array('id'=>session_userdata('SESSION_USER_ID')));

    $_artists=$this->cm->get_artist(FALSE,4);
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
     $toptracks=$this->cm->get_top_contents();
    //echo '<pre>';print_r($tracks);die;

    if(!empty($toptracks)){
      foreach ($toptracks as $key => $value) {
        $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value->content_id,'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));
        $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'),FALSE);
         $track_comment_count=$this->cm->get_content_comment_count(array('content_track_id'=>$value->content_id),FALSE);

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
          'total_comment_count'=>$track_comment_count,
          'like_by_logged_user'=>$track_thumbs->thumbs_value,
          'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
          'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'fas fa-thumbs-up':'fas fa-thumbs-down'):'far fa-thumbs-up',
          'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':'',
           'artists_image'=>$value->profile_image,
          'artists_profile'=>base_url().'artists/'.$slug_url->slug_value
        );
      }
    }elseif(!empty($tracks)){
      foreach ($tracks as $key => $value) {
        $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value->content_id,'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));
        $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'),FALSE);
 $track_comment_count=$this->cm->get_content_comment_count(array('content_track_id'=>$value->content_id),FALSE);

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
          'total_comment_count'=>$track_comment_count,
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


    $comments_tracks=$this->cm->get_comments(array('commnet_track_user_id'=>session_userdata('SESSION_USER_ID')),'comment_id','DESC',10,null,TRUE,'content_id');

   // print_obj($comments_tracks);die;

    if(!empty($comments_tracks)){
        foreach ($comments_tracks as $key => $value) {

            $comments=$this->cm->get_comments(array('commnet_track_user_id'=>session_userdata('SESSION_USER_ID'),'content_track_id'=>$value->content_id),'comment_id','DESC',10);

            $tracks_up=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'));
            $tracks_down=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'down'));

            $_comments[$value->content_id][]=array(
                'logged_in_user_image'=>$loged_user_data->profile_image,
                'comment_track_user'=>$value->content_user_id,
                'comment_track'=>ucwords($value->content_track_name),
                'comment_content_image'=>$value->content_image,
                'comment_track_thumbs_up'=>$tracks_up,
                'comment_track_thumbs_down'=>$tracks_down,
                'comments'=>$comments
            );
        }
    }else{
        $_comments=array();
    }


    //print_obj($_comments);die;

    $this->data['comments']=$_comments;




//===NEW ARTIST LOGIN=============
   $user_data=$this->um->get_users(array('status'=>1),'created_at','desc',10,0,FALSE);

  //print_obj($user_data);die;

    if(!empty($user_data)){
                    foreach ($user_data as $key => $value) {

                        $user_name=ucwords($value->firstname.' '.$value->lastname);
                        $user_image=(!empty($value->profile_image) && $value->profile_image!='')?$value->profile_image:base_url('uploads/user/no.jpg');

                    $artist_profile_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$value->id));

                        $userdata[]=array(
                            'user_id'=>$value->id,
                            'user_type'=>$value->user_role,
                            'user_role_name'=>$value->role_name,
                            'user_name'=>$user_name,
                            'user_image'=>$user_image,
                            'user_about'=>$value->about,
                            'artists_profile'=>$artist_profile_url->slug_url_value,
                            'logindate'=>$value->created_at,
                            'user_online_status'=>$value->online_status
                        );
                    }
                }else{
                    $userdata=array();
                }


   // print_obj($userdata);die;

    $this->data['newuserdata']=$userdata;

//=============uploaded track ===================================
    $p['order']='content_id';
    $p['length']=10;

    $tparam['status']='1';
    //This needs to be changed
    $newtrack=$this->cm->_get_contents_tracks($p,$tparam);
    //print_obj($newtrack);die;

    if(!empty($newtrack)){
      foreach ($newtrack as $key => $value) {
        $track_thumbs=$this->cm->get_content_thumbs(array('thumbs_track_id'=>$value->content_id,'thumbs_user_id'=>session_userdata('SESSION_USER_ID')));
        $track_like_count=$this->cm->get_content_thumbsup_count(array('thumbs_track_id'=>$value->content_id,'thumbs_value'=>'up'),FALSE);

        // echo '<pre>';print_r($track_thumbs);
        // echo '=============';
        // echo '<pre>';print_r($track_like_count);die;


        $artist_profile_url=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$value->content_user_id));
       

        $newtracks_data[]=array(
          'content_id'=>$value->content_id,
          'content_user_id'=>$value->content_user_id,
          'content_track_user_name'=>ucwords($value->firstname.' '.$value->lastname),
          'content_track_user_profile_url'=>$artist_profile_url->slug_url_value,
          'content_track'=>$value->content_track,
          'content_image'=>$value->content_image,
          'content_track_name'=>$value->content_track_name,
          'content_about'=>$value->content_about,
          'uploaddate'=>$value->created_at,
          'total_like_ct'=>$track_like_count,
          'like_by_logged_user'=>$track_thumbs->thumbs_value,
          'content_thumbs'=>($track_thumbs->thumbs_value=='up')?'liked':'',
          'content_thumbs_icon'=>(!empty($track_thumbs))?(($track_thumbs->thumbs_value=='up')?'fas fa-thumbs-up':'fas fa-thumbs-down'):'far fa-thumbs-up',
          'content_login_toggle'=>(!session_userdata('SESSION_USER_ID'))?'onclick="openSignin()"':'',
           'artists_image'=>$value->profile_image
          );
      }
    }else{
      $newtracks_data=array();
    }
   //print_obj($newtracks_data);die;

    $this->data['newtracks']=$newtracks_data;









    

    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

  }






    public function onLogout(){
        if(session_userdata('SESSION_USER_ID')){
            $user_id=session_userdata('SESSION_USER_ID');
            $userdata=$this->um->get_user(array('id'=>$user_id));
            $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id));
            $this->um->update_user(array('online_status'=>'offline'),array('id'=>$user_id));
            $session_values=array('SESSION_USER_ID','SESSION_USER_EMAIL','SESSION_USER_type');
            session_unset_userdata($session_values);
            if(!empty($user_slug) && $userdata->user_role!='4'){
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

            $user_specs=$this->input->post('userspeciality');

            //echo '<pre>';print_r($user_specs);die;

            if(!empty($user_specs)){
                foreach ($user_specs as $key => $value) {
                    $_user_specs[]=$value;
                }

                $user_speciality=implode(',', $_user_specs);                
            }else{
                $user_speciality=null;
            }

            $duplicate_data=$this->um->get_duplicate_user(null,array('email'=>$email,'phone'=>$phone));

            if($duplicate_data->counted==0){

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
                    'user_specs'=>$user_speciality,
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

                    $slug_data_to_store=array(
                        'slug_type'=>'USER_PROFILE',
                        'slug_type_id'=>$added,
                        'slug_value'=>$slug,
                        'slug_url_value'=>base_url().'profiles/'.$slug
                    );

                    $slug_added=$this->sm->add_slug($slug_data_to_store);

                    if($slug_added){
                        if(in_array($usertype, array(2,3,4))){
                            $_filter_data=$this->sm->get_filter(array('filter_type'=>'USER_NAMES','filter_type_id'=>$added));

                            if(empty($_filter_data)){
                                $filter_data=array(
                                    'filter_type'=>'USER_NAMES',
                                    'filter_type_id'=>$added,
                                    'filter_value'=>$fname.' '.$lname,
                                    'filter_url'=>base_url().'profiles/'.$slug
                                );

                                $this->sm->add_filter($filter_data);
                            }
                        }    
                    }

                    $return['success']='Thank you for your interest.You have registered successfully';


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

                $user_specs=$this->input->post('userspeciality');

                if(!empty($user_specs)){
                    foreach ($user_specs as $key => $value) {
                        $_user_specs[]=$value;
                    }

                    $user_speciality=implode(',', $_user_specs);                
                }else{
                    $user_speciality=null;
                }

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
                            'user_specs'=>$user_speciality,
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
                            'user_specs'=>$user_speciality,
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

                        if($slug_url){

                            //echo $usertype;die;

                            if(in_array($usertype, array(2,3,4))){
                                $_filter_data=$this->sm->get_filter(array('filter_type'=>'USER_NAMES','filter_type_id'=>$user_id));

                                $filter_data=array(
                                    'filter_type'=>'USER_NAMES',
                                    'filter_type_id'=>$user_id,
                                    'filter_value'=>$fname.' '.$lname,
                                    'filter_url'=>base_url().'profiles/'.$slug
                                );

                                if(!empty($_filter_data)){
                                    $this->sm->update_filter($filter_data,array('filter_type'=>'USER_NAMES','filter_type_id'=>$user_id));
                                }else{
                                    $this->sm->add_filter($filter_data);
                                }
                            }
                                
                        }


                        if($usertype!=session_userdata('SESSION_USER_TYPE')){
                            $session_data=array(
                                'SESSION_USER_ID'=>$user_id,
                                'SESSION_USER_TYPE'=>$usertype,
                                'SESSION_USER_EMAIL'=>$email,
                                'SESSION_USER_Firstname'=>$userdata->firstname,
                                    'SESSION_USER_Lastname'=>$userdata->lastname 
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

                        $slug_added=$this->sm->add_slug($slu_data_to_store);


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
                        //$redirect_url=$slug_url;
                        $redirect_url=base_url().'profile-home-newsline'.$user_slug->slug_value;
                    }else{
                        $redirect_url=$edit_url;
                    }

                    if($user_slug){
                        if(in_array($user_data->user_role, array(2,3,4))){
                            $_filter_data=$this->sm->get_filter(array('filter_type'=>'USER_NAMES','filter_type_id'=>$user_data->id));

                            $filter_data=array(
                                'filter_type'=>'USER_NAMES',
                                'filter_type_id'=>$user_data->id,
                                'filter_value'=>$user_data->firstname.' '.$user_data->lastname,
                                'filter_url'=>$slug_url
                            );

                            if(!empty($_filter_data)){
                                $this->sm->update_filter($filter_data,array('filter_type'=>'USER_NAMES','filter_type_id'=>$user_data->id));
                            }else{
                                $this->sm->add_filter($filter_data);
                            }
                        }       
                    }

                    $session_data=array(
                        'SESSION_USER_ID'=>$user_data->id,
                        'SESSION_USER_TYPE'=>$user_data->user_role,
                        'SESSION_USER_EMAIL'=>$user_data->email,
                        'SESSION_USER_Firstname'=>$userdata->firstname,
                        'SESSION_USER_Lastname'=>$userdata->lastname 
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


    public function onFollowUsers(){
        if(session_userdata('SESSION_USER_ID')){
            if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){
                $follower_id=session_userdata('SESSION_USER_ID');

                $user_id=post_data('_u');

                $follow_status=post_data('follow_status');

                if($follow_status=='unfollowed'){
                    $fstatus='following';
                }else{
                    $fstatus='unfollowed';
                }

                $user_data=$this->um->get_user(array('id'=>$user_id));

                $get_follow_data=$this->um->get_user_follower_data(array('follow_user_id'=>$user_id,'follow_user'=>$follower_id));

                if(empty($get_follow_data)){
                    $follow_data=array(
                        'follow_user_id'=>$user_id,
                        'follow_user'=>$follower_id,
                        'follow_user_type'=>$user_data->user_role,
                        'follow_status'=>$fstatus
                    );
                    $added=$this->um->add_user_follower_data($follow_data);
                }else{
                    $follow_data=array(
                        'follow_user_id'=>$user_id,
                        'follow_user'=>$follower_id,
                        'follow_user_type'=>$user_data->user_role,
                        'follow_status'=>$fstatus,
                        'updated_at'=>date('Y-m-d')
                    );
                    $added=$this->um->update_user_follower_data($follow_data,array('follow_user_id'=>$user_id,'follow_user'=>$follower_id));
                }

                if($added){
                    $return['response']='success';
                }else{
                    $return['response']='error';
                }

                json_header_encode($return);

             }else{
                redirect(base_url());
             }
        }else{
            redirect(base_url());
        }
         
    }


    public function LoadContributorTrackList(){
        if($this->session->userdata('SESSION_USER_ID')){
                if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

                    $contributor_id=$this->security->xss_clean($this->input->post('contributor_id'));

                   
                        $content=$this->cm->_get_contents_tracks(NULL,array('status'=>'1','content_user_id'=>$contributor_id),FALSE,FALSE);

                        // echo '<pre>';print_r($content);

                        header('Content-Type: application/json; charset=utf-8');

                       echo json_encode($content);
                  
                }else{
                    return(base_url());
                }
            }else{
                return(base_url());
            }
    }




    /*
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

                                $fullname=ucwords($userdata->firstname .' '.$userdata->lastname);

                                $user_details=array(
                                    'user_name'=>$fullname,
                                    'user_fname'=>$userdata->firstname,
                                    'user_lname'=>$userdata->lastname,
                                    'user_email'=>$userdata->email,
                                    'user_phone'=>$userdata->phone,
                                    'user_company_name'=>$userdata->company_name,
                                    'user_address'=>$userdata->address,
                                    'user_about'=>$userdata->about,
                                    'user_roleid'=>$userdata->user_role,
                                    'user_role'=>$userdata->role_name,
                                    'user_created_at'=>date('jS F Y', strtotime($userdata->created_at)),
                                    'user_profile_url'=>$user_slug->slug_url_value,
                                    'user_profile_edit_url'=>(session_userdata('SESSION_USER_ID'))?$user_slug->slug_url_value.'profiledit':'',
                                    'user_content_url'=>$user_slug->slug_url_value.'/contents',
                                    'user_contributorlist_url'=>(session_userdata('SESSION_USER_ID')!='2')?$user_slug->slug_url_value.'/browse-contributors':'',
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
    */


}