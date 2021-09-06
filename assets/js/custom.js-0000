const loadtl = gsap.timeline();
loadtl
  .to('.load-content', { duration: 0.3, x: '-100%', opacity: 0 }, 3)
  .to('.loding', { x: '-100%', ease: 'power2.in' })
  .from('.header-bottom .logo, .home-section-menu li, #header .socials a', {
    y: 30,
    opacity: 0,
    stagger: 0.1,
    ease: 'back.out',
  });

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

$(window).resize(function () {
  fixedHeader();
});

$(window).trigger('resize');

gsap.set('.onview', { opacity: 0, y: 30 });

ScrollTrigger.batch('.onview', {
  onEnter: (batch) =>
    gsap.to(batch, {
      duration: 1,
      opacity: 1,
      y: 0,
      stagger: 0.15,
      ease: 'power3',
    }),
});