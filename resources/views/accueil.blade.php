
<!DOCTYPE html>
<html>
    <head>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
        
        <style>
            *{
                background-color: Gainsboro;
            }

            #slider {
    width: 900px;
    height: 400px;
    overflow: hidden;
    background-color: Gainsboro;
}

 .slides {
    display: block;
    width: 6500px;
    height: 400px;
    margin: 0;
    padding: 0;
    background-color: Gainsboro;
}

#slider .slide {
    float: left;
    list-style-type: none;
    width: 900px;
    height: 500px;
    background-color: Gainsboro;
    
}
#cnx{
    top:0;
    position: relative;
    top: 10px; 
    left: 1100px;
    background-color:#004D40;
}
.text-muted{
    background-color: silver;
}

        </style>

<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous">
</script>
           
    </head>
    <body>



    <div class="header">       
        <h1 class="text-muted">BIENVENUE DANS VOTRE PLATEFORME CHER MEDECIN</h1>
        <a href="{{URL::to('/login')}}" id="cnx" class="btn btn-lg btn-primary ">connexion</a>  
    </div>
    <div class="container-fluid">
    <div class="container" id="slider">
        <ul class="slides">
            <li class="slide"><img src="slides/corona00.jpg" alt=""></li>
            <li class="slide"><img src="slides/corona11.jpg" alt=""></li>
            <li class="slide"><img src="slides/corona22.jpg" alt=""></li>
            <li class="slide"><img src="slides/corona33.jpg" alt=""></li>
            <li class="slide"><img src="slides/corona55.jpg" alt=""></li>
            <li class="slide"><img src="slides/corona00.jpg" alt=""></li>
        </ul>
    </div>
    </div>



<script>
  //  'use strict';

$(function() {

    //settings for slider
    var width = 905;// largeur des images
    var animationSpeed = 1000;// vitesse d'animation 
    var pause = 3000;// duré ou l'image reste en ecran
    var currentSlide = 1;//conteur

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {//si on a parcouru toutes les images
                    currentSlide = 1;//on reinialise
                    $slideContainer.css('margin-left', 0);// on revient a la 1ere image
                }
            });
        }, pause);
    }
    function pauseSlider() {// pour s'arreter dans une image si le curseur la s'envole
        clearInterval(interval);
    }

    $slideContainer
        .on('mouseenter', pauseSlider)//pause
        .on('mouseleave', startSlider);// reanimation

    startSlider();// animation par defaut si rien ne se passe


});

</script>

</body>
    
</html>