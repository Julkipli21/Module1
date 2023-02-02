<?php

require_once 'database.php';

Class Otheramenities{
    //attributes

    public $id;
    public $amenity;
    public $description;
    public $capacity;
    public $inclusion;
    public $price;
    public $status;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO otheramenities (amenity, description, capacity, inclusion, price, status) VALUES 
        (:amenity, :description, :capacity, :inclusion, :price, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':amenity', $this->amenity);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':capacity', $this->capacity);
        $query->bindParam(':inclusion', $this->inclusion);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':status', $this->status);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE otheramenities SET amenity=:amenity, description=:description, capacity=:capacity, inclusion=:inclusion, price=:price, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':amenity', $this->amenity);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':capacity', $this->capacity);
        $query->bindParam(':inclusion', $this->inclusion);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM otheramenities WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM otheramenities WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM otheramenities ORDER BY amenity ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>