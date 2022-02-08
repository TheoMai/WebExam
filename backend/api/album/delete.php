<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Track.php';

try{
$database = new Database();
$conn = $database->connect();

$track = new track($conn);

$track->TrackId = isset($_GET['TrackId']) ? $_GET['TrackId'] : die();

$track->deleteTrack();

echo "Successfully deleted!";

}catch(Exception $ex){
    echo $ex->getMessage();
}

