<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/track.php';

$database = new Database();
$db = $database->connect();

$track = new track($db);

$track->AlbumId = isset($_GET['AlbumId']) ? $_GET['AlbumId'] : die();

$result = $track->getFromAlbum();

$num = $result->rowCount();

if($num > 0) {
    $trackArr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $trackItem = array(
            'TrackId' => $TrackId,
            'Name' => $Name,
            'AlbumId' => $AlbumId,
            'MediaTypeId' => $MediaTypeId,
            'GenreId' => $GenreId,
            'Composer' => $Composer,
            'UnitPrice' => $UnitPrice
        );

        array_push($trackArr, $trackItem);
    }

    echo json_encode($trackArr);

}else{
    echo json_encode(
        array('message' => 'No tracks Found ')
    );
}