// Masonry
$(document).ready(function(){
      resizeDiv();
  });
  window.onresize = function(event) {
      resizeDiv();
  };
  function resizeDiv() {
     vpw = $(window).width();
     vph = $(window).height();

     // -- Section Width and Height -- //
     $('#gallery a').wookmark({
		autoResize: true,
		itemWidth: 320,
		flexibleWidth:"100%",
		container: $('#main'),
		offset: 0,
		outerOffset: 0,
		verticalOffset: -3,
		onLayoutChanged: true
	});
}





// Sticky Header
$(function() {
  var sticky_navigation_offset_top = $('#masthead').offset().top;
  var sticky_navigation = function(){
    var scroll_top = $(window).scrollTop();
    if (scroll_top > sticky_navigation_offset_top) {
      $('#masthead').css({ 'position':'fixed' });
    } else {
      $('#masthead').css({ 'position':'relative'});
      //$(".footer-toggles").removeClass("active");
    }
  };
  sticky_navigation();
  $(window).scroll(function() {
     sticky_navigation();
  });
});


// Smooth Scroll for Anchor Links
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
