<?php
session_start();
$webroot = "http://localhost/public/assets/uploads/properties/";
$webrootSliders = "http://localhost/public/assets/uploads/sliders/";

$server = "localhost";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=rentit", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

$stmt = $pdo->query("SELECT * FROM properties");
$properties = $stmt->fetchAll();


?>


<!DOCTYPE html>
<html>
<?php include_once('inc/partials/head.php') ?>

<body style="box-sizing:border-box;" id="body-pd">
    <?php include_once('inc/partials/header.php') ?>
    <?php include_once('inc/partials/sidebar.php') ?>
    <h1>Property List</h1>
    <!-- <div class="container-fluid row g-3">
        <?php
        foreach ($properties as $property) { ?>
            <div class="card col-6">
                <img src="https://images-cdn.bproperty.com/thumbnails/44872-800x600.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><? ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div> -->
    <div class="container h-100">
        <div class="row gy-3">
            <?php
            foreach ($properties as $property) { ?>
                <div class="card col-md-3 m-3" style="width: 30%">
                <img src="<?= $webroot . $property['property_image'] ?>" alt="pexels-photo" class="card-img-top" alt="Rent property image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $property['property_id'] ?></h5>
                        <p class="card-text"><?= $property['property_description'] ?></p>
                        <form action="./details.php" method="post" >
                            <input type="hidden" name="id" value="<?= $property['id']; ?>">
                            <button type="submit" name="submit" class="btn btn-dark btn-lg">Details</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php include_once('inc/partials/footer.php') ?>
</body>

</html>
