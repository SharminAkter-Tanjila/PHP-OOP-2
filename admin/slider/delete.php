<?php
include('../../vendor/autoload.php');

use Pondit\Slider\Slider;

$slider = new Slider;

if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $slider->delete($id);
}


?>
