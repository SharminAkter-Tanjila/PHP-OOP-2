<?php
include('../../vendor/autoload.php');

use Pondit\Property\Property;

$property = new Property;

if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $property->delete($id);
}

?>



