<?php
$pages = array(
    "index.php" => "Home",
    "brands.php" => "Brands",
    "watches.php" => "Watches",
    "about.php" => "About"
);

function isActive($linkUrl)
{
    $currentPage = $_SERVER["REQUEST_URI"];
    $currentPage = ltrim($currentPage, $currentPage[0]);
    return $currentPage === $linkUrl ? 'active' : '';
}
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="./index.php">
            <img class="logo" src="./images/logo-lw.png" width="100px" height="40px" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-auto mb-lg-0">
                <?php
                    foreach ($pages as $url => $title) {
                        $isActive = isActive($url);

                        $link = "
                        <li class='nav-item active mx-5 mt-2'>
                            <a class='nav-link " . ($isActive ? "font-weight-bold " : "") . "' href='$url'>
                                $title 
                            </a>
                        </li>
                        ";
                        echo $link;
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>