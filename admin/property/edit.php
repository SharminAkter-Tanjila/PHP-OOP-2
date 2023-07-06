<?php
include_once('../../vendor/autoload.php');

use Pondit\Helper;
use Pondit\Property\Property;

$id = $_GET['id'];
$webroot = "http://localhost/public/assets/uploads/properties/";

$sql = ("SELECT * from categories order by id desc");
$db = new Helper;
$db->connect();
$stmt = $db->prepareSql($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

$propertyObj = new Property;
$property = $propertyObj->show($id);



if (isset($_POST['submit'])) {
    $propertyObj->update($_POST);
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
    <div class="d-flex justify-content-center align-items-center my-3">
        <div class="card bg-light mx-auto shadow" style="width: 60rem;">
            <div class="card-body border rounded bg-light">
                <div class="alert text-center">
                    <br>
                    <h4>Update Property Info | <span><a href="./index.php">List</a></span></h4>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    <input class="w-50 form-control" type="hidden" name="id" id="id" value="<?= $id ?>"> <br>
                    <div class="row gx-5">
                        <!-- col md 6 -->
                        <div class="col-md-6">
                            <label for="property_id">Property ID</label>
                            <input class="form-control shadow" required type="text" name="property_id" id="property_id" value="<?= $property['property_id'] ?>"> <br>

                            <label for="property_title">Property Title</label>
                            <input class="form-control shadow" required type="text" name="property_title" id="property_title" value="<?= $property['property_title'] ?>"> <br>

                            <label for="property_description">Property Description</label>
                            <input class="form-control shadow" required type="text" name="property_description" id="property_description" value="<?= $property['property_description'] ?>"> <br>

                            <label for="location">Location</label>
                            <input class="form-control shadow" type="text" required name="location" id="location" value="<?= $property['location'] ?>"> <br>


                            <label for="price">Price</label>
                            <input class="form-control shadow" type="number" required name="price" id="price" value="<?= $property['price'] ?>"> <br>

                            <label for="contact_info">Contact Info</label>
                            <input class="form-control shadow" type="email" required name="contact_info" id="contact_info" value="<?= $property['contact_info'] ?>"> <br>

                        </div>
                        <!-- col md 6 -->
                        <div class="col-md-6 ">
                            <label for="property_category">Property Category</label>

                            <select class="form-select shadow" name="property_category" id="property_category">
                                <option disabled value="0">Select Category</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category['name']; ?>" <?php if ($property['property_category'] == $category['name']) echo 'selected' ?>><?= $category['name']; ?></option>
                                <?php } ?>
                            </select><br>

                            <label for="area">Area</label>
                            <input class="form-control shadow" type="number" required name="area" id="area" value="<?= $property['area'] ?>"> <br>

                            <label for="property_image">Property Image </label>
                            <input class="form-control" type="file" name="property_image"> <br>

                            <!-- If image is not selected -->
                            <?php if (empty($_FILES['property_image']['name'])) { ?>
                                <input type="hidden" value="<?= $property['property_image'] ?>" name="property_image">
                            <?php } ?>

                            <div class="mb-4">
                                <img src="<?= $webroot . $property['property_image'] ?>" alt="image" class="img-fluid shadow rounded">
                            </div> <br>
                        </div>
                        <div class="my-2 text-center">
                            <button type="submit" name="submit" class="btn btn-primary shadow">Update</button>
                            <a href="./index.php" class="btn btn-danger shadow">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../inc/partials/footer.php') ?>
</body>

</html>