<?php
require "includes/configuration.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Homepage</title>
    <?php require $metaHtml; ?>
    <?php require $bsCss; ?>
</head>

<body>
    <?php require $navigation; ?>

    <div class="video-text">
        <img class="logo-video" src="images/logo.png" width="100px" height="90px" alt="logo">
        <video id="vid" autoplay loop muted>
            <source src="./images/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p class="text-video text-light">Limited Addiction</p> <br>
        <p class="text-light text-video1">The obsession is real. Discover watches with limited production and endless demand.</p>
    </div>
    <script>
        document.getElementById('vid').play();
    </script> <!-- woo hoo we love web design -->

    <?php require $bsScript; ?>
    <?php require "includes/footer.inc.php"; ?>
</body>

</html>