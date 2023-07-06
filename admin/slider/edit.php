<?php
include_once('../../vendor/autoload.php');

use Pondit\Slider\Slider;

$id = $_GET['id'];
$webroot = "http://localhost/public/assets/uploads/sliders/";

$sliderObj = new Slider;
$slider = $sliderObj->show($id);

if(isset($_POST['submit'])){
    $sliderObj->update($_POST, $_FILES);
}



?>

<!DOCTYPE html>
<html>
<?php include_once('../inc/partials/head.php') ?>
<link rel="stylesheet" href="style.css">

<body id="body-pd">
    <!-- Header -->
    <?php include_once('../inc/partials/header.php') ?>
    <!-- Vertical nav bar  -->
    <?php include_once('../inc/partials/sidebar.php') ?>
    <!-- Main contents  -->
    <div class="height-100 bg-light p-3">
        <h4>Update Slider Info | <span><a href="./index.php">List</a></span></h4>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?= $slider['id'] ?>"> <br>
            <label for="title">Title</label>
            <input class="w-50 form-control" type="text" name="title" id="title" value="<?= $slider['title'] ?>"> <br>

            <label for="description">Description </label>
            <input class="w-50 form-control" type="text" required name="description" value="<?= $slider['description'] ?>" id="description"> <br>

            <label for="image">Slider Image </label>
            <div class="mb-4">
                <input class="w-50 form-control" type="file" required name="image"> <br>
                <img src="<?= $webroot . $slider['image'] ?>" alt="image" height="250px" width="300px">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="./index.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>

    <?php include_once('../inc/partials/footer.php') ?>

</body>

</html>