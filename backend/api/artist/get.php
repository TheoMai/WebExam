<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Artist.php';

$database = new Database();
$db = $database->connect();

$Artist = new Artist($db);

$result = $Artist->get();

//get row count
$num = $result->rowCount();

if($num > 0) {
    $ArtistArr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $ArtistItem = array(
          'ArtistId' => $ArtistId,
          'Name' => $Name
        );

        array_push($ArtistArr, $ArtistItem);
    }

    echo json_encode($ArtistArr);

}else{
    echo json_encode(
        array('message' => 'No Artists Found ')
    );
}
