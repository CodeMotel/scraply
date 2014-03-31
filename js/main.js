// Masonry - Grid
$(document).ready(function(){
      resizeDiv();
  });
  window.onresize = function(event) {
      resizeDiv();
  };
  function resizeDiv() {
      vpw = $(window).width();
      vph = $(window).height();

     //$('#gallery a').wookmark({
	//	autoResize: true,
	//	itemWidth: 380,
	//	flexibleWidth:"100%",
	//	container: $('#main'),
	//	offset: 0,
	//	outerOffset: 0,
	//	verticalOffset: -3,
	//	onLayoutChanged: true
	//});

     $('#gallery a.active').css({'height': vph - 32 + 'px'});
}




(function ($){
  $('#gallery').imagesLoaded(function() {
    // Prepare layout options.
    var options = {
      autoResize: true,
      itemWidth: 380,
      flexibleWidth:"100%",
      container: $('#main'),
      offset: 0,
      outerOffset: 0,
      verticalOffset: -3,
      onLayoutChanged: true
    };

    var handler = $('#gallery a');

    var $window = $(window);
    $window.resize(function() {
      var windowWidth = $window.width(),
          newOptions = { flexibleWidth: '50%' };

      // Breakpoint
      if (windowWidth < 1024) {
        newOptions.flexibleWidth = '100%';
      }
      handler.wookmark(newOptions);
    });

    // Call the layout function.
    handler.wookmark(options);
  });
})(jQuery);





// Masonry - Toggle Full Size
$("#gallery a").click(function(){
  //$('#gallery a').removeClass("active");
  $(this).toggleClass("active");
});



// Sticky Header
$(function() {
  var sticky_navigation_offset_top = $('#masthead').offset().top;
  var sticky_navigation = function(){
    var scroll_top = $(window).scrollTop();
    if (scroll_top > sticky_navigation_offset_top) {
      $('#masthead').css({ 'position':'fixed' });
      $('.admin-bar #masthead').css({ 'top': 32 });
    } else {
      $('#masthead').css({ 'position':'relative'});
      $('.admin-bar #masthead').css({ 'top': 0 });
    }
  };
  sticky_navigation();
  $(window).scroll(function() {
     sticky_navigation();
  });
});


// Back to Top Link
$('#top-btn').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
 });



// Toggle Upload Window
$("#add-btn").click(function(){
  $("#add-new-wrapper").toggleClass("active");
  $("#add-btn").toggleClass("active");
});