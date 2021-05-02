<?php
require "includes/configuration.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Luxury Wristwear | Homepage</title>
    <?php require $metaHtml;  ?>
    <?php require $bsCss; ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">

</head>

<body>
    <?php require $navigation; ?>

    <div class="d-none d-lg-block">
        <video id="vid" autoplay loop muted>
            <source src="video/rolex-final-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="d-none d-md-block d-lg-none">
        <video id="vid1 mx-auto" autoplay loop muted>
            <source src="video/medium-final.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="d-md-none">
        <video id="vid2" autoplay loop muted>
            <source src="video/small-final.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="color">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 under-video d-flex align-items-center justify-content-center ">
                    <img src="images/service-logo.png" width="250px" height="250px" alt="logo service">
                </div>
                <div class="col-sm-4 under-video d-flex align-items-center justify-content-center">
                    <p class="text-light text-center text-lg-left"> <br>Luxury Wristwear is home to the greatest
                        collection of pre-owned
                        luxury watches, all certified as authentic and Collector Quality.</p>
                </div>
                <div class="col-sm-4 under-video d-flex align-items-center justify-content-center ">
                    <p class="text-light text-center text-lg-left">Browse between the most honorable watch brands on the
                        market.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="color-second">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 under-video-second d-flex align-items-center justify-content-center">
                    <h1 class="text-dark text-center font-weight-bold text-lg-left">Tired of your watch?</h1>
                </div>
                <div class="col-sm-4 under-video-second d-flex align-items-center justify-content-center">
                    <p class="text-dark text-center text-lg-left">Make room for your new watch. Luxury Wristwear has a
                        number of avaliable watches for you to choose from.</p>
                </div>
                <div class="col-sm-4 under-video-second d-flex align-items-center justify-content-center">
                    <a href="watch.php" class="btn btn-outline-dark btn-lg" role="button" aria-pressed="true">Cast an
                        Eye</a>
                </div>
            </div>
        </div>
    </div>


    <div class="last-element d-none d-lg-block mt-5">
        <img class="scanner" src="images/watch-scanner.jpg" width="1920" height="651" alt="watch scanner">
        <h2 class="text-light centered-up">Luxury Wristwear - world's leading watch house.</h2>
        <div class="text-light centered">We're more than dealers - we're collectors too.<br> We would never tell you to buy
                    a watch we wouldn't buy ourselves first.<br> Additionally this means we own every watch we sell,
                    allowing us to operate across the globe. <br>
                    Introducing the Watch Scanner app in which you can learn about the model and current market value.<br> Now avaliable on Google Play, and App Store.<br>        
        </div>
        <a href="https://www.apple.com/app-store/"><img class="text-center centered-down" src="./images/appstore.png" alt="logo" width="88px" height="30px"></a> 
        <a href="https://play.google.com/store/movies"><img class="text-center centered-down1" src="./images/google_play.png" alt="logo" width="88px" height="30px"></a>
    </div>

    <div class="last-element-md d-none d-md-block d-lg-none mt-5">
        <img class="scanner" src="images/watch-scanner.jpg" width="1920" height="651" alt="watch scanner">
        <h2 class="text-light centered-up-md">Luxury Wristwear - world's leading watch house.</h2>
        <div class="text-light centered-md">We're more than dealers - we're collectors too.<br> We would never tell you to buy
                    a watch we wouldn't buy ourselves first.<br> Additionally this means we own every watch we sell,
                    allowing us to operate across the globe. <br>
                    Introducing the Watch Scanner app in which you can learn about the model and current market value.<br> Now avaliable on Google Play, and App Store.<br> </div>
        <a href="https://www.apple.com/app-store/"><img class="text-center centered-down-md" src="./images/appstore.png" alt="logo" width="88px" height="30px"></a> 
        <a href="https://play.google.com/store/movies"><img class="text-center centered-down1-md" src="./images/google_play.png" alt="logo" width="88px" height="30px"></a>
    </div>

    <div class="last-element-sm d-md-none mt-5">
            <img class="scanner-sm" src="images/watch-scanner.png" width="375" height="730" alt="watch scanner">
        <h2 class="text-light centered-up-sm">Luxury Wristwear</h2>
        <p class="text-light centered-sm mx-5">
                    Introducing the Watch Scanner app in which you can learn about the model and current market value. Now avaliable on Google Play, and App Store.</p>
        <a href="https://www.apple.com/app-store/"><img class="text-center centered-down-sm" src="./images/appstore.png" alt="logo" width="88px" height="30px"></a> 
        <a href="https://play.google.com/store/movies"><img class="text-center centered-down1-sm" src="./images/google_play.png" alt="logo" width="88px" height="30px"></a>
    </div>




    <script>
        document.getElementById('vid').play();
    </script>

    <?php require $bsScript; ?>
    <?php require "includes/footer.inc.php"; ?>
</body>

</html>