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

    require_once '../classes/accounts.class.php';
    

    if(isset($_POST['save'])){

        $accounts = new Accounts;
        //sanitize user inputs
        $accounts->photo = $_POST['photo'];
        $accounts->firstname = $_POST['firstname'];
        $accounts->lastname = $_POST['lastname'];
        $accounts->middle = $_POST['middle'];
        $accounts->contact = $_POST['contact'];
        $accounts->birthday = $_POST['birthday'];
        $accounts->position = $_POST['position'];
        $accounts->user_type = $_POST['user_type'];
        $accounts->unit = $_POST['unit'];
        $accounts->street = $_POST['street'];
        $accounts->barangay = $_POST['barangay'];
        $accounts->city = $_POST['city'];
        $accounts->username = $_POST['username'];
        $accounts->password = $_POST['password'];
    
        if($accounts->add()){
        //redirect user to program page after saving
        header('location: admin.php');
    }
}

    require_once '../tools/variables.php';
    require_once '../inclusion/header.php';
    require_once '../inclusion/sidebar.php';

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
  .formcontainer {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .form-modal {
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    padding: 20px;
    position: relative;
  }

  .form-header {
    align-items: center;
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    width: 100%;
  }

  .form-header h3 {
    font-size: 24px;
    margin: 0;
  }

  .close-button {
    background-color: transparent;
    border: 0;
    cursor: pointer;
    font-size: 36px;
    outline: 0;
  }

  .form-body {
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .form-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px;
    width: 100%;
  }

  .form-label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
    width: 30%;
  }

  .form-input {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
    width: 68%;
  }

  .form-actions {
    align-items: center;
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    width: 100%;
  }

  .form-submit {
    background-color: #8ebf42;
    border: 0;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    padding: 10px 20px;
  }

  .column {
    width: 33.33%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .column .form-label,
  .column .form-input {
    width: 100%;
  }
</style>



    
</head>
<body>
    <div class="home-section">
        <div class="home-content">
        <nav>
            <div class="side-bar-button"><i class='bx bx-menu' ></i>
            <span class="text">Add New Account (Admin, Cashier, Receptionist)</span> 
        </nav> 
    </div>
    <div class="formcontainer">
  <div class="form-modal">
    <div class="form-header">
      <h3>Form</h3>
      <button class="close-button">&times;</button>
    </div>
    <div class="form-body">
      <div class="form-row">
        <div class="column">
          <label class="form-label">PHOTO</label>
          <input type="file" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">FIRSTNAME</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">LASTNAME</label>
          <input type="text" class="form-input">
        </div>
      </div>
      <div class="form-row">
        <div class="column">
          <label class="form-label">MIDDLE</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">CONTACT NUMBER</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">BIRTHDAY</label>
          <input type="date" class="form-input">
        </div>
      </div>
      <div class="form-row">
        <div class="column">
          <label class="form-label">POSITION</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">USER TYPE</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">UNIT</label>
          <input type="text" class="form-input">
        </div>
      </div>
      <div class="form-row">
        <div class="column">
          <label class="form-label">STREET</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">BARANGAY</label>
          <input type="text" class="form-input">
        </div>
        <div class="column">
          <label class="form-label">CITY</label>
          <input type="text" class="form-input">
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button class="form-submit">Submit</button>
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

  document.getElementById("addform").addEventListener("click", function(){
  document.getElementById("formcontainer").style.display = "block";
});

function closeForm() {
        document.getElementById("formcontainer").style.display = "none";
      }
  </script>
  
</body>
</html>
