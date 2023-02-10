<title>Hotel Rooms</title>

<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged_id'])){
        header('location: ../login/login.php');
    }

    if($_SESSION['user_type'] != 'admin'){
        header('location: dashboard.php');
    }
    //if the above code is false then html below will be displayed

    require_once '../inclusion/header.php';
    require_once '../inclusion/sidebar.php';
    require_once '../classes/hotelrooms.class.php';
    

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

    
</head>
<body>
    

</body>
</html>
<div class="home-section">
<div class="home-content"><nav>
            <div class="side-bar-button"><i class='bx bx-menu' ></i>
            <span class="text" >Hotel Rooms</span> </div>
        </nav> 
        <div class="table-container">
        
            <div class="table-heading">
                <?php
                    if($_SESSION['user_type'] == 'admin'){ 
                ?>
                    
                <?php
                    }
                ?>
                <a id="addform" href="addhotelrooms.php" class="button">+ Add</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room Type</th>
                        <th>Room Description</th>
                        <th>Capacity</th>
                        <th>Inclusion</th>
                        <th>Price</th>
                        <th>Status</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){ 
                        ?>
                            <th class="action">Action</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $hotelrooms = new Hotelrooms();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($hotelrooms->show() as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['roomtype']?></td>
                            <td><?php echo $value['roomdescription'] ?></td>
                            <td><?php echo $value['capacity'] ?></td>
                            <td><?php echo $value['inclusion'] ?></td>
                            <td><?php echo $value['price'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){ 
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="edithotelrooms.php?id=<?php echo $value['id'] ?>">Edit</a>
                                        <a class="action-delete" href="deletehotelrooms.php?id=<?php echo $value['id'] ?>">Delete</a>
                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
            </table>
        </div>
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