<?php
require "includes/configuration.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rubrics</title>
    <?php require $metaHtml; ?>
    <?php require $bsCss; ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require $navigation; ?>

    <div class="container mt-3">
        <div class="accordion" id="accordion">

            <!-- Content -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c1" aria-expanded="true" aria-controls="c1">
                        <strong>Content</strong>
                    </button>
                </h2>
                <div id="c1" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        We have over 4 brands and 24 watches in our database and counting. Each of those watches has its own spot on our website, making the
                        site count go to sky and beyond. When it comes to content; we strive to be the best.
                    </div>
                </div>
            </div>

            <!-- Design -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c2" aria-expanded="false" aria-controls="c2">
                        <strong>Design</strong>
                    </button>
                </h2>
                <div id="c2" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Design was always our passion, which is visible throughout our whole website.
                        Using simple bootstrap elements and stacking them one on another, we have reached peak design.
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c3" aria-expanded="false" aria-controls="c3">
                        <strong>Navigation</strong>
                    </button>
                </h2>
                <div id="c3" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Navigation on our website is simple and straightforward. Are you interested in brands? Click the brands button and go from there.
                        Simple and classy.
                    </div>
                </div>
            </div>

            <!-- Organization -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c4" aria-expanded="false" aria-controls="c4">
                        <strong>Organization</strong>
                    </button>
                </h2>
                <div id="c4" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Everything is organized in its own section; brands in brands and watches in watches. Everything is also interlinked.
                    </div>
                </div>
            </div>

            <!-- HTML/CSS -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c5" aria-expanded="false" aria-controls="c5">
                        <strong>HTML/CSS</strong>
                    </button>
                </h2>
                <div id="c5" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        HTML is well formatted and well written with occassional snippets from legendary Bootstrap examples. CSS is in shortage,
                        but the CSS we have was enough for us to reach the design we wished to reach.
                    </div>
                </div>
            </div>

            <!-- Javascript -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c6" aria-expanded="false" aria-controls="c6">
                        <strong>Javascript</strong>
                    </button>
                </h2>
                <div id="c6" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        No javascript.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require $footer; ?>
    <?php require $bsScript; ?>
</body>

</html>