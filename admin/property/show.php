<?php
include_once('../../vendor/autoload.php');

use Pondit\Property\Property;

$id = $_GET['id'];
$webroot = "http://localhost/public/assets/uploads/properties/";

$propertyObj = new Property;
$property = $propertyObj->show($id);

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
        <h2 class="alert alert-info">Property Details</h2>
        <div class="container">
            <div class="row">
                
                <div class="col-md-6">
                    <p>Property ID: <?= $property['property_id'] ?></p>
                    <h4>Title: <?= $property['property_title'] ?></h4>
                    <p>Category: <?= $property['property_category'] ?></p>
                    <p>Area: <?= $property['area'] ?> Square Feet</p>
                    <p>Location: <?= $property['location'] ?></p>
                    <p>Price: $<?= $property['price'] ?></p>
                    <hr>
                    <h3>Description</h3>
                    <p><?= $property['property_description'] ?></p>
                    
                </div>
                <div class="col-md-6">
                    <img src="<?= $webroot . $property['property_image'] ?>" alt="Property Image" class="property-image img-fluid rounded shadow-lg">
                    <h4 class="mt-4">Contact Information</h4>
                    <p>Phone: xxx-xxx-xxxx</p>
                    <p>Email: <?= $property['contact_info'] ?></p>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="./index.php" class="btn btn-info btn-lg">Back</a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('../inc/partials/footer.php') ?>
</body>

</html>