<?php
session_start();
/*
$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "phptest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

if (!empty($_POST['name'])) {

    $_POST["name"];
    $_POST["surname"];
    $_POST["birthday"];
    $_POST["sex"];
    $_POST["country"];

    $id = $_GET['id'];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $birthday = $_POST["birthday"];
    $sex = $_POST["sex"];
    $country = $_POST["country"];

    include('user.class.php');

    $user = new User();

    $updateUser = $user->update($id, $name, $surname, $birthday, $sex, $country);

 /*  $sql = "UPDATE user 
            SET name = '$name', surname = '$surname', birthday = '$birthday', 
            sex = '$sex', country = '$country' 
            WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header("Location: index.php");
        // echo $sql;
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "error";
}
$conn->close();*/
}