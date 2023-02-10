<?php

require_once 'database.php';

Class Accounts{
    //attributes

    public $id;
    public $photo;
    public $firstname;
    public $lastname;
    public $middle;
    public $contact;
    public $birthday;
    public $position;
    public $user_type;
    public $unit;
    public $street;
    public $barangay;
    public $city;
    public $username;
    public $password;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods



    function sign_in(){
        $sql = "SELECT * FROM accounts WHERE BINARY username = :username AND BINARY password = :password AND user_type = 'customer';";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }



    function sign_in_admin(){
        $sql = "SELECT * FROM staff_profile WHERE BINARY username = :username AND BINARY password = :password AND user_type != 'customer';";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }


    function get_account_info($id=0){
        if($id == 0){
            $sql = "SELECT * FROM staff_profile WHERE BINARY username = :username AND BINARY password = :password;";
            $query=$this->db->connect()->prepare($sql);
            $query->bindParam(':username', $this->username);
            $query->bindParam(':password', $this->password);
        }else{
            $sql = "SELECT * FROM account WHERE id = :id;";
            $query=$this->db->connect()->prepare($sql);
            $query->bindParam(':id', $id);
        }
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    

    function add(){
        $sql = "INSERT INTO staff_profile (photo, firstname, lastname, middle, contact, birthday, position, user_type, unit, street, barangay, city,  username, password) VALUES 
        (:photo, :firstname, :lastname, :middle, :contact, :birthday, :position, :user_type, :unit, :street, :barangay, :city, :username, :password );";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':photo', $this->photo);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':middle', $this->middle);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':birthday', $this->birthday);
        $query->bindParam(':position', $this->position);
        $query->bindParam(':user_type', $this->user_type);
        $query->bindParam(':unit', $this->unit);
        $query->bindParam(':street', $this->street);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':city', $this->city); 
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE staff_profile SET photo=:photo, firstname=:firstname, lastname=:lastname, middle=:middle, contact=:contact, birthday=:birthday, position=:position, user_type=:user_type, street=:street, barangay=:barangay, city=:city, username=:username, password=:password WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':photo', $this->photo);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':middle', $this->middle);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':birthday', $this->birthday);
        $query->bindParam(':position', $this->position);
        $query->bindParam(':type', $this->user_type);
        $query->bindParam(':unit', $this->unit);
        $query->bindParam(':street', $this->street);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':city', $this->city); 
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM staff_profile WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM staff_profile WHERE id = :id;";
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
        $sql = "SELECT * FROM staff_profile ORDER BY lastname ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}


?>