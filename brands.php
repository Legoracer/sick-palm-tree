<?php 
  require "includes/configuration.inc.php";
  require "includes/db-configuration.inc.php";
?>

<?php
    $mysqli = retrieveDatabaseConnection();
?>

<?php 
    // From internet
    function formatDollars($dollars)
    {
        $formatted = "$" . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)), 2);
        return $dollars < 0 ? "({$formatted})" : "{$formatted}";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Luxury Wristwear | Brands</title>
    <?php require $metaHtml; ?>
    <?php require $bsCss; ?>

    <!-- Watches CSS -->
    <link rel="stylesheet" href="./assets/css/watches.css">
</head>

<body>
    <?php require $navigation; ?>

    <main class="container mx-auto">
        <h1 class="text-center mb-5">Our brands</h1>
        <?php
            // Get brands from DB
            $sql = "SELECT * FROM brand;";
            $brands = $mysqli->query($sql);
            $numOfBrands = $brands->num_rows;
            if($numOfBrands > 0) {
                while($brand = $brands->fetch_assoc()) {
                    $id = $brand["id"];
                    $name = $brand["name"];
                    $image_alt = $brand["image_alt"];
                    $image_src = $brand["image_src"];
                    $description = $brand["description"];

                    $watchesString = "";

                    $sql = "SELECT * FROM watch WHERE brand_id = $id;";
                    $watches = $mysqli->query($sql);
                    $numOfWatches = $watches->num_rows;

                    if($numOfWatches > 0) {
                        while($watch = $watches->fetch_assoc()) {
                            $watch_id = $watch["id"];
                            $watch_title = $watch["name"];
                            $watch_price = formatDollars($watch["price"]);

                            // Get image from DB
                            $sql = "SELECT * FROM image WHERE watch_id = ?";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param('i', $watch_id);
                            $stmt->execute();
                            $watch_img = $stmt->get_result()->fetch_object();

                            $watchesString .= "
                                <div class='item card p-2 d-flex flex-column justify-content-between mx-2 h-100'>
                                    <div class='watch w-100 d-flex justify-content-center overflow-hidden'>
                                        <img class='watch-img' src='$watch_img->src' alt='$watch_img->alt'>
                                    </div>
                                    <div class='mt-4'>
                                    <a href='./watch.php?id=$watch_id'><h1 class='name text-center'>$watch_title</h1></a>
                                    </div>
                                    <div class='d-flex align-items-center justify-content-center'>
                                        
                                    </div>
                                </div>
                            ";
                        }
                    }

                    $brandString = "
                        <section class='mb-5 w-100 d-flex flex-column justify-content-center align-items-center'>
                            <img class='logo-img w-100 mb-2' src='$image_src' alt='$image_alt'>
                            <p class='about-brand text-center'>$description</p>
                            <section class='draggable my-2 d-flex flex-row'>
                                $watchesString
                            </section>
                            <a href='./watches.php?brand=$id' class='btn btn-primary mb-5'>See our collection</a>
                        </section>
                    ";

                    echo $brandString;
                }
            }
        ?>
        
        
    </main>
    <script src="./assets/js/brands.js"></script>
    <?php require $footer; ?>
    <?php require $bsScript; ?>
</body>

</html>