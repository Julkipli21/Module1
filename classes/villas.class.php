<?php

require_once 'database.php';

Class Villa{
    //attributes

    public $id;
    public $vill_type;
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
        $sql = "INSERT INTO villas (vill_type, description, capacity, inclusion, price, status) VALUES 
        (:vill_type, :description, :capacity, :inclusion, :price, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':vill_type', $this->vill_type);
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
        $sql = "UPDATE villas SET vill_type=:vill_type, description=:description, capacity=:capacity, inclusion=:inclusion, price=:price, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':vill_type', $this->vill_type);
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
        $sql = "SELECT * FROM villas WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM villas WHERE id = :id;";
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
        $sql = "SELECT * FROM villas ORDER BY vill_type ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>