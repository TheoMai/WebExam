<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Album.php';

$database = new Database();
$db = $database->connect();

$album = new Album($db);

$album->ArtistId = isset($_GET['ArtistId']) ? $_GET['ArtistId'] : die();

    $result = $album->getFromArtist();

$num = $result->rowCount();

if($num > 0) {
    $albumArr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $albumItem = array(
            'AlbumId' => $AlbumId,
            'Title' => $Title
        );

        array_push($albumArr, $albumItem);
    }

    echo json_encode($albumArr);

}else{
    echo json_encode(
        array('message' => 'No Albums Found ')
    );
}