<?php

    ini_set('display_errors',1);
    ini_set('display_startup_error', 1);
    error_reporting(E_ALL);

    $currentDir = __DIR__;

    $htmlPath = "$currentDir/html";
    $bsPath = "$currentDir/bootstrap";
    $navigationPath = "$currentDir/navigation";
    $footerPath = "$currentDir/footer";

    $metaHtml = "$htmlPath/html-meta.inc.php";

    $bsCss = "$bsPath/bs-css.inc.php";
    $bsScript = "$bsPath/bs-script.inc.php";
    $navigation = "$navigationPath/nav.inc.php";
    $footer = "$footerPath/footer.inc.php";
