<?php
include_once('../../vendor/autoload.php');

use Pondit\Slider\Slider;

$id = $_GET['id'];
$webroot = "http://localhost/public/assets/uploads/sliders/";

$sliderObj = new Slider;
$slider = $sliderObj->show($id);
?>

<!DOCTYPE html>
<html>
<?php include_once('../inc/partials/head.php') ?>
<link rel="stylesheet" href="style.css">

<body id="body-pd">
    <!-- Header  -->
    <?php include_once('../inc/partials/header.php') ?>
    <!-- vertical Nav bar  -->
    <?php include_once('../inc/partials/sidebar.php') ?>

    <!-- Main content  -->
    <div class="height-250 bg-light">
        <h2 class="alert alert-warning">Property Details | <span><a href="./index.php">List</a></span></h2>
        <div class="px-3">
            <h4>Title:</h4> <span>
                <h5 class="alert alert-secondary"><?= $slider['title'] ?></h5>
            </span>
            <h4>Description:</h4><span>
                <h5 class="alert alert-secondary"><?= $slider['description'] ?></h5>
            </span>
            <h4>Image:</h4><span>
                <img src="<?= $webroot . $slider['image'] ?>" alt="image" height="250px" width="300px">
            </span>
        </div>
    </div>


    <?php include_once('../inc/partials/footer.php') ?>
</body>

</html>