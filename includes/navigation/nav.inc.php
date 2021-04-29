<?php 
    $pages = array(
        "index.php" => "Home",
        "brands.php" => "Brands",
        "watches.php" => "Watches",
        "about.php" => "About"
    );

    function isActive($linkUrl){
        $currentPage = $_SERVER["REQUEST_URI"];
        $currentPage = ltrim($currentPage, $currentPage[0]);
        return $currentPage === $linkUrl ? 'active' : '';
    }
?>


<nav class="navbar navbar-expand-lg navbar-light border-bottom">
<a href="./index.php">
    <img src="./images/logo.png" width="70px" height="60px" alt="logo">
</a>
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
        <?php
            foreach($pages as $url => $title){
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
</nav>

