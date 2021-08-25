jQuery(function($) {
  "use strict";

  $(".messages").animate({ scrollTop: $(document).height() }, "fast");

  $("#profile-img").click(function() {
    $("#status-options").toggleClass("active");
  });

  $(".expand-button").click(function() {
   $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
  });

  $("#status-options ul li").click(function() {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");
    
    if($("#status-online").hasClass("active")) {
       $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
       $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
       $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
       $("#profile-img").addClass("offline");
    } else {
       $("#profile-img").removeClass();
    };
    
    $("#status-options").removeClass("active");
  });

  $.ajaxSetup({cache:false});

  function newMessage() {
  var message = $(".message-input input#msg").val();
  var reciever = $(".message-input input#reciever_id").val();
  var utype = $(".message-input input#utype").val();
  if($.trim(message) == '') {
    return false;
  }else{
    $.ajax({
       type:'POST',
       url:base_url+'send_msg',
       data:{message:message,u_type:u_type,reciever:reciever},
       success:function(d){

       }
    });
  }
  load_msgs(reciever);
  $('<li class="sent"><img src="'+sender_img+'" alt="" loading="lazy"/><p>' + message + '</p></li>').appendTo($('.messages ul'));
  $('.message-input input#msg').val(null);
  $('.contact.active .preview').html('<span>You: </span>' + message);
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");



  };

  $('.submit').click(function() {
  newMessage();
  });

  $('body').on('keydown','input#msg', function(e) {
  if (e.which == 13) {
  newMessage();
  return false;
  }
  });            

  $(window).on('load',function(d){
  load_chatters();
  });

  //setup before functions
  var ctypingTimer;                //timer identifier
  var cdoneTypingInterval = 0.1;  //time in ms, 5 second for example
  var $cinput = $('#search_chatters');

  //on keyup, start the countdown
  $cinput.on('keyup', function () {
  clearTimeout(ctypingTimer);
  ctypingTimer = setTimeout(load_chatters, cdoneTypingInterval);
  //doneTyping();
  });

  //on keydown, clear the countdown 
  $cinput.on('keydown', function () {
  clearTimeout(ctypingTimer);
  ctypingTimer = setTimeout(load_chatters, cdoneTypingInterval);
  });

  $cinput.on('paste', function () {
  // clearTimeout(typingTimer);
  // typingTimer = setTimeout(doneTyping2, doneTypingInterval);
  load_chatters();
  });

  $cinput.on('cut', function () {
  clearTimeout(ctypingTimer);
  ctypingTimer = setTimeout(load_chatters, cdoneTypingInterval);
  });

  //setInterval(function(){load_chatters();load_msgs($(".message-input input#reciever_id").val());},1000);

  function load_msgs(reciever){
  var mhtml='';
  var cimg='';
  $.ajax({
    type:'GET',
    url:base_url+'load_msg?reciever='+reciever,
    beforeSend:function(){

    },
    success:function(d){
       if(d!=''){
          $.each(d,function(i,v){
             if(v.msg_type=='sent'){
                //cimg=v.msg_sender_img;
                mhtml+='<li class="sent">';
                mhtml+='<img src="'+v.msg_sender_img+'" alt="" loading="lazy"/>';
                mhtml+='<p>'+v.msg_sent+'</p>';
                mhtml+='</li>';
             }else{
                //cimg=v.msg_reciever_img;
                mhtml+='<li class="replies">';
                mhtml+='<img src="'+v.msg_sender_img+'" alt="" loading="lazy"/>';
                mhtml+='<p>'+v.msg_sent+'</p>';
                mhtml+='</li>';
             }
             
          });
       }

       $('div.messages ul').html(mhtml);
    }
  });
  }

  function load_chatters(){
  var _searched_param=$cinput.val();
  var html='';
  $.ajax({
    type:'GET',
    url:base_url+'load_chat_users?u_type='+u_type+'&_searched_param='+_searched_param,
    data:{u_type:u_type},
    beforeSend:function(){

    },
    success:function(d){
       if(d!=''){
          $.each(d,function(i,v){

             var online_status='';

             if(v.user_online_status=='online'){
                online_status='';
             }

             html+='<li class="contact" data-utype_id="'+v.user_id+'" data-uname="'+v.user_name+'" data-img="'+v.user_image+'" data-utype="'+v.user_type+'" data-sutype="'+v.user_sender_type+'" data-last_msg="'+v.user_last_message+'">';
                html+='<div class="wrap">';
                   html+='<span class="contact-status '+v.user_online_status+'"></span>';
                   html+='<img src="'+v.user_image+'" alt="" loading="lazy"/>';
                   html+='<div class="meta">';
                      html+='<p class="name">'+v.user_name+'</p>';
                      html+='<p class="preview'+v.user_id+'">'+v.user_last_message+'</p>';
                   html+='</div>';
                html+='</div>';
             html+='</li>';
          });
       }else{
          html='';
       }

       $('#contacts ul').html(html);
    }
  });
  }


  $('body').on('click','li.contact',function(){
    var uid=$(this).attr('data-utype_id');
    var uname=$(this).attr('data-uname');
    var uimg=$(this).attr('data-img');
    var utype=$(this).attr('data-utype');
    var sutype=$(this).attr('data-sutype');
    var lst_msg=$(this).attr('data-last_msg');

    
    load_msgs(uid);
    $('#reciever_id').val(uid);
    $('#utype').val(uid);
    $('#selected_img').closest('img').attr('src',uimg);
    $('#selected_name').closest('p').text(uname);
    if(sutype=='2'){
      if(lst_msg=='No message'){
        $(".message-input input#msg").prop('disabled',true);
      }else{
        $(".message-input input#msg").prop('disabled',false);
      }      
    }else{
      $(".message-input input#msg").prop('disabled',false);
    }    
  });

});