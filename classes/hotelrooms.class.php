<?php

require_once 'database.php';

Class Hotelrooms{
    //attributes

    public $id;
    public $roomtype;
    public $roomdescription;
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
        $sql = "INSERT INTO hotel_rooms (room_type, room_description, capacity, inclusion, price, status) VALUES 
        (:room_type, :room_description, :capacity, :inclusion, :price, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':room_type', $this->roomtype);
        $query->bindParam(':room_description', $this->roomdescription);
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
        $sql = "UPDATE hotel_rooms SET room_type=:room_type, room_description=:room_description, capacity=:capacity, inclusion=:inclusion, price=:price, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':room_type', $this->roomtype);
        $query->bindParam(':room_description', $this->roomdescription);
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
        $sql = "SELECT * FROM hotel_rooms WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM hotel_rooms WHERE id = :id;";
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
        $sql = "SELECT * FROM hotel_rooms ORDER BY room_type ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>