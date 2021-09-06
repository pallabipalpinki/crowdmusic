jQuery(function($) {
  "use strict";

  

  //setup before functions
  var ctypingTimer1;                //timer identifier
  var cdoneTypingInterval1 = 0.1;  //time in ms, 5 second for example
  var $cinput1 = $('#system_srch_param');

  //on keyup, start the countdown
  $cinput1.on('keyup', function () {
    $('div#cate_list').html('');
    clearTimeout(ctypingTimer);
    ctypingTimer1 = setTimeout(load_categories, cdoneTypingInterval1);
    //doneTyping();
  });

  //on keydown, clear the countdown 
  $cinput1.on('keydown', function () {
    $('div#cate_list').html('');
   clearTimeout(ctypingTimer1);
   ctypingTimer1 = setTimeout(load_categories, cdoneTypingInterval1);
  });

  $cinput1.on('paste', function () {
    // clearTimeout(typingTimer);
    // typingTimer = setTimeout(doneTyping2, doneTypingInterval);
    $('div#cate_list').html('');
    load_chatters();
  });

  $cinput1.on('cut', function () {
    clearTimeout(ctypingTimer);
   ctypingTimer1 = setTimeout(load_categories, cdoneTypingInterval1);
  });

  // $('body').on('change','#system_genere',function(){
  //   load_categories();
  // });

  $('body').on('change','#system_category',function(){
    load_categories();
  });


  function load_categories(){
    var html='';
    var cat=$('#system_category :selected').val();
    var s=$cinput1.val();
    var o='0';
    $.ajax({
      type:'GET',
      url:base_url+'search_category/'+cat+'/'+o+'?p='+s,
      cache:false,
      beforeSend:function(){

      },
      success:function(d){
        if(d!=''){
          $.each(d,function(i,v){
            html+='<div class="col-md-3">';
            html+='<div class="artist-item">';
              html+='<div class="ai-img-wrapper">';
              html+='<img src="'+v.user_image+'" class="img-responsive" loading="lazy"/>';
              html+='</div>';
              html+='<div class="artist-box">';
              html+='<h3>'+v.user_name+'</a></h3>';
              html+='<div class="ai-price"><a href="'+v.user_slug+'">View Profile</a></div>';
              html+='<ul class="rating">';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star disable"></li>';
              html+='</ul>';
              html+='</div>';
              html+='<div class="artist-desc">';
              html+='<p>'+v.user_about+'</p>';
              html+='</div>';
            html+='</div>';
            html+='</div>';
          });            
        }

        $('div#cate_list').html(html);

        // $('div#cate_list').append(html);
      },complete:function(xhr,status){

      }
    });
  }

  function load_categories_old(){
    var html='';
    var g=$('#system_genere :selected').val();
    var s=$cinput1.val();
    var o='0';
    $.ajax({
      type:'GET',
      url:base_url+'search_category/'+c+'/'+g+'/'+o+'?p='+s,
      cache:false,
      beforeSend:function(){

      },
      success:function(d){
        if(d!=''){
          $.each(d,function(i,v){
            html+='<div class="col-md-3">';
            html+='<div class="artist-item">';
              html+='<div class="ai-img-wrapper">';
              html+='<img src="'+v.user_image+'" class="img-responsive" loading="lazy"/>';
              html+='</div>';
              html+='<div class="artist-box">';
              html+='<h3>'+v.user_name+'</a></h3>';
              html+='<div class="ai-price"><a href="'+v.user_slug+'">View Profile</a></div>';
              html+='<ul class="rating">';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star"></li>';
                html+='<li class="fa fa-star disable"></li>';
              html+='</ul>';
              html+='</div>';
              html+='<div class="artist-desc">';
              html+='<p>'+v.user_about+'</p>';
              html+='</div>';
            html+='</div>';
            html+='</div>';
          });            
        }

        $('div#cate_list').html(html);

        // $('div#cate_list').append(html);
      },complete:function(xhr,status){

      }
    });
  }


});