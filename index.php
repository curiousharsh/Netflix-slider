<!DOCTYPE html>
<html>
<head>
  <title>Slick Playground</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;

    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 90%;
        margin: 20px auto;
        padding: 15px 5%;
    }
    .slick-list{
     overflow: unset;
    }
    .slick-slide {
      margin: 0px 2.5px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    /*  background-color:rgba(0,0,0,.7);*/
    }
    .slick-slide.slick-active:hover{
    /*  position:absolute;*/
      -webkit-transform: scale(1.5);
     
          transform: scale(1.5);
    }
   .slick-slide:hover .slider-box{

    }
    .slick-slide.has-positive-translate {
 -webkit-transform: translate(65px);
          transform: translate(65px);
         
}
.slick-slide.has-negative-translate {
  -webkit-transform: translate(-65px);
  transform: translate(-65px);

   }
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
    .image-content{
      display: none;
    }
    .slick-slide.slick-active:hover  .image-content{
      display: block;
      position: absolute;
      top:20px;
    }
    .slider-box{
      position: relative;
    }
    .image-content .title{
      background-color: rgba(0,0,0,.5);
    }
    .slider-container{
      margin: 50px 0;
      overflow:hidden;
    }
    .hidden{
      visibility: hidden;
    }
  </style>
</head>
<body>

    <div class="slider-container">
        <div class="slider-dots"></div>
  <section class="regular slider">
    <?php
      for($i=1;$i<=10;$i++)
      {
          echo '  <div class="slider-box">
      <img src="images/'.$i.'.jpg">
        <div class="image-content">
          
        </div>
    </div>';
      }

     ?>
  
  </section>

</div>


  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
    $(".regular").on('init', function () {
        $('.slick-current').prevAll().addClass('hidden');
       
    });
    var slick=   $(".regular").slick({
        dots: true,
        infinite: true,
      
        slidesToShow: 4,
        slidesToScroll: 1
      });
      slick.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $('.slick-current').prevAll().removeClass('hidden');
    });
      $(document).on('mouseenter','.slick-slide.slick-active',function(e){
        $(this).nextAll().addClass('has-positive-translate');
        $(this).prevAll().addClass('has-negative-translate');
      //  console.log(slick);
            var $currTarget = $(e.currentTarget), 
           index = $currTarget.data('slick-index');
        console.log( index
        
          );

      });
      $(document).on('mouseleave','.slick-slide.slick-active',function(){
     
        removeHasClasses()
      })
      
      function removeHasClasses() {
        $('.slick-slide').removeClass('has-negative-translate has-positive-translate')
      }

    });
</script>

</body>
</html>
