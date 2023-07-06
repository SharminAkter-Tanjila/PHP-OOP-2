<?php
include_once('../../vendor/autoload.php');

use Pondit\Property\Property;
use Pondit\Helper;

$property = new Property;
if (isset($_POST['add'])) {
    $property->store($_POST, $_FILES);
}
// category from categories table 
$sql = "SELECT * from categories order by id desc";
$db = new Helper;
$db->connect();
$stmt = $db->prepareSql($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

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
        <div class="d-flex justify-content-center align-items-center my-3">
            <div class="card bg-light mx-auto shadow" style="width: 60rem;">
                <div class="card-body border rounded bg-light">
                    <div class="alert alert-secondary" role="alert">
                        <h2 class="text-center">Property Info</h2>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                            <!-- col md 6 -->
                            <div class="col-md-6">
                                <label for="property_id">Property ID</label>
                                <input class="form-control shadow" required type="text" name="property_id" id="property_id" placeholder="Enter ID"> <br>

                                <label for="property_title">Property Title</label>
                                <input class="form-control shadow" required type="text" name="property_title" id="property_title" placeholder="Enter Title"> <br>

                                <label for="location">Location</label>
                                <input class="form-control shadow" type="text" required name="location" id="location" placeholder="Enter Location"> <br>

                                <label for="price">Price</label>
                                <input class="form-control shadow" type="number" required name="price" id="price" placeholder="Enter Price"> <br>

                                <label for="property_image">Property Image</label>
                                <input class="form-control shadow" type="file" required name="property_image"> <br>


                            </div>
                            <!-- col md 6 -->
                            <div class="col-md-6">
                                <label for="property_category">Property Category</label>

                                <select class="form-select shadow" name="property_category" id="property_category">
                                    <option selected disabled value="0">Select Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['name']; ?>"><?= $category['name']; ?></option>

                                    <?php } ?>
                                </select><br>

                                <label for="property_description">Property Description</label>
                                <input class="form-control shadow" required type="text" name="property_description" id="property_description" placeholder="Enter Description"> <br>


                                <label for="area">Area</label>
                                <input class="form-control shadow" type="number" required name="area" id="area" placeholder="Enter Area"> <br>

                                <label for="contact_info">Contact Info</label>
                                <input class="form-control shadow" type="email" required name="contact_info" id="contact_info" placeholder="Enter Contact Info"> <br>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-secondary shadow" type="submit" value="add" name="add">Add Property</button>
                                <a class="btn btn-danger shadow" href="./index.php">Cancel</a><br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Product table  -->
        <?php include_once('../inc/partials/footer.php') ?>
</body>

</html>