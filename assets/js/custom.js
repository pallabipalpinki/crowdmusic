const loadtl = gsap.timeline();
if ($('.loding').length) {
  loadtl
    .to('.load-content', { duration: 0.3, x: '-100%', opacity: 0 }, 3)
    .to('.loding', { x: '-100%', ease: 'power2.in' })
    .from(
      '.header-bottom .logo, .header-nav > .home-section-menu li, #header .socials a',
      {
        y: 30,
        opacity: 0,
        stagger: 0.1,
        ease: 'back.out',
      }
    );
} else {
  loadtl.from(
    '.header-bottom .logo, .header-nav > .home-section-menu li, #header .socials a',
    {
      y: 30,
      opacity: 0,
      stagger: 0.1,
      ease: 'back.out',
    }
  );
}

var swiper = new Swiper(".singerlist", {
  effect: "coverflow",
  coverflowEffect: {
    rotate: 45,
    stretch: 0,
    depth: 200,
    modifier: 1,
    slideShadows: true
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  spaceBetween: -40,
  loop: true
});

$('.singers').flipster({
  style: 'carousel',
  spacing: -0.35,
  nav: false,
  buttons: true,
  loop: true,
});

$('.menu-toggler').click(function (e) {
  e.preventDefault();

  $('body').addClass('open-menu');
});

$('.menu-overlay, .menu-close').click(function () {
  $('body').removeClass('open-menu');
});

function fixedHeader() {
  var compact = false;
  var header = $('#header');
  var headerHeight = $('.header-area').outerHeight();
  var topHeaderHeight = $('.header-top').outerHeight();
  header.css('height', headerHeight);
  $(window).scroll(function () {
    if ($(window).scrollTop() > topHeaderHeight) {
      if (!compact) {
        header.addClass('fixed-header');
      }
      compact = true;
    } else {
      header.removeClass('fixed-header');
      compact = false;
    }
  });
}

$(window).resize(function () {
  fixedHeader();
});

$(window).trigger('resize');
let animCount = 0;
$('.onview').each(function () {
  const $elm = $(this);
  const elmTop = $elm.offset().top;
  const elmHeight = $elm.outerHeight();
  const elmBottom = elmTop + elmHeight;
  const $elmNext = $elm.next('.onview');

  if ($elmNext.length && $elmNext.offset().top === elmTop) {
    animCount++;
    $elmNext.css('transition-delay', 100 * animCount + 'ms');
  } else {
    animCount = 0;
  }

  $(window).scroll(function () {
    const windowHeight = $(window).height();
    const windowTop = $(window).scrollTop();
    const windowBottom = windowTop + windowHeight;
    //check to see if this current container is within viewport

    if (elmBottom >= windowTop && elmTop <= windowBottom) {
      $elm.addClass('viewed');
    }
  });
});

$(document).ready(function () {
  $('#artist_track').hide();
  $('#artist_album').show();
  $('#chkalbum').click(function () {
    $('#artist_track').hide();
    $('#artist_album').show();
    $('#chkalbum').attr('class', 'active');
    $('#chktrack').removeClass('active');
  });

  $('#chktrack').click(function () {
    $('#chktrack').attr('class', 'active');
    $('#chkalbum').removeClass('active');
    $('#artist_track').show();
    $('#artist_album').hide();
  });
});

function artistAlbumshow(url, u_id) {
  //alert(url);
  var html = '';
  $.ajax({
    url: url,
    method: 'POST',
    data: { u_id: u_id },
    beforeSend: function () {},
    success: function (data) {
      if (data.length > 0) {
        $('.music-list').html('');
        var html = '';
        $(data).each(function (i, data) {
          console.log(data.content_about);
          html = html + '';
        });
        $('.music-list').html(html);
      }
    }, // ends ajax call
  });
}

$('.player').each(function () {
  new SiriWave({
    container: this,
    width: $(this).innerWidth(),
    height: $(this).innerHeight() * 0.5,
    speed: 0.03,
    amplitude: 0.7,
    frequency: 2,
  });
});

var resize = function () {
  var height = $('.player').innerHeight() * 0.5;
  var width = $('.player').innerWidth();

  $('.player canvas').height(height);
  $('.player canvas').width(width);
};
window.addEventListener('resize', resize);
resize();

$('.player').click(function () {
  var caption = $(this).find('.caption');

  var audio = $(this).find('audio').get(0);
  if (audio.paused) {
    var allAudio = document.querySelectorAll('audio');
    allAudio.forEach((song) => {
      song.pause();
    });
    $('.player').removeClass('playing');

    audio.play();
    $(this).addClass('playing');

    var captionWidth = caption.outerWidth();
    caption.css('animation-duration', captionWidth * 22 + 'ms');
  } else {
    audio.pause();
    $(this).removeClass('playing');
  }
  $('.player audio').on('ended', function () {
    $(this).parents('.player').removeClass('playing');
  });
});

$('.home-section-menu a').on('click', function (event) {
  if (this.hash !== '') {
    event.preventDefault();
    var elm = this;
    var hash = this.hash;
    $('html, body').animate(
      {
        scrollTop: $(hash).offset().top,
      },
      1000,
      function () {
        $('.home-section-menu a').removeClass('active');
        $(elm).addClass('active');
      }
    );
  }
});

function playListInit() {
  console.log('playListInit');
  var music = $('.playlist audio')[0] || null;
  if (music !== null) {
    var musicListItem1 = $('.playlist .list li:first-child');
    var played = false;

    loadPlayer(musicListItem1);

    function playMusic() {
      music.play();
      $('#playPause').html('<i class="far fa-pause-circle"></i>');
      $('.playlist .list li.active')
        .addClass('played')
        .siblings()
        .removeClass('played');
      played = true;
    }
    function pauseMusic() {
      music.pause();
      $('#playPause').html('<i class="far fa-play-circle"></i>');
      $('.playlist .list li.active').removeClass('played');
      played = false;
    }
    function trackChange(element) {
      loadPlayer(element);

      if ($(element).hasClass('played')) pauseMusic();
      else playMusic();
    }

    function loadPlayer(element) {
      $(element).addClass('active').siblings().removeClass('active');

      var source = $(element).data('source');
      var cover = $(element).data('cover');
      var title = $(element).text();

      $('#trackSource').attr('src', source);
      music.load();
      $('#trackCover').attr('src', cover);
      $('#trackTitle').text(title);

      if ($('.playlist .list li.active').prev().length < 1)
        $('#previousTrack').attr('disabled', true);
      else $('#previousTrack').attr('disabled', false);

      if ($('.playlist .list li.active').next().length < 1)
        $('#nextTrack').attr('disabled', true);
      else $('#nextTrack').attr('disabled', false);
    }

    $('#playPause').click(function () {
      if (played) pauseMusic();
      else playMusic();
    });

    $('#previousTrack').click(function () {
      var previousTrack = $('.playlist .list li.active').prev();
      if (previousTrack.length) trackChange(previousTrack);
    });

    $('#nextTrack').click(function () {
      var nextTrack = $('.playlist .list li.active').next();
      if (nextTrack.length) trackChange(nextTrack);
    });

    $('.playlist .track_name').click(function () {
      var listitem = $(this).parent();
      trackChange(listitem);
    });
  }
}

playListInit();

$('[name=content_tags]').tagify();

$("#userspeciality").chosen({no_results_text: "Select Your Speciality"});

$('.favorite').click(function () {
  $(this).toggleClass('added');
});

$('.like-track').click(function () {
  if (_user_loggedin != '') {

    $(this).toggleClass('liked');
    var act = $(this).hasClass('liked');
    var track = $(this).attr('data-track');
    var artist = $(this).attr('data-artist');
    var l_count=parseInt($(this).attr('data-total-like-ct'));
    var like_value=$(this).attr('data-likeby-logged-user');
   //alert(like_value);
    var thumbsval = '';
    if (act) {
      thumbsval = 'up';
      $('#thumbs' + track).removeClass('fa-thumbs-down');
      $('#thumbs' + track).addClass('fas fa-thumbs-up');
       like_count=(like_value=='') ? l_count+1 : (like_value=='up') ? l_count : l_count+1;

      }else {
      thumbsval = 'down';
      $('#thumbs' + track).addClass('fas fa-thumbs-down');
      $('#thumbs' + track).removeClass('fa-thumbs-up');
      like_count=(like_value=='') ? l_count : (like_value=='down') ? l_count : l_count-1;
      }
    //alert(like_count);
    $.ajax({
      type: 'POST',
      url: base_url + 'user-addlike',
      data: { d: thumbsval, track_id: track, artist_id: artist },
      success: function (d) {
        $('#like_count'+track).html();
         $('#like_count'+track).html(like_count);
      },
      
    });
  } else {
    openSignin();
  }
});

$('.more_text > .more_btn').click(function (e) {
  e.preventDefault();
  $(this).parent().toggleClass('expanded');
  if ($(this).parent().hasClass('expanded')) {
    $(this).siblings().addClass('clamped');
    $(this).text('Read less');
  } else {
    setTimeout(() => {
      $(this).siblings().removeClass('clamped');
    }, 500);
    $(this).text('Read more');
  }
});

const $search = $('.search-fields');
$(document).mouseup((e) => {
  if (!$search.is(e.target) && $search.has(e.target).length === 0) {
    $search.removeClass('is-active');
  }
});

$('.search-group > a').on('click', (e) => {
  e.preventDefault();
  $search.addClass('is-active');
});

$('body').on('click','#btn_follow',function(){
  var u=$(this).attr('data-usr');
  var f=$(this).attr('data-usr_followed_by');
  var f_count=parseInt($(this).attr('data-follow_count'));
  var _f='';
  var txt='';
 //alert(u);alert(f);alert(f_count);
  if(f=='unfollowed'){
    _f='following';
    txt='Following';
    f_count=f_count+1;
  }else{
    _f='unfollowed';
    txt='Follow';
  }

  $.ajax({
    type:'POST',
    url:base_url+'follow-user',
    data:{_u:u,follow_status:f},
    success:function(d){
      if(d.response=='success'){
        $('#btn_follow').html('<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /></svg> '+txt);
        $('#btn_follow').attr('data-usr_followed_by',_f);
      }else if(d.response=='error'){
        $('#btn_follow').html('<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 0C17.0748 0 22 4.92525 22 11C22 17.0748 17.0748 22 11 22C4.92525 22 0 17.0748 0 11C0 4.92525 4.92525 0 11 0ZM5.5 12.375H9.625V16.5H12.375V12.375H16.5V9.625H12.375V5.5H9.625V9.625H5.5V12.375Z" fill="white" /></svg> Follow');
        $('#btn_follow').attr('data-usr_followed_by',_f);
      }
    },
    complete:function(xhr,ststus){
      $('#follow_count').html(f_count);
    }
  });

});
$('.comment-track').click(function(){
  console.log(_user_loggedin);
  if (_user_loggedin != '') {
    
    $('#footer-right-menu').toggleClass("active");
   var track_comment_ct = $(this).attr('data-total-comment-ct');
   var track_id = $(this).attr('data-track');
   var track_user_id =$(this).attr('data-track_user');
   $('#content_track').val($(this).attr('data-track'));
   $('#content_track_user').val($(this).attr('data-track_user'));
    var html='';
    var newcommentct=0;
 // alert(track_id);
     $.ajax({
          type:'POST',
          url:base_url+'load-comment',
          data:{track_id:track_id,track_user_id:track_user_id},
          success:function(d){
            $.each(d, function (k, v) {
                if(v.comment_data!='')
                 {
                html+='<div class="msg-content"><div class="msg-container">';
                html+='<img src="'+v.profile_image+'"  class="profile-photo-md pull-left" />';
                html+='<div class="msg-detail"><div class="user-info">'
                html+='<h5 class="msg-pro">'+v.comment_username+'</h5>';
                html+='</div><div class="msg-text">';
                html+='<p>'+v.comment_data+'</p>';
                html+='</div></div></div></div>';
                }else{
              html+='';

              }
              });
            
            $('#content_message_div').html(html);
          },
          complete:function(xhr,status){
            
            // $('#comment_form').find('#comment_data').val('');
            // $('#comment_btn').html('Submit').prop('disabled',false);

          }
        });
  } else {
    openSignin();
  }
  
 
  


  });
  $(document).keydown(function(e) {
    if (e.keyCode == 27) {
       $('#footer-right-menu').removeClass("active");
       $('#btnControl-footer').prop('checked', false);
    }
});

  $('#comment_form').validate({
     rules:{
        comment_data:{
          required:true,
          minlength:2,
          maxlength:300
        }
      },
      messages:{
        comment_data:{
          required:'Comment somthing',
          minlength:'Mimimum 2 charachter',
          maxlength:'Maximum 300 charachter'
        }
      },
      submitHandler:function(){
    
        
        $.ajax({
          type:'POST',
          url:base_url+'comment',
          data:$('#comment_form').serialize(),
          beforeSend:function(){
          $('#comment_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').prop('disabled',true);
          },
          success:function(d){
            
            if(d.success){
             // console.log(d);
              $('#commentmsg').html('<div class="alert alert-success">'+d.success+'</div>');
              
              
              setTimeout(function(){
                $('#commentmsg').html('');
                //$('#commentModalId').modal('hide');
              },1500);
              //var track_id= 
              var track_id = d.content_track_id;
              var track_user_id = d.commnet_track_user_id;
              var track_comment_count = d.commnet_track_comment_count;
              $('#comment_count'+track_id).html();
              $('#comment_count'+track_id).html(track_comment_count);
              
            var html='';
            // alert(track_id);
             $.ajax({
                type:'POST',
                url:base_url+'load-comment',
                data:{track_id:track_id,track_user_id:track_user_id},
            success:function(d){
              $.each(d, function (k, v) {
               if(v.comment_data!='')
                 {
                html+='<div class="msg-content"><div class="msg-container">';
                html+='<img src="'+v.profile_image+'"  class="profile-photo-md pull-left" />';
                html+='<div class="msg-detail"><div class="user-info">'
                html+='<h5 class="msg-pro">'+v.comment_username+'</h5>';
                html+='</div><div class="msg-text">';
                html+='<p>'+v.comment_data+'</p>';
                html+='</div></div></div></div>';
                }else{
              html+='';

              }
              });
            
            $('#content_message_div').html(html);
           
            },
            });

            }else if(d.error){
              $('#commentmsg').html('<div class="alert alert-danger">'+d.error+'</div>');
              setTimeout(function(){
                $('#commentmsg').html('');
              },1500);
              //$('#comment_btn').html('Submit').prop('disabled',false);
            }

          },
          complete:function(xhr,status){
            
             $('#comment_form').find('#comment_data').val('');
             $('#comment_btn').html(' <i class="fa fa-comment"></i>  '+'Submit').prop('disabled',false);
          

          }
        });



      }

  });
