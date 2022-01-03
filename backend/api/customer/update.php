<?php

session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, X-requested-With');

include_once '../../config/Database.php';
include_once '../../models/Customer.php';

$database = new Database();


if(isset($_POST['update'])){
    $con = $database->connect();
    $FirstName = strip_tags($_POST['FirstName']);
    $LastName = strip_tags($_POST['LastName']);
    $Password = $_POST['Password'];
    $Address = strip_tags($_POST['Address']);
    $City = strip_tags($_POST['City']);
    $Country = strip_tags($_POST['Country']);
    $PostalCode = strip_tags($_POST['PostalCode']);
    $Email = strip_tags($_POST['Email']);

    $currentUser = $_SESSION['FirstName'];

    $query = $con->prepare("SELECT * FROM customers WHERE FirstName=:FirstName");
    $query->bindParam(":FirstName", $currentUser);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    $CustomerId = $result['CustomerId'];

    if(updateDetails($con, $CustomerId, $FirstName, $LastName, $Password, $Address, $City, $Country, $PostalCode, $Email)){
        $_SESSION['FirstName'] = $FirstName;
        $_SESSION['Email'] = $Email;
        $_SESSION['Address'] = $Address;
        header("Location: ../../../frontend/main/mainShop.php");
    }
}

function updateDetails($con, $CustomerId, $FirstName, $LastName, $Password, $Address, $City, $Country, $PostalCode, $Email){
    $query = $con->prepare("UPDATE customers SET FirstName=:FirstName, LastName=:LastName, Password=:Password, Address=:Address,
                          City=:City, Country=:Country, PostalCode=:PostalCode, Email=:Email 
                          WHERE CustomerId=:CustomerId");

    $query->bindParam(":FirstName",$FirstName);
    $query->bindParam(":LastName", $LastName);
    $query->bindParam(":Password", $Password);
    $query->bindParam(":Address", $Address);
    $query->bindParam(":City", $City);
    $query->bindParam(":Country", $Country);
    $query->bindParam(":PostalCode", $PostalCode);
    $query->bindParam(":Email", $Email);
    $query->bindParam(":CustomerId", $CustomerId);

    return $query->execute();
}

function sanitizePass($string){
    $string = strip_tags($string);
    $string = hash('SHA256', $string);

    return $string;
}
