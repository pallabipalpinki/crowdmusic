<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'common';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin-category'] = 'admin/admin/category';
$route['admin-category-add'] = 'admin/admin/category_add';
$route['admin-save-category'] = 'admin/admin/save_category';
$route['admin-category-edit/(:num)'] = 'admin/admin/category_edit/$1';
$route['admin-category-update'] = 'admin/admin/update_category';
$route['admin-category-status/(:num)'] = 'admin/admin/category_status/$1';
$route['admin-category-delete/(:num)'] = 'admin/admin/category_delete/$1';


$route['admin'] = 'admin/admin/index';
$route['admin-login'] = 'admin/admin/login';
$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin-logout'] = 'admin/admin/logout';
$route['admin/user'] = 'admin/admin/user';

$route['admin/user-add'] = 'admin/admin/user_add';
$route['admin/save-user'] = 'admin/admin/save_user';
$route['admin/audiance'] = 'admin/admin/audiance';
$route['admin/contributor'] = 'admin/admin/contributor';
$route['admin/mixer'] = 'admin/admin/mixer';
$route['admin/producer'] = 'admin/admin/producer';
$route['admin/useredit/(:num)'] = 'admin/admin/user_edit/$1';
$route['admin/edit/(:num)'] = 'admin/admin/update_user/$1';
$route['admin/user-delete/(:num)'] = 'admin/admin/user_delete/$1';

//============user===========
//$route['user/sign-up'] = 'user/user/sign_up';
//$route['user/save-user'] = 'user/user/save_user';
//$route['user-dashboard'] = 'user/dashboard';
$route['user/profile-edit/(:num)'] = 'user/dashboard/profile_edit/$1';
$route['user/profile-update'] = 'user/dashboard/profile_update';

$route['user-addlike'] ='Common/onLikeTracks';


$route['sign-up'] = 'user/User/indexSignup';
$route['save-user'] = 'user/user/onRegister';
$route['update-user'] = 'user/user/onUpdateProfile';
$route['follow-user'] = 'user/user/onFollowUsers';
// $route['user/save-user'] = 'user/user/save_user';

//$route['user-dashboard'] = 'user/dashboard';
// $route['profiles/(:any)/contents']	='user/Contentcuration/index';
// $route['profiles/(:any)/browse-contributors']	='user/user/browsecontributors';

$route['profiles/(:any)'] = 'user/User/indexPublicpage';
// $route['profiles/(:any)/contents']	='user/User/indexPublicpage';
// $route['profiles/(:any)/contributors']	='user/User/indexPublicpage';
$route['profiles/(:any)/(:any)'] = 'user/User/indexPublicpage';
$route['tracks/(:any)/(:any)'] = 'user/User/indexPublicpage';
// $route['user-login'] = 'user/dashboard/is_valid_login';
$route['user-login'] = 'user/User/onLogin';
$route['user-logout'] = 'user/User/onLogout';

$route['user-slogin']		=	'user/User/onGAuthURL';
$route['authsocial']		=	'user/User/onGAuthSocial';


$route['load_chat_users']	=	'user/Message/onLoadArtistsProducer';
$route['send_msg']	=	'user/Message/onSendMessage';
$route['load_msg']	=	'user/Message/onLoadMessages';

//======music============
$route['admin/genres'] = 'admin/admin/genres';
$route['admin/genres-add'] = 'admin/admin/genres_add';
$route['admin/save-genres'] = 'admin/admin/save_genres';
$route['admin/genres-edit/(:num)'] = 'admin/admin/genres_edit/$1';
$route['admin/genres-update'] = 'admin/admin/update_genres';
$route['admin/genres-status/(:num)'] = 'admin/admin/genres_status/$1';

$route['admin/genres-delete/(:num)'] = 'admin/admin/genres_delete/$1';
//==============albums==============
$route['admin/albums'] = 'admin/admin/albums';
//$route['admin/albums-add'] = 'admin/admin/albums_add';
//$route['admin/save-albums'] = 'admin/admin/save_albums';

$route['admin/albums-edit/(:num)'] = 'admin/admin/albums_edit/$1';
$route['admin/albums-update'] = 'admin/admin/update_albums';
$route['admin/albums-view/(:num)'] = 'admin/admin/albums_view/$1';
$route['admin/albums-delete/(:num)'] = 'admin/admin/albums_delete/$1';

$route['admin/albums-music-delete/(:num)'] = 'admin/admin/albums_music_delete/$1';


//============only tracks============
$route['admin/musictrack'] = 'admin/admin/musictrack';
$route['admin/tracks-music-delete/(:num)'] = 'admin/admin/albums_music_delete/$1';
$route['admin/musictrack-edit/(:num)'] = 'admin/admin/musictrack_edit/$1';
$route['admin/musictrack-update'] = 'admin/admin/update_musictrack';


//Front Music Upload

$route['upload_contents'] ='user/Contentcuration/onUploadAlbumsTracks';
$route['delete_contents']	='user/Contentcuration/onDeleteAlbumtracks';
$route['load_contents']	='user/Contentcuration/onLoadAlbumTrackList';
$route['load_contributorsong']	='user/user/LoadContributorTrackList';


//============
// $route['artist-detail-view/(:num)'] = 'common/artist_view/$1';
// $route['artists/(:any)'] = 'common/indexArtistview';
$route['artists/(:any)'] = 'user/User/indexPublicpage';
$route['album-track-view/(:num)/(:num)'] = 'common/album_track_view/$1/$2';





//-------------
//Global Search

$route['search_global']='user/Contentcuration/onSearchGlobal';

$route['(:any)']	=	'Common/indexCategories';

//=========admin category==========


