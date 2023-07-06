<?php
include('../../vendor/autoload.php');

use Pondit\Category\Category;

$category = new Category;

if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $category->delete($id);
}
?>
