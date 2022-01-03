<?php
class Album {
    // DB Stuff
    private $conn;
    private $table = 'albums';

    // Properties
    public $AlbumId;
    public $Title;
    public $ArtistId;

    public function __construct($db){
        $this->conn = $db;
    }

    //Get all
    public function get() {
        $query = 'SELECT 
            p.AlbumId, 
            p.Title, 
            p.ArtistId,
            a.Name as ArtistName
          FROM ' . $this->table . ' p 
          LEFT JOIN artists a ON p.ArtistId = a.ArtistId 
          LIMIT 100';



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }


    public function getFromArtist(){
        $query = 'SELECT 
            p.AlbumId, 
            p.Title, 
            p.ArtistId
          FROM ' . $this->table . ' p
          WHERE p.ArtistId = ?';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ArtistId);

        $stmt->execute();

        return $stmt;
    }

}
