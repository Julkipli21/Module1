

<?php

    require_once '../tools/functions.php';
    require_once '../classes/hotelrooms.class.php';
    require_once 'hotel-rooms.php';


    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $hotelrooms = new Hotelrooms;
        //sanitize user inputs
        $hotelrooms->roomtype = $_POST['room_type'];
        $hotelrooms->roomdescription = $_POST['room_description'];
        $hotelrooms->capacity = $_POST['capacity'];
        $hotelrooms->inclusion = $_POST['inclusion'];
        $hotelrooms->price = $_POST['price'];
        $hotelrooms->status = 'Not Set';
        if(isset($_POST['status'])){
            $hotelrooms->status = $_POST['status'];
        }
            if($hotelrooms->add()){
                //redirect user to page after saving
                header('location: ../hotel-rooms.php');
            
        }
    }

    require_once '../tools/variables.php';

?><div class="add-form-container">
                <div class="table-heading form-size">
                <h3 class="table-title">Add New Hotel Rooms</h3>
                <a class="back" href="hotel-rooms.php"><i class='bx bx-caret-left'></i>Back</a>
            </div><form class="add-form" action="addhotelrooms.php" method="post">
                    <label for="room_type">Room Type</label>
                    <input type="text" id="room_type" name="room_type" required placeholder="Enter Room Type" value="<?php if(isset($_POST['room_type'])) { echo $_POST['room_type']; } ?>">
                
                    <label for="room_description">Room Description</label>
                    <input type="text" id="room_description" name="room_description" required placeholder="Enter Room Description" value="<?php if(isset($_POST['room_description'])) { echo $_POST['room_description']; } ?>">
           
                    <label for="capacity">Capacity</label>
                    <input type="text" id="capacity" name="capacity" required placeholder="Enter Capacity" value="<?php if(isset($_POST['capacity'])) { echo $_POST['capacity']; } ?>">
                    
                    <label for="inclusion">Inclusion</label>
                    <input type="text" id="inclusion" name="inclusion" required placeholder="Enter The Inclusion" value="<?php if(isset($_POST['inclusion'])) { echo $_POST['inclusion']; } ?>">
                    
                    <label for="availabe">Available</label>
                    <input type="text" id="availabe" name="availabe" required placeholder="Enter Availability" value="<?php if(isset($_POST['availabe'])) { echo $_POST['availabe']; } ?>">

                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" required placeholder="Enter Price" value="<?php if(isset($_POST['price'])) { echo $_POST['price']; } ?>">

                    <input type="submit" class="button" value="Save Update" name="save" id="save">
                </form>
            </div>
    <div class="home-content">
        <div class="table-container">
            
            
        </div>
    </div>
