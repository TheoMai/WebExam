<?php

session_start();

include_once("../../backend/config/Database.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Final Project</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="inputBox">
    <form action='../../backend/api/customer/update.php' method="post">
        <div class="formGroup">
            <label>Name</label>
            <input type="text" name="FirstName" class="input-field" placeholder="John">
        </div>
        <div class="formGroup">
            <label>Last Name</label>
            <input type="text" name="LastName" class="input-field" placeholder="Doe">
        </div>
        <div class="formGroup">
            <label>Password</label>
            <input type="text" name="Password" class="input-field" placeholder="password">
        </div>
        <div class="formGroup">
            <label>Address</label>
            <input type="text" name="Address" class="input-field" placeholder="John Street">
        </div>
        <div class="formGroup">
            <label>City</label>
            <input type="text" name="City" class="input-field" placeholder="John City">
        </div>
        <div class="formGroup">
            <label>Country</label>
            <input type="text" name="Country" class="input-field" placeholder="Johnland">
        </div>
        <div class="formGroup">
            <label>Postal Code</label>
            <input type="text" name="PostalCode" class="input-field" placeholder="JohnPost">
        </div>
        <div class="formGroup">
            <label>Email</label>
            <input type="text" name="Email" class="input-field" placeholder="john@gmail.com">
        </div>
        <input type="submit" value="update" name="update">
    </form>
</div>
<script src="main.js"></script>
</body>
</html>
