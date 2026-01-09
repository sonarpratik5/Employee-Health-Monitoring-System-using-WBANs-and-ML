<?php 
include "include_header.php";
include "include_sidebar.php";
include "connection.php";

if (isset($_REQUEST['submit'])) {
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$designation = $_REQUEST['designation'];
$country = $_REQUEST['country'];

        $check=mysqli_query($conn,"select * from employee where email='$email'");
        $checkrows=mysqli_num_rows($check);
        $checkrows=mysqli_num_rows($check);

       if($checkrows>0) 
       {
          echo "This email-Id is alredy exit"."<br>"."please enter another email-Id";
       }
       else
       {
          $query    = "INSERT into employee (name, designation, country, address, phone, email)
                       VALUES ('$name','$designation','$country', '$address', '$phone', '$email')";
            
            $result   = mysqli_query($conn, $query); 
          }

}
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Employee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Employee</li>
          <li class="breadcrumb-item active">Add Employee</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Designation</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="designation" placeholder="Engineer">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone" placeholder="Phone">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" placeholder="India">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" placeholder="Address">
                  </div>
                </div>
                
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>


      </div>
    </section>

  </main><!-- End #main -->
  <?php
include 'include_footer.php';
?>