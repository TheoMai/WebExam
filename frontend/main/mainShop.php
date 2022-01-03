<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Final Project</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

<?php
session_start();
include_once("../../backend/config/Database.php");

echo "Welcome " . $_SESSION['FirstName'];
echo "  <a href='logout.php'>Logout</a>  ";
echo "  <a href='update.php'>Update User</a>  ";



?>

<div class="mainContainer">
    <div id="row-center">
        <button onclick="showArtists().then()" class="selectAllButton">Select Artists</button>
        <button onclick="showAlbums().then()" class="selectAllButton">Select Albums</button>
        <button onclick="showTracks().then()" class="selectAllButton">Select Tracks</button>
    </div>
    <div id="table">
        <table>
            <tr id="header">

            </tr>
            <tbody id="tableRow"></tbody>
        </table>
    </div>
</div>
<script src="../process/process.js"></script>
<script src="main.js"></script>
</body>
</html>
