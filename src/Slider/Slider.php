<?php

namespace Pondit\Slider;

use Exception;
use Pondit\Helper;

class Slider
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $db = new Helper;
        $db->connect();

        $sql = "SELECT * FROM sliders";
        $stmt = $db->prepareSql($sql);
        $sliders = $stmt->execute();
        if ($sliders) {
            $sliders = $stmt->fetchAll();
            return $sliders;
        }
        else {
            throw new Exception("Error fetching slider info from the database");
        }
    }

    public function store($data)
    {
        $title = $data['title'];
        $description = $data['description'];

        $slider_image = $_FILES['slider_image']['name'];
        $tmp_name = $_FILES['slider_image']['tmp_name'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/uploads/sliders/";
        move_uploaded_file($tmp_name, $targetDir . $slider_image);

        $sliderData = [
            ':title' => $title,
            ':description' => $description,
            ':slider_image' => $slider_image
        ];
        // DB connect 
        $db = new Helper;
        $db->connect();
        // query 
        $sql = "INSERT INTO sliders (title, description, image) VALUES (:title, :description, :slider_image)";
        $stmt = $db->prepareSql($sql);
        $stmt->execute($sliderData);
        // redirect 
        $_SESSION['msg'] = "Data Stored Successfully!";
        header("Location:./index.php");
    }

    public function show($id)
    {
        $db = new Helper;
        $db->connect();
        // sql
        $sql = "SELECT * FROM sliders WHERE id = $id";
        $stmt = $db->prepareSql($sql);
        $slider = $stmt->execute();

        if ($slider) {
            $slider = $stmt->fetch();
            return $slider;
        }
        else {
            throw new Exception("Error fetching slider info from the database");
        }
    }

    public function update($data, $image)
    {
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];

        $slider_image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/uploads/sliders/";
        move_uploaded_file($tmp_name, $targetDir . $slider_image);

        $updateData = [
            ':title' => $title,
            ':description' => $description,
            ':slider_image' => $slider_image
        ];
        $db = new Helper;
        $db->connect();

        $sql = "UPDATE sliders SET title=:title, description=:description, image=:slider_image WHERE id=$id";
        $stmt = $db->prepareSql($sql);
        $stmt->execute($updateData);

        $_SESSION['msg'] = "Data Updated Successfully!";
        header("Location:./index.php");
    }

    public function delete($id)
    {
        $db = new Helper;
        $db->connect();

        $sql = "DELETE FROM sliders WHERE id=$id";
        $stmt = $db->prepareSql($sql);
        $stmt->execute();

        $_SESSION['msg'] = "Data Deletion Success!";
        header("Location:./index.php");
    }
}
