<?php

session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, X-requested-With');

include_once '../../config/Database.php';
include_once '../../models/Customer.php';

$database = new Database();


if(isset($_POST['register'])){
    $con = $database->connect();
    $FirstName = strip_tags($_POST['FirstName']);
    $LastName = strip_tags($_POST['LastName']);
    $Password = sanitizePass($_POST['Password']);
    $Address = strip_tags($_POST['Address']);
    $City = strip_tags($_POST['City']);
    $Country = strip_tags($_POST['Country']);
    $PostalCode = strip_tags($_POST['PostalCode']);
    $Email = strip_tags($_POST['Email']);

    if(insertDetails($con, $FirstName, $LastName, $Password, $Address, $City, $Country, $PostalCode, $Email)){
        $_SESSION['FirstName'] = $FirstName;
        $_SESSION['Address'] = $Address;
        $_SESSION['Email'] = $Email;

        header("Location: ../../../frontend/main/mainShop.php");
    }
}

function insertDetails($con, $FirstName, $LastName, $Password, $Address, $City, $Country, $PostalCode, $Email){
    $query = $con->prepare("INSERT INTO customers (FirstName, LastName, Password, Address, City, Country, PostalCode, Email)
                            VALUES(:FirstName, :LastName, :Password, :Address, :City, :Country, :PostalCode, :Email) ");

    $query->bindParam(":FirstName",$FirstName);
    $query->bindParam(":LastName", $LastName);
    $query->bindParam(":Password", $Password);
    $query->bindParam(":Address", $Address);
    $query->bindParam(":City", $City);
    $query->bindParam(":Country", $Country);
    $query->bindParam(":PostalCode", $PostalCode);
    $query->bindParam(":Email", $Email);

    return $query->execute();
}

function sanitizePass($string){
    $string = strip_tags($string);
    $string = hash('SHA256', $string);

    return $string;
}
