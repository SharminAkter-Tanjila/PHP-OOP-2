<?php
include('../../vendor/autoload.php');
use Pondit\Category\Category;
$id = $_GET['id'];

$cat = new Category;
$category = $cat->show($id);
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
    
    <h2 class="alert alert-info text-center">Category Details | <span><a href="./index.php">List</a></span></h2>
    <div class=" row justify-content-center">
        <div class="bg-light p-3 my-3 col-8 shadow-lg rounded">
            <h5 class="d-inline-block bg-light">Category Name:</h5><br>
            <h4 class="alert alert-secondary "><?= $category['name'] ?></h4>

            <h5 class="d-inline-block bg-light">Category Description:</h5><br>
            <h4 class="alert alert-secondary "><?= $category['description']?> </h4>
        </div>
    </div>

<?php include_once('../inc/partials/footer.php') ?>

</body>

</html>
