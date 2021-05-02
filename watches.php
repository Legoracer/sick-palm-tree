<?php require "includes/configuration.inc.php"; ?>
<?php require "includes/db-configuration.inc.php"; ?>

<?php 
    // From internet
    function formatDollars($dollars)
    {
        $formatted = "$" . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)), 2);
        return $dollars < 0 ? "({$formatted})" : "{$formatted}";
    }
?>

<?php
    /** Parse values from the URL */
    if (isset($_GET['pricefrom']) && !empty($_GET['pricefrom'])) {
        $priceFrom = $_GET['pricefrom'];
    } else {
        $priceFrom = 0;
    }
    if (isset($_GET['priceto']) && !empty($_GET['priceto'])) {
        $priceTo = $_GET['priceto'];
    } else {
        $priceTo = 10000000;
    }
    if (isset($_GET['brand']) && !empty($_GET['brand'])) {
        $brand = $_GET['brand'];
    } else {
        $brand = 0;
    }
    if (isset($_GET['material']) && !empty($_GET['material'])) {
        $material = $_GET['material'];
    } else {
        $material = 0;
    }
?>

<?php
    $mysqli = retrieveDatabaseConnection();
?>

<?php
    /** Get watches from DB */
    $sql = "SELECT * FROM watch 
            WHERE price > ?
            AND price < ? ";

    // Dont know how to do this any other way
    if (isset($_GET['brand']) && !empty($_GET['brand'])) {
        $sql .= "AND brand_id = $brand ";
    }
    if (isset($_GET['material']) && !empty($_GET['material'])) {
        $sql .= "AND material_id = $material ";
    }

    try {
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ii', $priceFrom, $priceTo);
    $stmt->execute();
    $watches = $stmt->get_result();
    $numOfWatches = $watches->num_rows;
    } catch (Error $e) {
        header("Location: ./watches.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customize</title>
    <?php require $metaHtml; ?>
    <?php require $bsCss; ?>
    
    <!-- Watches CSS -->
    <link rel="stylesheet" href="./assets/css/watches.css">

</head>

<body>
    <?php require $navigation; ?>
    <main class="container mx-auto my-5 row p-4">
        <section class="col-12 col-lg-3 p-0">
            <form class="card w-100 p-2 " action="" method="get">
                <div class="form-group">
                    <label>Price Range</label>
                    <div class="d-flex align-items-center justify-content-center">
                        <input class="w-50 form-control" type="text" id="pricefrom" name="pricefrom" placeholder="$0" value="<?php if(isset($_GET['pricefrom']) && !empty($_GET['pricefrom'])){echo $priceFrom;} ?>">
                        <p class="w-25 m-0 text-center">TO</p>
                        <input class="w-50 form-control" type="text" id="priceto" name="priceto" placeholder="$0" value="<?php if(isset($_GET['priceto']) && !empty($_GET['priceto'])){echo $priceTo;} ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand" name="brand">
                        <option value="0">All brands</option>
                        <?php
                            // Get brands from DB
                            $sql = "SELECT * FROM brand;";
                            $result = $mysqli->query($sql);
                            $numOfRows = $result->num_rows;
                            if($numOfRows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $name = $row["name"];
                                    if ($id == $brand) {
                                        echo "<option selected value='$id'>$name</option>";
                                    } else {
                                        echo "<option value='$id'>$name</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="material">Material</label>
                    <select class="form-control" id="material" name="material">
                        <option value="0">All materials</option>
                        <?php
                            // Get materials from DB
                            $sql = "SELECT * FROM material;";
                            $result = $mysqli->query($sql);
                            $numOfRows = $result->num_rows;
                            if($numOfRows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $name = $row["name"];

                                    if ($id == $material) {
                                        echo "<option selected value='$id'>$name</option>";
                                    } else {
                                        echo "<option value='$id'>$name</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Update</button>
                </div>     
            </form>
        </section>

        <section class="col-12 col-lg-9">
            <div class="d-flex flex-row flex-wrap justify-content-center">
            <?php
                    if($numOfWatches > 0) {
                    while($watch = $watches->fetch_assoc()) {
                       
                        $id = $watch["id"];
                        $title = $watch["name"];
                        $brand_id = $watch["brand_id"];
                        $price = formatDollars($watch["price"]);

                        // Get image from DB
                        $sql = "SELECT * FROM image WHERE watch_id = ?";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param('i', $id);
                        $stmt->execute();
                        $img = $stmt->get_result()->fetch_object();

                        // Get brand from DB
                        $sql = "SELECT * FROM brand WHERE id = ?";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param('i', $brand_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $brand = $result->fetch_object();

                        echo "
                            <a href='./watch.php?id=$id' class='item card p-2 d-flex flex-column justify-content-between m-1'>
                                <div class='w-100 d-flex justify-content-center'>
                                    <img class='img-fluid w-75 h-100' src='$img->src' alt='$img->alt'>
                                </div>
                                <div class='mt-4'>
                                    <h4 class='brand'>$brand->name</h4>
                                    <h1 class='name text-center'>$title</h1>
                                    <h3 class='price m-0'>$price</h3>
                                </div>
                            </a>
                        ";
                    }
                    }

                    $mysqli->close();
                ?>
            </div>
        </section>  
    </main>
    <?php require $footer; ?>
    <?php require $bsScript; ?>
</body>

</html>