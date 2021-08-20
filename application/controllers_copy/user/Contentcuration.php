<?php 
class Contentcuration extends CI_Controller{


		public function __construct() {

        parent::__construct(); 
        
        $this->data['theme']          = 'user';
        $this->load->model('user_panel_model');

        $this->load->library('Encryption','encrypt');
        $this->load->model('user_login_model');
    }


    public function index()
    {
    	//echo session_userdata('SESSION_USER_ID');die;


      if(session_userdata('SESSION_USER_ID')){
      	//echo 'hi';die;
        $segment_1=$this->uri->segment(1,0);
	      $segment_2=$this->uri->segment(2,0);
	      $segment_3=$this->uri->segment(3,0);

	      if($segment_1!='0' && $segment_2!='0' && $segment_3!='0' && $segment_1=='profiles' && is_string($segment_2) && $segment_3=='contents'){
	      	
	        $user_id=session_userdata('SESSION_USER_ID');

	        $user_slug=$this->sm->get_slug(array('slug_type'=>'USER_PROFILE','slug_type_id'=>$user_id,'slug_value'=>$segment_2));

	        if(!empty($user_slug)){
						$userdata=$this->um->get_user(array('id'=>$user_id));

						$user_details=array(
                'user_name'=>ucwords($userdata->firstname .' '.$userdata->lastname),
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
            );

		        $this->data['page_title'] = 'Edit Profile';
		        $this->data['page_title'] = 'Contents';
		        $this->data['module']  = 'contents';
		        $this->data['user_details']=$user_details;
		        $this->data['content_generes']=$this->cm->get_genere(array('status'=>'1'));
		        $this->data['page']  ='index';
		        $this->load->vars($this->data);
		        $this->load->view($this->data['theme'].'/template');
	        }else{
	        	redirect(base_url());
	        } 

	      }else{
	      	redirect(base_url());
	      }
      }
      else{

      	redirect(base_url());
      }  
    }


