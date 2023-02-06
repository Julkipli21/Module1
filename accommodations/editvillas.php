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

    if($_SESSION['user_type'] != 'admin'){
        header('location: dashboard.php');
    }
    //if the above code is false then html below will be displayed

    require_once '../classes/villas.class.php';
    

   $villas = new Villa;
    //if add program is submitted
    if(isset($_POST['save'])){
        //sanitize user inputs
        $villas->id = $_POST['villas-id'];
        $villas->vill_type = $_POST['vill_type'];
        $villas->description = $_POST['description'];
        $villas->capacity = $_POST['capacity'];
        $villas->inclusion = $_POST['inclusion'];
        $villas->price = $_POST['price'];
        $villas->status = 'Not Set';
        if(isset($_POST['status'])){
            $villas->status = $_POST['status'];
        }
            if($villas->edit()){
                //redirect user to program page after saving
                header('location: villas.php');
            }
    }else{
        if ($villas->fetch($_GET['id'])){
            $data = $villas->fetch($_GET['id']);
            $villas->id = $data['id'];
            $villas->vill_type = $data['vill_type'];
            $villas->description = $data['description'];
            $villas->capacity = $data['capacity'];
            $villas->inclusion = $data['inclusion'];
            $villas->price = $data['price'];
            $villas->status = $data['status'];
        }
    }
    
    require_once '../inclusion/header.php';
    require_once '../inclusion/sidebar.php';
    require_once '../tools/variables.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/0cc7e94eea.js" crossorigin="anonymous"></script>


<style>
    .formcontainer .btn {
        padding: 15px 18px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        margin-bottom: 15px;
        opacity: 0.8;
        
    }

    .cancel{
        background-color: #B22222;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
        padding: 15px 18px;
        border: none;
        color: #fff;
        cursor: pointer;
        margin-bottom: 15px;
        opacity: 0.8;
        width: 30%;
        margin-top: 10px;
    }


    .container form {
    
    justify-content: center;
    align-items: center;
    border: 2px solid black;
    padding: 20px;
    box-sizing: border-box;
    position: relative;
    background-color: #ccc;
    margin-left: 70px;
    margin-right: 80px;
    width: 60%;
    top: 70px;
    }
            input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    }

    label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    }

    input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;

    padding: 15px 18px;
        border: none;
        color: #fff;
        cursor: pointer;
        margin-bottom: 15px;
        opacity: 0.8;
        width: 30%;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .container {
    border-radius: 5px;
    background-color: #E4E9F7;
    padding: 20px;
    }

    .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    }

    .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;

    
    }
    .container1 {
        background-color: none;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}

</style>

    
</head>
<body>
    <div class="home-section">
        <div class="home-content">
        <nav>
            <div class="side-bar-button"><i class='bx bx-menu' ></i>
            <span class="text" style="margin-bottom: 15px;">Update Hotel Rooms</span> 
        </nav> 
    </div>
<div class="container" id="formcontainer">
  <form action="editvillas.php" method="post">
  <input type="text" hidden name="villas-id" value="<?php echo $villas->id; ?>">
  <div class="row">
    <div class="col-25">
      <label for="roomtype">Room Type</label>
    </div>
    <div class="col-75">
      <select id="vill_type" name="vill_type">
        <option value="None" <?php if(isset($_POST['vill_type'])) { if ($_POST['vill_type'] == 'None') echo ' selected="selected"'; } elseif ($villas->vill_type == 'None') echo ' selected="selected"';?>> <--Please Select--></option>
        <option value="Villa #1" <?php if(isset($_POST['vill_type'])) { if ($_POST['vill_type'] == 'Villa #1') echo ' selected="selected"'; } elseif ($villas->vill_type == 'Villa #1') echo ' selected="selected"';?>>Villa #1</option>
        <option value="Villa #2" <?php if(isset($_POST['vill_type'])) { if ($_POST['vill_type'] == 'Villa #2') echo ' selected="selected"'; } elseif ($villas->vill_type == 'Villa #2') echo ' selected="selected"';?>>Villa #2</option>
        <option value="Villa #3" <?php if(isset($_POST['vill_type'])) { if ($_POST['vill_type'] == 'Villa #3') echo ' selected="selected"'; } elseif ($villas->vill_type == 'Villa #3') echo ' selected="selected"';?>>Villa #3</option>
      </select>
      
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="description">Villa Description</label>
    </div>
    <div class="col-75">
      <input type="text" id="description" name="description" required placeholder="Enter Villa Description" value="<?php if(isset($_POST['description'])) { echo $_POST['description']; } else { echo $villas->description; } ?>">
    </div>
    
  </div>
  <div class="row">
    <div class="col-25">
      <label for="capacity">Capacity</label>
    </div>
    <div class="col-75">
      <select id="capacity" name="capacity">
        <option value="None" <?php if(isset($_POST['capacity'])) { if ($_POST['capacity'] == 'None') echo ' selected="selected"'; } elseif ($villas->capacity == 'None') echo ' selected="selected"';?>>  <--Please Select--></option>
        <option value="8 Persons Only" <?php if(isset($_POST['capacity'])) { if ($_POST['capacity'] == '8 Persons Only') echo ' selected="selected"'; } elseif ($villas->capacity == '8 Persons Only') echo ' selected="selected"';?>> 8 Persons Only</option>
        <option value="12 Persons Only" <?php if(isset($_POST['capacity'])) { if ($_POST['capacity'] == '12 Persons Only') echo ' selected="selected"'; } elseif ($villas->capacity == '12 Persons Only') echo ' selected="selected"';?>> 12 Persons Only</option>
        <option value="15 Persons Only" <?php if(isset($_POST['capacity'])) { if ($_POST['capacity'] == '15 Persons Only') echo ' selected="selected"'; } elseif ($villas->capacity == '15 Persons Only') echo ' selected="selected"';?>> 15 Persons Only</option>
      </select>
      
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="inclusion">Inclusion</label>
    </div>
    <div class="col-75">
    <textarea id="inclusion" name="inclusion" required placeholder="Write something.." style="height:200px"><?php if (isset($_POST['inclusion'])) { echo $_POST['inclusion']; } else { echo $villas->inclusion; } ?></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="number" id="price" name="price" required placeholder="Enter Price"value="<?php if(isset($_POST['price'])) { echo $_POST['price']; } else { echo $villas->price; } ?>">
    </div>

    <div class="row">
      <div class="col-25">
        <label for="status">Status</label><br>
        </div>
        <div class="col-75">
        <label class="container1" for="Active">Available
            <input type="radio" name="status" id="ActiAvailableve" value="Available" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Available') echo ' checked'; } elseif ($villas->status == 'Available') echo ' checked'; ?>>
            <span class="checkmark"></span>
        </label>
        <label class="container1" for="Expired">Unavailable
            <input type="radio" name="status" id="Unavailable" value="Unavailable" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Unavailable') echo ' checked'; } elseif ($villas->status == 'Unavailable') echo ' checked'; ?>>
        </label>
        </div>
    </div>
  <br>
  
  <div class="row">
    <input type="submit" value="save update" name="save" id="save">
    <a type="button" href="villas.php" class="btn cancel">Close</a>
  </div>
  </form>
</div>




  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });

  document.getElementById("addform").addEventListener("click", function(){
  document.getElementById("formcontainer").style.display = "block";
});

function closeForm() {
        document.getElementById("formcontainer").style.display = "none";
      }
  </script>
  
</body>
</html>
