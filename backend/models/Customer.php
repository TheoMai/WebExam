<?php
class Customer {
    // DB Stuff
    private $conn;
    private $table = 'customers';

    // Properties
    public $FirstName;
    public $LastName;
    public $Company;
    public $Address;
    public $City;
    public $Country;
    public $Phone;
    public $Email;

    public function __construct($db){
        $this->conn = $db;
    }

    //Create Customer
    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' 
            SET
                FirstName = :FirstName,
                LastName = :LastName,
                Company = :Company,
                Address = :Address,
                City = :City,
                Country = :Country,
                Phone = :Phone,
                Email = :Email ';

        $stmt = $this->conn->prepare($query);

        #Clean Data
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->Company = htmlspecialchars(strip_tags($this->Company));
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->City = htmlspecialchars(strip_tags($this->City));
        $this->Country = htmlspecialchars(strip_tags($this->Country));
        $this->Phone = htmlspecialchars(strip_tags($this->Phone));
        $this->Email = htmlspecialchars(strip_tags($this->Email));

        #Bind Data
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':Company', $this->Company);
        $stmt->bindParam(':Address', $this->Address);
        $stmt->bindParam(':City', $this->City);
        $stmt->bindParam(':Country', $this->Country);
        $stmt->bindParam(':Phone', $this->Phone);
        $stmt->bindParam(':Email', $this->Email);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;

    }

}