    public function onUploadAlbumsTracks(){
    	if(session_userdata('SESSION_USER_ID')){
					if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

						//$this->form_validation->set_rules('content_title', 'Title','trim|required');

						$content_id=$this->security->xss_clean($this->input->post('content_id'));	
						
						$content_type=$this->security->xss_clean($this->input->post('content_type'));				

						$title=$this->security->xss_clean($this->input->post('content_title'));

						$content_desc=$this->security->xss_clean($this->input->post('content_desc'));

						$content_folder=date('Y').'_'.session_userdata('SESSION_USER_ID');

						$media_disk_path=FCPATH.'uploads/'.$content_folder;

						if(!is_dir($media_disk_path)){
							mkdir($media_disk_path, 0777);
			            chmod($media_disk_path, 0777);
			            @touch($media_disk_path . '/' . 'index.html');
						}

					if($content_type=='1'){
							$content_genere=$this->security->xss_clean($this->input->post('content_genere'));

							if(!empty($content_id) && is_numeric($content_id)){
								$content_found=$this->cm->get_content(array('content_id'=>$content_id));

								if(!empty($content_found)){
									$content_data_to_add=array(
										'content_album_id'=>$content_album_id,
										'content_genere_id'=>$content_genere,
										'content_user_id'=>$this->session->userdata('SESSION_USER_ID'),
										'content_user_type'=>'2',
										'content_track_name'=>$title,
										'content_about'=>$content_desc,
										'updated_by'=>$this->session->userdata('SESSION_USER_ID'),
										'updated_at'=>date('Y-m-d H:i:s')
									);

									$updated=$this->cm->update_content_data($content_data_to_add,array('content_id'=>$content_id));

									if($updated){									

				            $this->load->library('image_lib');

										if(isset($_FILES['content_cover_image']) && $_FILES['content_cover_image']['name']!=''){
	                      $config['upload_path']   = $media_disk_path.'/';


	                      //echo $config['upload_path'];die;
	                      $new_name = strtotime(date('d-m-Y h:i:s')).$_FILES["content_cover_image"]['name'];
	                      $config['file_name'] = $new_name;
	                      $config['max_size']      = '10000';
	                      $config['allowed_types'] = 'jpg|jpeg|png';
	                      $this->load->library('upload');
	                      

	                      $this->upload->initialize($config);
	                     
	                        if ( ! $this->upload->do_upload('content_cover_image')) {
	                        }else {
		                        if(is_file($content_found->content_image_disk_path)){
															@unlink($content_found->content_image_disk_path);
														}                        
	                          $uploadedImageCover = $this->upload->data();

	                          $path=$media_disk_path.'/'.$uploadedImageCover['file_name'];

	                          $relative_path=base_url().'uploads/'.$content_folder.'/'.$new_name;
	                          $disk_path=$path;

	                          $this->resizeImage($path,$path,'366','365');
	                          $this->cm->update_content_data(array('content_image'=>$relative_path,'content_image_disk_path'=>$disk_path),array('content_id'=>$content_id));
	                        }
	                  }

	                  if(isset($_FILES['content_track']) && $_FILES['content_track']['name']!=''){
	                      $config2['upload_path']   = $media_disk_path.'/';

	                      //echo $config['upload_path'];die;
	                      $new_name2 = strtotime(date('d-m-Y h:i:s')).$_FILES["content_track"]['name'];
	                      $config2['file_name'] = $new_name2;
	                      $config2['max_size']      = '30000';
	                      $config2['allowed_types'] = 'mp3';
	                      $this->load->library('upload');

	                      $this->upload->initialize($config2);
	                     
	                        if ( ! $this->upload->do_upload('content_track')) {
	                        	// $error = array('error' => $this->upload->display_errors());

	                        	// echo '<pre>';print_r($error);die;
	                        }else {                          
	                          if(is_file($content_found->content_track_disk_path)){
															@unlink($content_found->content_track_disk_path);
														}

	                          $path=$media_disk_path.'/'.$new_name2;

	                          $relative_path=base_url().'uploads/'.$content_folder.'/'.$new_name2;
	                          $disk_path=$path;

	                          $this->cm->update_content_data(array('content_track'=>$relative_path,'content_track_disk_path'=>$disk_path),array('content_id'=>$content_id));
	                        }
	                  }

	                  $return['success']='Track Updated successfully';
									}else{
										$return['error']='Track not updated.';
									}
								}else{
									$return['error']='Track not found in the system';
								}
							}else{
								$content_found=$this->cm->get_content(array('content_genere_id'=>$content_genere,'content_track_name'=>$title));

								if(empty($content_found)){

									if($this->input->post('content_album_id')){
										$content_album_id=$this->security->xss_clean($this->input->post('content_album_id'));
									}else{
										$content_album_id=NULL;
									}

									$content_data_to_add=array(
										'content_album_id'=>$content_album_id,
										'content_genere_id'=>$content_genere,
										'content_user_id'=>$this->session->userdata('SESSION_USER_ID'),
										'content_user_type'=>'2',
										'content_track_name'=>$title,
										'content_about'=>$content_desc,
										'created_by'=>$this->session->userdata('SESSION_USER_ID'),
										'created_at'=>date('Y-m-d H:i:s')
									);

									//echo '<pre>';print_r($content_data_to_add);die;

									$inserted=$this->cm->add_content_data($content_data_to_add);

									if($inserted){

				            $this->load->library('image_lib');

										if(isset($_FILES['content_cover_image']) && $_FILES['content_cover_image']['name']!=''){
	                      $config['upload_path']   = $media_disk_path.'/';


	                      //echo $config['upload_path'];die;
	                      $new_name = strtotime(date('d-m-Y h:i:s')).$_FILES["content_cover_image"]['name'];
	                      $config['file_name'] = $new_name;
	                      $config['max_size']      = '10000';
	                      $config['allowed_types'] = 'jpg|jpeg|png';
	                      $this->load->library('upload');
	                      

	                      $this->upload->initialize($config);
	                     
	                        if ( ! $this->upload->do_upload('content_cover_image')) {
	                        }else {                          
	                          $uploadedImageCover = $this->upload->data();

	                          $path=$media_disk_path.'/'.$uploadedImageCover['file_name'];

	                          $relative_path=base_url().'uploads/'.$content_folder.'/'.$new_name;
	                          $disk_path=$path;

	                          $this->resizeImage($path,$path,'366','365');
	                          $this->cm->update_content_data(array('content_image'=>$relative_path,'content_image_disk_path'=>$disk_path),array('content_id'=>$inserted));
	                        }
	                  }

	                  if(isset($_FILES['content_track']) && $_FILES['content_track']['name']!=''){
	                      $config2['upload_path']   = $media_disk_path.'/';

	                      //echo $config['upload_path'];die;
	                      $new_name2 = strtotime(date('d-m-Y h:i:s')).$_FILES["content_track"]['name'];
	                      $config2['file_name'] = $new_name2;
	                      $config2['max_size']      = '30000';
	                      $config2['allowed_types'] = 'mp3';
	                      $this->load->library('upload');

	                      $this->upload->initialize($config2);
	                     
	                        if ( ! $this->upload->do_upload('content_track')) {
	                        	// $error = array('error' => $this->upload->display_errors());

	                        	// echo '<pre>';print_r($error);die;
	                        }else {                          
	                          //$uploadedImageCover = $this->upload->data();

	                          $path=$media_disk_path.'/'.$new_name2;

	                          $relative_path=base_url().'uploads/'.$content_folder.'/'.$new_name2;
	                          $disk_path=$path;

	                          $this->cm->update_content_data(array('content_track'=>$relative_path,'content_track_disk_path'=>$disk_path),array('content_id'=>$inserted));
	                        }
	                  }

	                  $return['success']='Track added successfully';

									}else{
										$return['error']='There was a system error.Try later.';
									}

								}else{
									$return['error']='Title already taken';
								}
							}							

						}else if($content_type=='2'){						
							if(!empty($content_id) && is_numeric($content_id)){
								$content_found=$this->cm->get_album(array('album_id'=>$content_id));								

								if(!empty($content_found)){
									$content_data_to_add=array(
										'album_user_id'=>$this->session->userdata('SESSION_USER_ID'),
										'album_user_type'=>'2',
										'album_name'=>$title,
										'album_about'=>$content_desc,
										'updated_by'=>$this->session->userdata('SESSION_USER_ID'),
										'updated_at'=>date('Y-m-d H:i:s')
									);
									$updated=$this->cm->update_content_album($content_data_to_add,array('album_id'=>$content_id));

									if($updated){

				            	$this->load->library('image_lib');

											if(isset($_FILES['content_cover_image']) && $_FILES['content_cover_image']['name']!=''){
		                    $config['upload_path']   = $media_disk_path.'/';


		                    //echo $config['upload_path'];die;
		                    $new_name = strtotime(date('d-m-Y h:i:s')).$_FILES["content_cover_image"]['name'];
		                    $config['file_name'] = $new_name;
		                    $config['max_size']      = '10000';
		                    $config['allowed_types'] = 'jpg|jpeg|png';
		                    $this->load->library('upload');
	                    

	                    	$this->upload->initialize($config);
	                   
	                      if ( ! $this->upload->do_upload('content_cover_image')) {

	                      	$error = array('error' => $this->upload->display_errors());

	                      	echo '<pre>';print_r($error);die;
	                      }else {
		                      if(is_file($content_found->content_image_disk_path)){
														@unlink($content_found->content_image_disk_path);
													}                    
	                        $uploadedImageCover = $this->upload->data();

	                        $path=$media_disk_path.'/'.$uploadedImageCover['file_name'];

	                        $relative_path=base_url().'uploads/'.$content_folder.'/'.$new_name;
	                        $disk_path=$path;

	                        $this->resizeImage($path,$path,'366','365');
	                        $this->cm->update_album_data(array('album_image_file'=>$relative_path,'album_image_file_path'=>$disk_path),array('album_id'=>$content_id));
	                      }
	                		}

				              $return['success']='Album updated successfully';
				              $return['uploaded_album']=$content_id;
				                        
										}else{
											$return['error']='There was a system error.Try later.';
										}
								}else{
									$return['error']='Album not found in the system';
								}
							}else{
									$content_found=$this->cm->get_album(array('album_name'=>$title));

									if(empty($content_found)){

										$content_data_to_add=array(
											'album_user_id'=>$this->session->userdata('SESSION_USER_ID'),
											'album_user_type'=>'2',
											'album_name'=>$title,
											'album_about'=>$content_desc,
											'created_by'=>$this->session->userdata('SESSION_USER_ID'),
											'created_at'=>date('Y-m-d H:i:s')
										);

										$inserted=$this->cm->add_content_album($content_data_to_add);

										if($inserted){

				            	$this->load->library('image_lib');

											if(isset($_FILES['content_cover_image']) && $_FILES['content_cover_image']['name']!=''){
		                    $config['upload_path']   = $media_disk_path.'/';


		                    //echo $config['upload_path'];die;
		                    $new_name = strtotime(date('d-m-Y h:i:s')).$_FILES["content_cover_image"]['name'];
		                    $config['file_name'] = $new_name;
		                    $config['max_size']      = '10000';
		                    $config['allowed_types'] = 'jpg|jpeg|png';
		                    $this->load->library('upload');
	                    

	                    	$this->upload->initialize($config);
	                   
	                      if ( ! $this->upload->do_upload('content_cover_image')) {

	                      	$error = array('error' => $this->upload->display_errors());

	                      	echo '<pre>';print_r($error);die;
	                      }else {                          
	                        $uploadedImageCover = $this->upload->data();

	                        $path=$media_disk_path.'/'.$uploadedImageCover['file_name'];

	                        $relative_path=base_url().'uploads/'.$content_folder.'/'.$new_name;
	                        $disk_path=$path;

	                        $this->resizeImage($path,$path,'366','365');
	                        $this->cm->update_album_data(array('album_image_file'=>$relative_path,'album_image_file_path'=>$disk_path),array('album_id'=>$inserted));
	                      }
	                		}

				              $return['success']='Album added successfully';
				              $return['uploaded_album']=$inserted;
				                        
										}else{
											$return['error']='There was a system error.Try later.';
										}

									}else{
										$return['error']='Album already exits';
									}
							}


									
						}

						header('Content-Type: application/json; charset=utf-8');

						echo json_encode($return);


					}else{
						return(base_url());
				}
			}else{
				return(base_url());
			}
    }


    public function onDeleteAlbumtracks(){
    	if($this->session->userdata('SESSION_USER_ID')){
					if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

						$content_type=$this->security->xss_clean($this->input->post('_content_type'));
						$content_id=$this->security->xss_clean($this->input->post('_content_type_id'));


						if($content_type=='1'){

							$album_data=$this->cm->get_album(array('album_id'=>$content_id));

							if(!empty($album_data)){
								$tracks_data=$this->cm->get_contents(array('content_album_id'=>$content_id));

								$deleted=$this->cm->delete_content_album(array('album_id'=>$content_id));

								if($deleted){
									if(is_file($album_data->content_image_disk_path)){
										@unlink($album_data->content_image_disk_path);
									}
									if(!empty($tracks_data)){
										foreach ($tracks_data as $key => $value) {
											$tracksdeleted=$this->cm->delete_content_data(array('content_id'=>$value->content_id));
											if($tracksdeleted){
												if(is_file($value->content_image_disk_path)){
													@unlink($value->content_image_disk_path);
												}

												if(is_file($value->content_track_disk_path)){
													@unlink($value->content_track_disk_path);
												}
											}
										}
									}

									$return['success']='Album deleted from the system successfully';
								}else{
									$return['error']='Album not deleted from the system';
								}

									
							}else{
								$return['error']='Album not found in the system';
							}

						}else if($content_type=='2'){
							$tracks_data=$this->cm->get_content(array('content_id'=>$content_id));

							if(!empty($tracks_data)){
								$deleted=$this->cm->delete_content_data(array('content_id'=>$content_id));
								if($deleted){

									if(is_file($tracks_data->content_image_disk_path)){
										@unlink($tracks_data->content_image_disk_path);
									}

									if(is_file($tracks_data->content_track_disk_path)){
										@unlink($tracks_data->content_track_disk_path);
									}

									$return['success']='Track deleteed from the system successfully';
								}else{
									$return['error']='Track not deleted from the system';
								}
							}else{
								$return['error']='Track not found in the system';
							}
						}

						header('Content-Type: application/json; charset=utf-8');

						echo json_encode($return);

					}else{
						redirect(base_url());
					}	
				}else{
					redirect(base_url());
				}
    }


    public function onLoadAlbumTrackList(){
    	if($this->session->userdata('SESSION_USER_ID')){
				if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD')=='POST'){

					$content_type=$this->security->xss_clean($this->input->post('_content_type'));

					if($content_type=='1'){

						$content=$this->cm->_get_contents_albums(NULL,array('status'=>'1','album_user_id'=>$this->session->userdata('SESSION_USER_ID')),FALSE,FALSE);

						header('Content-Type: application/json; charset=utf-8');

						echo json_encode($content);

					}else if($content_type=='2'){

						$content=$this->cm->_get_contents_tracks(NULL,array('status'=>'1','content_user_id'=>$this->session->userdata('SESSION_USER_ID')),FALSE,FALSE);

						////echo '<pre>';print_r($content);

						header('Content-Type: application/json; charset=utf-8');

						echo json_encode($content);
					}

				}else{
					return(base_url());
				}
			}else{
				return(base_url());
			}
    }


   public function resizeImage($source_path,$target_path,$height,$width)
   {
      // $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;
      // $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => FALSE,
          'width' => $width,
          'height' => $height,
      );
   
      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
   
      $this->image_lib->clear();
   }

}