<?php 
include "connection.php";
include "include_header.php";
include "include_sidebar.php"?><!-- End Sidebar-->

  <main id="main" class="main">
    
  <div class="pagetitle">
      <h1>History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">history</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     
    <div class="card">  
      <div class="card-body">
        <h5 class="card-title"></h5>

        <!-- Default Table -->
        <table class="table">
          <thead>
          <tr>
        <th scope="col">Id</th> 
        <th scope="col">Employee Name</th>
        <th scope="col">Problem</th>
        <th scope="col">Doctor's Remark</th>
        <!-- <th colspan="3" scope="col">Action</th> -->
    </tr>
    <?php
        
        $sql = "SELECT alert.id, alert.problem, alert.doctor_remark, employee.name
        FROM alert
        INNER JOIN employee ON alert.emp_id=employee.id;";
        
        $data = mysqli_query($conn,$sql);
        $result = mysqli_num_rows($data);
        if($result)
        {
            while($row = mysqli_fetch_array($data))
            {
                ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['problem']; ?></td>
                        <td><?php echo $row['doctor_remark']; ?></td>
                        
                        
                        
                </tr>
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td> No record found</td>
            </tr>
            <?php
        }
    ?>
</table>
     </div>
     </div>

<?php 
include "include_footer.php";
?>
