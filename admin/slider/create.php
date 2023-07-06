<?php
include_once('../../vendor/autoload.php');

use Pondit\Slider\Slider;

$slider = new Slider;
if(isset($_POST['add'])){
    $slider->store($_POST);
}


?>
<!DOCTYPE html>
<html>

    <?php include_once('../inc/partials/head.php') ?>
<link rel="stylesheet" href="style.css">

<body id="body-pd">
    <!-- Header -->
    <?php include_once('../inc/partials/header.php') ?>
    <div class="row container-fluid">
        <?php include_once('../inc/partials/sidebar.php') ?>

        <!-- Product entry form  -->
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card bg-light mx-auto" style="width: 60rem;">
            <div class="card-body border rounded bg-light">
                <div class="alert alert-secondary" role="alert">
                    <h2 class="text-center">New Slider Info</h2>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    <label for="title">Title</label>
                    <input class="w-50 form-control" required type="text" name="title" id="title" > <br>
                    
                    <label for="description">Description</label>
                    <input class="w-50 form-control" required type="text" name="description" id="description" > <br>
                    
                    <label for="slider_image">Image</label>
                    <input class="w-50 form-control" type="file" required name="slider_image" id="image" > <br>
                    
                    <div class="text-start">
                    <button class="w-25 btn btn-lg btn-secondary" type="submit" value="add" name="add">Add</button>
                    <a class="w-25 btn btn-lg btn-danger" href="./index.php">Cancel</a><br><br>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
    <!-- Product table  -->
    <?php include_once('../inc/partials/footer.php') ?>

</body>
</html>
