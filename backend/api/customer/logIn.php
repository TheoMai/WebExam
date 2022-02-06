<?php

session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, X-requested-With');

include_once '../../config/Database.php';
include_once '../../models/Customer.php';

$database = new Database();


if(isset($_POST['login'])){
    $con = $database->connect();
    $Email = strip_tags($_POST['Email']);
    $Password = sanitizePass($_POST['Password']);

    Login($con, $Email, $Password);
}

function Login($con, $Email, $Password){
    $query = $con->prepare("SELECT * FROM customers WHERE Email=:Email AND Password=:Password");

    $query->bindParam(":Email", $Email);
    $query->bindParam(":Password", $Password);

    $query->execute();

    if($query->rowCount() == 1){
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $FirstName = $result['FirstName'];
        $_SESSION['FirstName'] = $FirstName;

        header("Location: ../../../frontend/main/mainShop.php");
    }else{
        echo "Wrong credentials";
    }

}

function sanitizePass($string){
    $string = strip_tags($string);
    $string = hash('SHA256', $string);

    return $string;
}
