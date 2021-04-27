<?php 
    $pages = array(
        "index.php" => "Home",
        "customize.php" => "Customize",
        "menu.php" => "Menu",
        "deals.php" => "Deals",
        "about.php" => "About us",
        "cart.php" => "Cart"
    );

    function isActive($linkUrl){
        $currentPage = $_SERVER["REQUEST_URI"];
        $currentPage = ltrim($currentPage, $currentPage[0]);
        return $currentPage === $linkUrl ? 'active' : '';
    }
?>

<nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <?php
            foreach($pages as $url => $title){
                $isActive = isActive($url);

                $link = "
                <li class='nav-item active mr-5 ml-4 mt-2'>
                    <a class='nav-link' href='$url'>
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

