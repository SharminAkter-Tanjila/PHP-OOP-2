<?php

namespace Pondit\Property;

use Exception;
use Pondit\Helper;

class Property
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $db = new Helper;
        $db->connect();

        $sql = "SELECT * FROM properties";
        $stmt = $db->prepareSql($sql);
        $properties = $stmt->execute();
        if ($properties) {
            $properties = $stmt->fetchAll();
            return $properties;
        }
        else {
            throw new Exception("Error fetching properties from the database");
        }
    }

    public function store($data, $image)
    {
        $property_id = $_POST['property_id'];
        $property_title = $_POST['property_title'];
        $property_category = $_POST['property_category'];
        $property_description = $_POST['property_description'];
        $location = $_POST['location'];
        $area = $_POST['area'];
        $price = $_POST['price'];
        $contact_info = $_POST['contact_info'];

        $property_image = $_FILES['property_image']['name'];
        $tmp_name = $_FILES['property_image']['tmp_name'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/uploads/properties/";
        move_uploaded_file($tmp_name, $targetDir . $property_image);

        $propertyData = [
            ':property_id' => $property_id,
            ':property_title' => $property_title,
            ':property_category' => $property_category,
            ':property_description' => $property_description,
            ':location' => $location,
            ':area' => $area,
            ':price' => $price,
            ':contact_info' => $contact_info,
            ':property_image' => $property_image
        ];
        // DB connect 
        $db = new Helper;
        $db->connect();
        // query 
        $sql = "INSERT INTO properties (property_id, property_title,property_category, property_description, location, area, price, contact_info, property_image) VALUES (:property_id, :property_title, :property_category, :property_description, :location, :area, :price, :contact_info, :property_image)";
        $stmt = $db->prepareSql($sql);
        $stmt->execute($propertyData);
        // redirect 
        $_SESSION['msg'] = "Data Stored Successfully!";
        header("Location:./index.php");
    }

    public function show($id)
    {
        $db = new Helper;
        $db->connect();
        // sql
        $sql = "SELECT * FROM properties WHERE id = $id";
        $stmt = $db->prepareSql($sql);
        $result = $stmt->execute();

        if ($result) {
            $result = $stmt->fetch();
            return $result;
        }
        else {
            throw new Exception("Error fetching property info from the database");
        }
    }

    public function update($data)
    {
        $id = $_POST['id'];
        $property_id = $_POST['property_id'];
        $property_title = $_POST['property_title'];
        $property_category = $_POST['property_category'];
        $property_description = $_POST['property_description'];
        $location = $_POST['location'];
        $area = $_POST['area'];
        $price = $_POST['price'];
        $contact_info = $_POST['contact_info'];

        $property_image = $_FILES['property_image']['name'];
        $tmp_name = $_FILES['property_image']['tmp_name'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/uploads/properties/";
        move_uploaded_file($tmp_name, $targetDir . $property_image);

        if(empty($tmp_name))
        {
            $property_image = $_POST['property_image'];
        }

        $updateData = [
            ':property_id' => $property_id,
            ':property_title' => $property_title,
            ':property_category' => $property_category,
            ':property_description' => $property_description,
            ':location' => $location,
            ':area' => $area,
            ':price' => $price,
            ':contact_info' => $contact_info,
            ':property_image' => $property_image
        ];

        $db = new Helper;
        $db->connect();

        $sql = "UPDATE properties SET property_id=:property_id, property_title =:property_title, property_category=:property_category, property_description=:property_description, location=:location, area=:area, price=:price, contact_info =:contact_info, property_image=:property_image WHERE id=$id";
        $stmt = $db->prepareSql($sql);
        $stmt->execute($updateData);

        $_SESSION['msg'] = "Data Updated Successfully!";
        header("Location:./index.php");
    }

    public function delete($id)
    {
        $db = new Helper;
        $db->connect();

        $sql = "DELETE FROM properties WHERE id=$id";
        $stmt = $db->prepareSql($sql);
        $stmt->execute();

        $_SESSION['error'] = "Data Deletion Success!";
        header("Location:./index.php");
    }
}
