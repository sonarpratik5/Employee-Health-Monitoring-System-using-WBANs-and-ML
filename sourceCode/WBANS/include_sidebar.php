<?php
  $page = basename($_SERVER['REQUEST_URI'], ".php");
  // echo $page;
  // die();
  ?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link <?php if($page != 'index'){?> collapsed <?php } ?>" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  
  <!-- <li class="nav-heading">Profile</li> -->
  <li class="nav-item">
    <a class="nav-link <?php if($page != 'profile'){?> collapsed <?php } ?>" href="profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>
  <?php
      if($_SESSION['user_type']== 2){?>
  <li class="nav-item">
    <a class="nav-link <?php if($page != 'employees'){?> collapsed <?php } ?>" href="employees.php">
      <i class="bi bi-person-plus"></i>
      <span>Employees</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($page != 'doctor'){?> collapsed <?php } ?>" href="doctor.php">
      <i class="bi bi-person-plus"></i>
      <span>Doctors</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($page != 'history'){?> collapsed <?php } ?>" href="history.php">
      <i class="bi bi-clock-history"></i>
      <span>History</span>
    </a>
  </li>
  <?php } ?>

</ul>

</aside><!-- End Sidebar-->