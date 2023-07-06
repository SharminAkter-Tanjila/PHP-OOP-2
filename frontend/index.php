<?php
include_once('../vendor/autoload.php');

use Pondit\Helper;

session_start();
$webroot = "http://localhost/public/assets/uploads/properties/";
$webrootSliders = "http://localhost/public/assets/uploads/sliders/";

$db = new Helper;
$db->connect();

$sqlProperties = "SELECT * FROM properties";
$stmtProperties = $db->prepareSql($sqlProperties);
$stmtProperties->execute();
$properties = $stmtProperties->fetchAll();

$sqlSliders = "SELECT * FROM sliders";
$stmtSliders = $db->prepareSql($sqlSliders);
$stmtSliders->execute();
$sliders = $stmtSliders->fetchAll();


?>


<!doctype html>
<html lang="en">
<?php include_once('inc/partials/head.php') ?>
<link rel="stylesheet" href="./custom.css">

<body id="body-pd">
    <!-- Header -->
    <!-- Vertical nav bar  -->
    <?php include_once('inc/partials/header.php') ?>
    <?php include_once('inc/partials/sidebar.php') ?>



    <!-- CAROUSEL  -->

    <section class="overflow-hidden slider-area">
        <div class="container slider rounded">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <?php
                    $counter = 0;
                    $active = 'active';
                    foreach ($sliders as $slider) { ?>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $counter ?>" class="<?= $active ?>" aria-current="true" aria-label="Slide 1"></button>
                    <?php }
                    $counter++;
                    $active = '';
                    ?>


                </div>

                <div class="carousel-inner shadow">
                    <?php
                    $active = 'active';
                    foreach ($sliders as $slider) { ?>
                        <div class="carousel-item <?= $active ?> ">
                            <img src="<?= $webrootSliders . $slider['image']; ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h4 class="text-light"><?= $slider['title']; ?></h4>
                                <p class="text-light"><?= $slider['description']; ?></p>
                            </div>
                        </div>
                    <?php

                        $active = '';
                    } ?>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- CAROUSEL  -->
    <section class="p-4">
        <div class="text-center" style="color:whitesmoke">
            <h2 class="my-3 text-dark">Find your ideal property</h2>
            <p class="mb-4 text-dark">Use the search form below to find properties that match your criteria.</p>
        </div>
        <!-- CALL TO ACTION -->
        <div class="container custom-container rounded p-5 shadow" style="width:80%">
            <div class="p-3 row">
                <!-- <form class="g-3"> -->
                <div class="offset-md-1 col-md-4">
                    <label for="inputArea" class="form-label text-light">Area</label>
                    <select id="inputArea" class="form-select">
                        <option selected>Choose...</option>
                        <option value="1">Uttara</option>
                        <option value="2">Azompur</option>
                        <option value="3">Abdullapur</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputType" class="form-label text-light">Type</label>
                    <select id="inputType" class="form-select">
                        <option selected>Choose...</option>
                        <option value="1">Apartment</option>
                        <option value="2">Flat</option>
                        <option value="3">Studio</option>
                    </select>
                </div>
                <div class="mt-4 col-md-3">
                    <button type="submit" class="btn dark-button">Search</button>
                </div>
                <!-- </form> -->
                <!-- </div> -->
            </div>
        </div>
    </section>
    <!-- CALL TO ACTION -->

    <!-- PROPERTY CARD -->
    <section class=" property-area py-3">
        <div class="container">
            <h3 class="text-center mt-3 pt-2">EXPLORE PROPERTIES</h3>

            <div class="h-100 mt-3">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Iteration -->
                    <?php
                    foreach ($properties as $property) {  ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src="<?= $webroot . $property['property_image'] ?>" alt="pexels-photo" class="card-img-top img-fluid" alt="Rent property image">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $property['property_title'] ?></h5>
                                    <span class="card-text text-muted"><?= $property['location'] ?></span>
                                    <p class="card-text">$<?= $property['price'] ?></p>
                                    <form action="./details.php" method="post">
                                        <input type="hidden" name="id" value="<?= $property['id'] ?>">
                                        <button type="submit" name="submit" class="btn btn-dark btn-lg">Details</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div><!-- PROPERTY CARD -->

        <div class="d-flex justify-content-center my-3">
            <a href="#" class="btn btn-outline-primary my-3 shadow">Browse All</a>
        </div>
    </section>


    <!-- category-->
    <section class="p-5">
        <div class="container">
            <h3 class="text-center mt-3 mb-4 pt-2">POPULAR CATEGORIES</h3>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="text-center">
                        <a href="#"><img src="../public/assets/frontend/images/building.png" alt=""></a>
                        <h4 class="mt-3">Flat</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <a href="#"><img src="../public/assets/frontend/images/home.png" alt=""></a>
                        <h4 class="mt-3">Apartment</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <a href="#"><img src="../public/assets/frontend/images/office.png" alt=""></a>
                        <h4 class="mt-3">Office</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <a href="#"><img src="../public/assets/frontend/images/shop.png" alt=""></a>
                        <h4 class="mt-3">Shop/Restaurant</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- category-->

    <section class="p-4 faq-area">
        <!-- FAQ -->
        <div class="container bg-light px-4 py-5 rounded">
            <h3 class="text-center pt-2">FAQs</h3>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            How do I apply for a rental property?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">To apply for a rental property, please fill out the online application form on our website.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            What is the security deposit for a rental property?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">The security deposit is typically one month\'s rent, but may vary depending on the property and other factors.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Are pets allowed in rental properties?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Some rental properties may allow pets, while others do not. Please check the property listing or contact us for more information.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- FAQ -->
    <?php include_once('inc/partials/footer.php') ?>
</body>

</html>