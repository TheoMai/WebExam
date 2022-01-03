<?php
class Track {
    // DB Stuff
    private $conn;
    private $table = 'tracks';

    // Properties
    public $TrackId;
    public $Name;
    public $AlbumId;
    public $MediaTypeId;
    public $GenreId;
    public $Composer;
    public $UnitPrice;

    public function __construct($db){
        $this->conn = $db;
    }

    //Get all
    public function get() {
        $query = 'SELECT 
            t.TrackId, 
            t.Name, 
            t.AlbumId,
            t.MediaTypeId,
            t.GenreId,
            t.Composer,
            t.UnitPrice
          FROM ' . $this->table . ' t 
          LIMIT 100  ';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getFromAlbum(){
        $query = 'SELECT 
            t.TrackId, 
            t.Name, 
            t.AlbumId,
            t.MediaTypeId,
            t.GenreId,
            t.Composer,
            t.UnitPrice
          FROM ' . $this->table . ' t 
          WHERE t.AlbumId = ?';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->AlbumId);

        $stmt->execute();

        return $stmt;
    }

}
