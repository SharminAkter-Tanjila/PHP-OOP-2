<?php
include('../../vendor/autoload.php');
use Pondit\Category\Category;

$category = new Category;
$categories = $category ->index();
?>


<!DOCTYPE html>
<html>
<?php include_once('../inc/partials/head.php') ?>

<body  id="body-pd">
    <?php include_once('../inc/partials/header.php') ?>
    <?php include_once('../inc/partials/sidebar.php') ?>

    <div class="height-100 bg-light p-2">
        <div class="height-100 bg-light">
            <h4>Category Info </h4>
            <?php
            if(isset($_SESSION['msg'])){ ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> <?php echo $_SESSION['msg']?>
            </div>
            <?php unset($_SESSION['msg']); }?>
            <?php
            if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Deleted!</strong> <?php echo $_SESSION['error']?>
            </div>
            <?php unset($_SESSION['error']); }?>


            <a class="btn btn-primary m-2 " href="./create.php">Create</a>
            <table  id="example" class="table table-hover table-striped text-center shadow" >
                <thead class="table-dark ">
                    <tr>
                        <th class="text-center">Serial No.</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                    $i=1;
                    foreach($categories as $category){?>
                    <tr>
                        <th class="align-middle"><?= $i++;?></th>
                        <th class="align-middle"><?= $category['name']?></th>
                        

                        <td class="align-middle">
                            <a class="btn btn-primary my-1" href="./show.php?id=<?= $category['id']; ?>">Show</a>
                            <a class="btn btn-warning my-1" href="./edit.php?id=<?= $category['id']; ?>">Edit</a>
                            <form action="./delete.php" method="post" class="d-inline-block">
                                <input type="hidden" name="id" value="<?=$category['id'];?>">
                            <button type ="submit" name="submit" class="btn btn-danger my-1" onclick="confirm('Are you Sure?')">Delete</button></form>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

    </div>
    <?php include_once('../inc/partials/footer.php') ?>
</body>

</html>
