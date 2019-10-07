jQuery(document).ready(function($){  
    
//    if ($("video").attr("controls")) {
//        $("video").removeAttr("controls");
//        $("figcaption").show();
//        $("video").addClass('paused');
//    }
//    $('.video_icon').click(function() {
//        var thisVideo = $(this).parent().find("video");
//        console.log(thisVideo['0']);
//        if ( thisVideo.hasClass('paused') ) {
//            thisVideo.removeClass('paused');
//            thisVideo['0'].play();
//            thisVideo.addClass('playing');
//            //$('a.playpause').html('&#x25fC');
//        } else {
//            thisVideo.removeClass('playing');
//            thisVideo['0'].pause();
//            thisVideo.addClass('paused');
//           // $('a.playpause').html('&#x25BA');
//        }
//    });

$(".custom_player").hide();

$(".video_icon").click(function() {
    var content = $(this).parent().parent().find(".custom_player");
    $.fancybox({
        'padding'       : 0,
        'autoScale'     : false,
        'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic',
        //'title'         : this.title,
        'width'         : 450,
        'height'        : 320,
        autoDimensions  : false,
        //'href'          : this.href,
        'content'       : content
        });

    return false;
});
    
    
$(".press_video .video").hide();
$(".press_video .youtube_icon").on('click', function(){    
     $(this).parent().find('.youtube_icon').hide();
     $(this).parent().find('.thumb').hide();
     $(this).parent().find('.video').show();
     var srcVal = $(this).parent().find('.video iframe').attr('src');
     $(this).parent().find('.video iframe').attr('src',srcVal+'&autoplay=1');     
});
    
    //
//    $(".video_icon").on("click",function(){
//       $(".custom_player").fancybox();
        
//        $(this).parent().parent().find(".video_pic").hide();
//       $(this).parent().parent().find(".custom_player").fancybox();
//        $(this).parent().parent().find(".custom_player").show();
//        var thisVideo = $(this).parent().parent().find("video");
//        thisVideo['0'].play();
        
//    });
   
    /*Smoot scrolling on click menu items*/
    $('a[href*=#]:not([href=#])').click(function(event) {       
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          var url = this.hash;
          if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top - 100
            }, 1000, function () {           
                window.location.hash = url; 
            });       
            
            return false;
          }
        }
    });
    
    
    /** About hover **/
    $(".about_post").hover(
        function() {
             $(this).find('.about_post_content').show();
          }, function() {
              $(this).find('.about_post_content').hide();
          }
    );
    
    
    //testimonial slider
    $('.testimonial_sl').bxSlider({
        auto: true,
        controls: true,
        pager: true,
        nextText: '>',
        prevText: '← Prev Next →'
       
    });
    
});

