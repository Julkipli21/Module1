
<link rel="styesheet" href="../css/style.css">


<?php




    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $amenities = new Otheramenities;
        //sanitize user inputs
        $amenities->amenity = $_POST['amenity'];
        $amenities->description = $_POST['description'];
        $amenities->capacity = $_POST['capacity'];
        $amenities->inclusion = $_POST['inclusion'];
        $amenities->price = $_POST['price'];
        if(isset($_POST['status'])){
            $amenities->status = $_POST['status'];
        }
    }

    require_once '../inclusion/sidebar.php';


?>



    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add</h3>
                <a class="back" href="other-amenities.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="other-amenities.php" method="post">
                    <label for="amenity">Amenity</label>
                    <input type="text" id="amenity" name="amenity" required placeholder="Enter Amenity" value="<?php if(isset($_POST['amenity'])) { echo $_POST['amenity']; } ?>">
              
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required placeholder="Enter Description" value="<?php if(isset($_POST['description'])) { echo $_POST['description']; } ?>">
                
                    <label for="capacity">Capacity</label>
                    <input type="text" id="capacity" name="capacity" required placeholder="Enter Capacity" value="<?php if(isset($_POST['capacity'])) { echo $_POST['capacity']; } ?>">
            
                    <label for="inclusion">Inclusion</label>
                    <input type="text" id="inclusion" name="inclusion" required placeholder="Enter Inclusion" value="<?php if(isset($_POST['inclusion'])) { echo $_POST['inclusion']; } ?>">
                 
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" required placeholder="Enter Price" value="<?php if(isset($_POST['price'])) { echo $_POST['price']; } ?>">

                    <div>
                        <label for="status">Status</label><br>
                        <label class="container" for="Active">Active
                            <input type="radio" name="status" id="Active" value="Active" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" for="Expired">Expired
                            <input type="radio" name="status" id="Expired" value="Expired" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Expired') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <input type="submit" class="button" value="Save Program" name="save" id="save">
                </form>
            </div>
        </div>
    </div>
