$(function(){
	
	$(".hamburger").on("click", function(){	
		$('.mobile-menu ul').slideToggle();
		$('.fa-bars').toggle(); /* toggles hamburger icon */
		$('.fa-xmark').toggle(); /* toggles close (x) icon */
	});
	
	/* adds a line through clicked li items*/
	$('.mobile-menu ul li').on("click", function(){
		$(this).toggleClass("complete");
	});
});

jQuery(function() {
	var appear = false;
	var pagetop = $('#page_top');
	$(window).scroll(function () {
	  if ($(this).scrollTop() > 120) { 
		if (appear == false) {
		  appear = true;
		  pagetop.stop().animate({
			'bottom': '16px' 
		  }, 500); 
		}
	  } else {
		if (appear) {
		  appear = false;
		  pagetop.stop().animate({
			'bottom': '-80px' 
		  }, 500); 
		}
	  }
	});
	pagetop.click(function () {
	  $('body, html').animate({ scrollTop: 0 }, 500);
	  return false;
	});
  });

  $('#wave').wavify({
	height: 60,
	bones: 3,
	amplitude: 25,
	color: '#fff',
	speed: .25
  });

  $(document).ready(function () {
	$('#wave').wavify({
	  height: 60,
	  bones: 3,
	  amplitude: 40,
	  color: '#fff',
	  speed: 0.25,
	  timing: '2s',
	  displacement: 100,
	  callback: function () {
		gsap.to('#wave path', {
		  duration: 1,
		  ease: 'power2.inOut',
		  scaleY: 0.8, // Scale the wave down a bit
		  yoyo: true,
		  repeat: -1,
		});
	  },
	});
  });

