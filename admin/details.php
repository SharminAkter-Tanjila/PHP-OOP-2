<?php
session_start();
$id = $_POST['id'] ?? null;
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

$stmt = $pdo->query("SELECT * FROM properties where id = '$id'");
$properties = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html>
<?php include_once('inc/partials/head.php') ?>

<body id="body-pd">
    <?php include_once('inc/partials/header.php') ?>
    <?php include_once('inc/partials/sidebar.php') ?>


    <div class="container">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item"><a href="index.php">Property </a></li>
                <li class="breadcrumb-item"><a href="#" aria-current="page">Apartments for Rent</a></li>
            </ol>
        </nav>
        <div class="row gy-3">
            <?php
            foreach ($properties as $property) { ?>
                <div class="card col-md-8">
                    <img src="https://i.ibb.co/FbNxpwY/pexels-photo-7018391.webp" alt="pexels-photo-7018391" class="card-img-top" alt="Rent property image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $property['property_id'] ?></h5>
                        <p class="card-text"><?php echo $property['property_description'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bx bx-bed"></i> 4
                                <i class="bx bx-bath "></i> 2
                                <i class="bx bx-ruler"></i> 1220 sqft
                            </div>
                            <div>
                                <button class="btn btn-outline-secondary me-2">
                                    <i class="bx bx-share"></i> Share
                                </button>
                                <button class="btn btn-outline-secondary">
                                    <i class="bx bx-bookmark"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="btn btn-secondary mt-3">Read More</a>
                    </div>
                </div>

                <div class="col-md-3 mx-4 border rounded border-outline-success bg-light" style="width: 29%">
                    <div class="card col-md-12 ">

                        <div class="card-body ">
                            <h5 class="card-title text-center">Managed by<br><b>Rent !t</b></h5>
                            <img src="https://i.ibb.co/VLx8vJk/download.png" alt="download" class="img-thumbnail ">
                            <hr>
                            <p class="card-text text-muted fs-6 text-center">Contact us for more information</p>
                            <form action="" class="form-group align-right">
                                <label class="form-label">Name:
                                </label> <input class="form-control" placeholder="John Doe" type="text" name="name">
                                <br>
                                <label class="form-label">Email: </label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="email">
                                <br>
                                <label class="form-label">Phone: </label>
                                <input class="form-control" type="text" placeholder="+880" name="phone"><br>
                            </form>
                            <button class="btn btn-success"><i class="bx bx-phone fs-5"></i>Call</button>
                            <button class="btn btn-success mx-4">Send Mail</button>
                        </div>
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
