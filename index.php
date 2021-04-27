<?php
    require "includes/configuration.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homepage</title>
    <?php require $metaHtml; ?>
    <?php require $bsCss; ?>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php require $navigation; ?>

    <div>
        <!-- <h1 class="index-customize"> CUSTOMIZE </h1> -->
        <img src="images/ingredients2.jpeg" class="ingredients-image img-fluid mt-5">
    </div>
    
    <?php require $bsScript; ?>
  </body>
</html>