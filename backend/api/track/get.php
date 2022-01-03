<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Track.php';

$database = new Database();
$db = $database->connect();

$track = new Track($db);

$result = $track->get();

//get row count
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
        array('message' => 'No Tracks Found ')
    );
}
