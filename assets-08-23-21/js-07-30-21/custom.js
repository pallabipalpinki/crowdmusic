

const loadtl = gsap.timeline();

if($('.loding').length) {
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
  loadtl
  .from(
    '.header-bottom .logo, .header-nav > .home-section-menu li, #header .socials a',
    {
      y: 30,
      opacity: 0,
      stagger: 0.1,
      ease: 'back.out',
    }
  );
}

$('.singers').flipster({
  style: 'carousel',
  spacing: -0.35,
  nav: false,
  buttons: true,
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

// function bannerParalex() {
//   $(window).scroll(function () {
//     $('.banner .equipment .img').css(
//       'transform',
//       'translate(0,' + $(window).scrollTop() / 8 + 'px)'
//     );
//   });
// }

$(window).resize(function () {
  fixedHeader();
  // bannerParalex();
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

$('#loguser').click(function (e) {
  //alert('hi');
  var flag = 0;

  var username = $('#usernamei').val();
  var password = $('#passwordi').val();
  // alert(username);
  //alert(password);
  if (username == '') {
    $('#usernamei').css('border', '1px solid red');
    flag = 1;
  }
  if (password == '') {
    $('#passwordi').css('border', '1px solid red');
    flag = 1;
  }
  console.log('username', username);
  console.log('password', password);
  if (flag == 0) {
    var url = base_url + 'user-login';
    $.ajax({
      url: url,
      method: 'POST',
      data: { username: username, password: password },
      success: function (result) {
        if (result == 1) {
          window.location.href = base_url + 'user-dashboard';
        } else if (result == 2) {
          $('#usernamei').css('border', '1px solid red');
          alert('Invalid Username');
        } else if (result == 3) {
          $('#passwordi').css('border', '1px solid red');
          alert('Invalid Password');
        } else if (result == 4 || result == 5) {
          $('#usernamei').css('border', '1px solid red');
          $('#passwordi').css('border', '1px solid red');
          alert('Invalid Username & Passowrd');
        } else {
          alert('Something went wrong');
        }
      },
    });
  } else {
    alert('Something went wrong');
  }
});
