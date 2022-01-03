<?php
class Artist {
    // DB Stuff
    private $conn;
    private $table = 'artists';

    // Properties
    public $ArtistId;
    public $Name;

    public function __construct($db){
        $this->conn = $db;
    }

    //Get all
    public function get() {
        $query = 'SELECT 
            a.ArtistId, 
            a.Name
          FROM ' . $this->table . ' a
          LIMIT 100';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
