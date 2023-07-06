<?php

namespace Pondit\Category;

use Exception;
use Pondit\Helper;

class Category
{


    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $db = new Helper;
        $db->connect();

        $sql = ("SELECT * FROM categories");
        $stmt = $db->prepareSql($sql);
        $result = $stmt->execute();

        if ($result) {
            $result = $stmt->fetchAll();
            return $result;
        }
        else {
            throw new Exception("Error fetching category info from the database");
        }
    }

    public function store($data)
    {
        $name = $data['name'];
        $description = $data['description'];


        $catData = [
            ':name' => $name,
            ':description' => $description
        ];

        //dbconnect
        $db = new Helper;
        $db->connect();

        //sql
        $sql = "INSERT INTO categories (name, description ) VALUES (:name, :description )";
        $stmt = $db->prepareSql($sql);
        $stmt->execute($catData);

        $_SESSION['msg'] = "Data Stored Successfully!";
        header("Location:./index.php");
    }

    public function show($id)
    {
        $db = new Helper;
        $db->connect();

        $sql = ("SELECT * FROM categories WHERE id = $id");
        $stmt = $db->prepareSql($sql);
        $data = $stmt->execute();

        if ($data) {
            $data = $stmt->fetch();
            return $data;
        }
        else {
            throw new Exception("Error fetching Category info from the database");
        }
    }

    public function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];

        $updateData = [
            ':name' => $name,
            ':description' => $description,
        ];

        $db = new Helper;
        $db->connect();

        $sql = "UPDATE categories SET name=:name, description=:description WHERE id=$id";
        $stmt = $db->prepareSql($sql);
        $stmt->execute($updateData);

        $_SESSION['msg'] = "Data Updated Successfully!";
        header("Location:./index.php");
    }

    public function delete($id)
    {
        $db = new Helper;
        $db->connect();

        $sql = ("DELETE FROM categories WHERE id=$id");
        $stmt = $db->prepareSql($sql);
        $stmt->execute();

        $_SESSION['error'] = "Data Deletion Success!";
        header("Location:./index.php");
    }
}
