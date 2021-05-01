<?php
require "includes/configuration.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Luxury Wristwear | Homepage</title>
    <?php require $metaHtml;  ?>
    <?php require $bsCss; ?>
    
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

    <div class="under-video">
        <p>a</p>
    </div>

    

    <script>
        document.getElementById('vid').play();   
    </script> <!-- woo hoo we love web design -->

    <?php require $bsScript; ?>
    <?php require "includes/footer.inc.php"; ?>
</body>

</html>