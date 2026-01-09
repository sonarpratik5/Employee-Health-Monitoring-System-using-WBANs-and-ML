<?php 
include "connection.php";
include "include_header.php";
include "include_sidebar.php"?>

  <main id="main" class="main">
    
  <div class="pagetitle">
      <h1>Employees</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Employee</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     
    <div class="card">  
      <div class="card-body">
        <h5 class="card-title"></h5>
        <a class="btn btn-outline-primary" style="margin: 2px; float: right;" href="employee_add.php">Add Employee</a>

        <!-- Default Table -->
        <table class="table">
          <thead>
          <tr>
        <th scope="col">Id</th> 
        <th scope="col">Name</th>
        <th scope="col">Designation</th>
        <th scope="col">Phone</th>
        <th colspan="3" scope="col">Action</th>
    </tr>
    <?php
        
        $sql = "SELECT * FROM employee WHERE id != 6";
        
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
                        <td><?php echo $row['designation']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td ><a class="btn btn-outline-primary" href="employee_view.php?id=<?php echo $row['id'];?>">View</a></td>
                        <td ><a class="btn btn-outline-primary" href="employee_edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
                         <td ><a class="btn btn-outline-primary" onclick="return confirm('Are you sure,you want to delete')" href="employee_delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
                        
                        
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
