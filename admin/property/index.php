<?php
include_once('../../vendor/autoload.php');

use Pondit\Property\Property;

$webroot = "http://localhost/public/assets/uploads/properties/";

$propertyObj = new Property;
$properties = $propertyObj->index();

?>

<!DOCTYPE html>
<html>
<?php include_once('../inc/partials/head.php') ?>

<body id="body-pd">
    <?php include_once('../inc/partials/header.php') ?>
    <?php include_once('../inc/partials/sidebar.php') ?>

    <div class="height-100 bg-light p-2">
        <div class="height-100 bg-light">
            <h4>Property Info </h4>
            <?php
            if (isset($_SESSION['msg'])) { ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> <?php echo $_SESSION['msg'] ?>
                </div>
            <?php unset($_SESSION['msg']);
            } ?>
            <?php
            if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Deleted!</strong> <?php echo $_SESSION['error'] ?>
                </div>
            <?php unset($_SESSION['error']);
            } ?>


            <a class="btn btn-primary my-2 " href="./create.php">Add Property</a>
            <table id="example" class="table table-hover table-striped text-center shadow" style="width:100%">
                <thead class="table-dark ">
                    <tr>
                        <th class="text-center">Serial No.</th>
                        <th class="text-center">Property ID</th>
                        <th class="text-center">Property Title</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Property Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($properties as $property) { ?>
                        <tr>
                            <th class="align-middle"><?= $i++; ?></th>
                            <th class="align-middle"><?= $property['property_id'] ?></th>
                            <th class="align-middle"><?= $property['property_title'] ?></th>
                            <th class="align-middle"><?= $property['property_category'] ?></th>
                            <th class="align-middle"><img src="<?= $webroot . $property['property_image'] ?>" alt="image" height="70px" width="100px"></th>
                            <td class="align-middle">
                                <a class="btn btn-primary my-1" href="./show.php?id=<?= $property['id']; ?>">Show</a>
                                <a class="btn btn-warning my-1" href="./edit.php?id=<?= $property['id']; ?>">Edit</a>
                                <form action="./delete.php" method="post" class="d-inline-block">
                                    <input type="hidden" name="id" value="<?= $property['id']; ?>">
                                    <input type="submit" name="submit" class="btn btn-danger my-1" value="Delete" onclick="confirm('Are you Sure?')">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <?php include_once('../inc/partials/footer.php') ?>
</body>

</html>