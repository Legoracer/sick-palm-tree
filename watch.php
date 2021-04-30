<?php require "includes/configuration.inc.php"; ?>
<?php require "includes/db-configuration.inc.php"; ?>


<?php
    /** Parse ID from URL and Query the DB */
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        return;
    }

    // Connect to DB
    $mysqli = retrieveDatabaseConnection();

    // Get watch from DB
    $sql = "SELECT * FROM watch WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $watch = $result->fetch_object();

    // Get brand from DB
    $sql = "SELECT * FROM brand WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $watch->brand_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $brand = $result->fetch_object();

    // Get material from DB
    $sql = "SELECT * FROM material WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $watch->material_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $material = $result->fetch_object();
    

    if (isset($watch)) {

    } else {
        return;
    }
?>

<?php 
    // From internet
    function formatDollars($dollars)
    {
        $formatted = "$" . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)), 2);
        return $dollars < 0 ? "({$formatted})" : "{$formatted}";
    }
?>

<?php
    
  if(isset($_POST["username"])) {

    $username = filter_var(strip_tags($_POST["username"]), FILTER_SANITIZE_STRING);
    $rating = (int) filter_var(strip_tags($_POST["rating"]), FILTER_SANITIZE_STRING);
    $comment = filter_var(strip_tags($_POST["comment"]), FILTER_SANITIZE_STRING);

    $mysqli = retrieveDatabaseConnection();

    $sql = "INSERT INTO review (watch_id, rating, comment, username) VALUES (?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iiss", $id, $rating, $comment, $username);

    $success = $stmt->execute();

    if(!$success) {
      $insertError = "Execute failed: {$stmt->errno}";
    } else {
      $insertError = null;
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $metaHtml; ?>
    <?php require $bsCss; ?>
    
    <!-- Watches CSS -->
    <link rel="stylesheet" href="./assets/css/watches.css">
</head>

<body>
    <?php require $navigation; ?>
    <main class="container my-5">
        <section class="row">
            <div class="col-12 col-md-6">
                <div id="watch-carousel" class="carousel slide d-flex align-items-center justify-content-center" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                            // Get images from DB
                            $sql = "SELECT * FROM image WHERE watch_id = ?";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param('i', $watch->id);
                            $stmt->execute();
                            $images = $stmt->get_result();
                            $numOfImages = $images->num_rows;
                            $index = 0;

                            if($numOfImages > 0) {
                                while($image = $images->fetch_assoc()) {

                                    $active = $index===0 ? 'active' : '';

                                    echo "
                                        <li data-target='#watch-carousel' data-slide-to='$index' class='$active'></li>
                                    ";

                                    $index += 1;
                                }
                                }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                            // Get images from DB
                            $sql = "SELECT * FROM image WHERE watch_id = ?";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param('i', $watch->id);
                            $stmt->execute();
                            $images = $stmt->get_result();
                            $numOfImages = $images->num_rows;
                            $index = 0;
                            
                            if($numOfImages > 0) {
                                while($image = $images->fetch_assoc()) {
                                    $src = $image["src"];
                                    $alt = $image["alt"];
                                    
                                    $active = $index===0 ? 'active' : '';

                                    echo "
                                        <div class='carousel-item $active'>
                                            <img class='d-block w-100' src='$src' alt='$alt'>
                                        </div>
                                    ";

                                    $index += 1;
                                }
                                }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#watch-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#watch-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 py-5 d-flex flex-column justify-content-between">
                <div>
                    <h4 class="brand"><?php echo $brand->name; ?></h4>
                    <h1 class="name"><?php echo $watch->name; ?></h1>
                    <p class="model">MODEL: <?php echo $watch->id; ?></p>
                </div>
                <div class="mb-3 mb-md-0">
                    <h6 class="info m-0">ABOUT</h6>
                    <h6 class="about mb-2"><?php echo $watch->description; ?></h6>
                </div>
                <div class="mb-3 mb-md-0">
                    <h3 class="price"><?php echo formatDollars($watch->price); ?></h3>
                </div>
                <div>
                    <h6 class="info">MATERIAL: <em><?php echo $material->name; ?></em></h6>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-12 col-md-6 py-5">
                <h4 class="about m-0 mb-4">REVIEWS</h4>
                <?php
                    // Get images from DB
                    $sql = "SELECT * FROM review WHERE watch_id = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param('i', $watch->id);
                    $stmt->execute();
                    $reviews = $stmt->get_result();
                    $numOfReviews = $reviews->num_rows;

                    if($numOfReviews > 0) {
                        while($review = $reviews->fetch_assoc()) {
                            $username = $review["username"];
                            $rating = $review["rating"];
                            $comment = $review["comment"];

                            echo "
                                <div class='card w-100 p-3 mb-2'>
                                    <div class='d-flex align-items-center'>
                                        <div class='user d-flex align-items-center justify-content-center'>
                                            <i class='fas fa-user fa-2x'></i>
                                        </div>
                                        <div class='ml-3'>
                                            <h6 class='m-0'>$username</h6>
                                            <div>" .
                                            
                                            str_repeat("<i class='fas fa-star'></i>", $rating) 
                                            
                                        . " </div>
                                        </div>
                                    </div>
                                    <div class='bg-light rounded mt-4 d-flex p-3'>
                                        <p class='m-0'>$comment</p>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    ?>
            </div>
            <div class="col-12 col-md-6 py-5">
                <h4 class="about m-0 mb-4">WRITE A REVIEW</h4>
                <form action="" method="post">
                    <div class="form-group">
                      <label for="username" class="col-form-label">Username</label>
                      <div class="w-100">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <label for="rating" class="col-form-label mr-3">Rating</label>
                        <div class="d-flex">
                            <div class="custom-control custom-radio">
                                <input checked type="radio" id="rating1" name="rating" value="1" class="custom-control-input">
                                <label class="custom-control-label" for="rating1"></label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input type="radio" id="rating2" name="rating" value="2" class="custom-control-input">
                                <label class="custom-control-label" for="rating2"></label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input type="radio" id="rating3" name="rating" value="3" class="custom-control-input">
                                <label class="custom-control-label" for="rating3"></label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input type="radio" id="rating4" name="rating" value="4" class="custom-control-input">
                                <label class="custom-control-label" for="rating4"></label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input type="radio" id="rating5" name="rating" value="5" class="custom-control-input">
                                <label class="custom-control-label" for="rating5"></label>
                              </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment" class="col-form-label">Comments</label>
                        <div class="w-100">
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Comments"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                  </form>
            </div>
        </section>
    </main>

    <?php require $footer; ?>
    <?php require $bsScript; ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/dfab7e38a5.js" crossorigin="anonymous"></script>
</body>

</html>

<?php
//Disconnect from DB
$mysqli->close();
?>