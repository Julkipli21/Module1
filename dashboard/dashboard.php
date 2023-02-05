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

    require_once '../inclusion/sidebar.php';
    require_once '../tools/variables.php';
    $dashboard="active";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/0cc7e94eea.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>

    
    

<div class="home-section">
    <div class="home-content">
        <nav>
            <div class="side-bar-button"><i class='bx bx-menu' ></i>
            <span class="text" style="margin-bottom: 15px;">Dashboard</span> </div>
        </nav>
      <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Available Hotel Rooms</div>
                    <div class="number">11</div>
                    <div class="indicator">
                        
                    </div>
                </div>
                <i class="fa-sharp fa-solid fa-door-open" style="font-size:50px; margin-left: 60px;"></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Available Villa</div>
                    <div class="number">23</div>
                    <div class="indicator"></div>
                </div>
                <i class="fa-solid fa-house-chimney-window" style="font-size:50px; margin-left: 60px;"></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Availabe Cottages</div>
                    <div class="number">21</div>
                    <div class="indicator"></div>
                </div>
                <i class="fa-sharp fa-solid fa-house" style="font-size:50px; margin-left: 60px;"></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Monthly Sales</div>
                    <div class="number">₱ 123, 456.00 </div>
                    <div class="indicator"></div>
                </div>
                <i class="bx bxs-report" style="font-size:50px; margin-left: 60px;"></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Registered Users</div>
                    <div class="number">123, 456</div>
                    <div class="indicator"></div>
                </div>
                <i class="fa-sharp fa-solid fa-user" style="font-size:50px; margin-left: 60px;"></i>
            </div>

            <div class="box">
                <div class="right-side">
                <div>
                    <p>Today is <?php echo date("l"); ?></p>
                    <p>The date is <?php echo date("m/d/Y"); ?></p>
                    <p id="time">The time is <?php echo date("h:i:sa"); ?></p>
                </div>

                <script>
                    function updateTime() {
                        var now = new Date();
                        var time = document.getElementById("time");
                        time.innerHTML = "The time is " + now.toLocaleTimeString();
                    }

                    setInterval(updateTime, 1000);
                </script>


                    </div>
                    <img src="../image/event-date-and-time-symbol.png" style="margin-left: 50px;" width="50px" >
                
            </div>
        </div>
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
  </script>
  
</body>
</html>