//  Slider owl-carousel------------------------
$(document).ready(function(){
      $('.owl-carousel').owlCarousel({
    loop:true,   
    margin:0,
    stagePadding: -10,
    padding:0,
    center: true,
    autoHeight: true,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items:1,
           
        },
        600:{
            items:1,
         
        },
        1000:{
            items:1,

        }
    }
});
  });


  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});

