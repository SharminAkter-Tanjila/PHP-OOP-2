<?php


include_once('../../vendor/autoload.php');

use Pondit\Category\Category;

$id = $_GET['id'];

$cat = new Category;
$category = $cat->show($id);

if (isset($_POST['submit'])) {
    $cat->update($_POST);
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
    <div class="bg-light p-3">
        <h4>Update Category Info</h4>
        <form action="" method="post">
            <div class=" row justify-content-center">
                <div class="bg-light p-3 my-3 col-8 shadow-lg rounded">
                <input class="w-50 form-control" type="hidden" name="id" id="id" value="<?= $id ?>">
                    <h5 class="d-inline-block bg-light">Category Name:</h5><br>
                    <h5><input class="form-control" type="text" required name="name" value="<?= $category['name'] ?>" id="name"></h5> <br>

                    <h5 class="d-inline-block bg-light">Category Description:</h5><br>
                    
                    <h4><input class="form-control" type="text" required name="description" value="<?= $category['description'] ?>" id="description"> </h4><br>

                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="./index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>


    </div>


    <?php include_once('../inc/partials/head.php') ?>

</body>

</html>