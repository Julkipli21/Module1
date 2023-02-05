

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/0cc7e94eea.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/sidebar.css">
</head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class="fa-solid fa-circle-user"></i>
      <span class="logo_name">Bernard Jay</span>
    </div>
    
    <form action="../login/login.php">
      <div class="logout-button">
      <input type="submit" value="Logout" class="logout" >
      </div>
    </form>
    <ul class="nav-links">
    <hr>
      <li>
        <a href="../dashboard/dashboard.php" >
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name" href="#">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class="fa-solid fa-hotel"></i>
            <span class="link_name">Accommodations</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Accommodations</a></li>
          <li><a href="../accommodations/hotel-rooms.php">Hotel Rooms</a></li>
          <li><a href="../accommodations/villas.php">Villas</a></li>
          <li><a href="../accommodations/cottages.php">Cottages</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class="fa-solid fa-tags"></i>
            <span class="link_name">Discounts & Promos</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Discounts & Promos</a></li>
          <li><a href="../discounts&promos/discounts.php">Discounts</a></li>
          <li><a href="../discounts&promos/promos.php">Promos</a></li>
        </ul>
      </li>
      <li>
        <a href="../payments/payments.php">
        <i class="fa-solid fa-coins"></i>
          <span class="link_name">Payments</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" >Payments</a></li>
        </ul>
      </li>
      <li>
        <a href="../sales-report/sales-report.php">
        <i class='bx bxs-report'></i>
          <span class="link_name">Sales Report</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Sales Report</a></li>
        </ul>
      </li>
      <li>
        <a href="../reservation/reservation.php">
        <i class="fa-solid fa-house-circle-check"></i>
          <span class="link_name">Reservation</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" >Reservation</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class="fa-solid fa-users-gear"></i>
            <span class="link_name">Accounts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Accounts</a></li>
          <li><a href="../accounts/admin.php">Admin</a></li>
          <li><a href="../accounts/customers.php">Customers</a></li>  
        </ul>
      </li>
      <li>
        <a href="../other-amenities/other-amenities.php">
        <i class="fa-solid fa-umbrella-beach"></i>
          <span class="link_name">Other Amenities</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Other Amenities</a></li>
        </ul>
      </li>
      <li>
        <a href="../archives/archives.php">
        <i class="fa-solid fa-folder-open"></i>
          <span class="link_name">Archives</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Archives</a></li>
        </ul>
      </li>
      <li>
        <a href="../settings/settings.php">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Settings</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name">Settings</a></li>
        </ul>
      </li>
</ul>
  </div>
  