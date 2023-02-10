

<?php

  //start session
  session_start();

  //check if user is login already
  if(isset($_SESSION['logged_id']) && $_SESSION['user_type'] == 'admin'){
      header('location: ../dashboard/dashboard.php');
  }else if(isset($_SESSION['logged_id']) && $_SESSION['user_type'] == 'faculty'){
      header('location: ../faculty/dashboard.php');
  }else if(isset($_SESSION['logged_id']) && $_SESSION['user_type'] == 'student'){
      header('location: ../student/index.php');
  }

?>