<?php
include "include_header.php";
include "include_sidebar.php";
?>

  <main id="main" class="main">

    <!-- End Page Title -->

<?php
include("connection.php");
$edit_id=$_GET['id'];
// print_r($edit_id);
// die();
  $sql =" SELECT * FROM doctor WHERE id = '$edit_id'";
$data = mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($data);
// print_r($row);
// die();
$name=$row['name'];
$designation=$row['designation'];
$country=$row['country'];
$address=$row['address'];
$phone=$row['phone'];
$email = $row['email'];
$password = $row['password'];
//print_r($install_address);die();
?>
<?php
if (isset($_POST['update'])) 
  {
//     $isp_select = $_POST['isp_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $update_data = "UPDATE doctor SET name='$name', address='$address',
  phone='$phone',designation='$designation',country='$country', email = '$email', password = '$password' WHERE id='$edit_id'";
    //print_r($Id); die();
    $result = mysqli_query($conn,$update_data);
    //print_r($update_data);die();
    if ($result) 
    { ?>
      <script type="text/javascript">
        alert(" Data update successfully");
        //header("Location:customer_table.php");
        window.open("http://localhost/pict/doctor.php","_self");
      </script>
      <?php
    }
    else
    { 
      ?>
      <script type="text/javascript">
        alert(" please try again");
      </script>
      <?php
    } 
  }
?>

 

    <div class="card">
     <div class="card-body">
       <h5 class="card-title">Edit Customer</h5>
       

       <!-- General Form Elements -->
       <form method="post" action="">

         <div class="row mb-3">
           <label for="inputText" class="col-sm-2 col-form-label">Name</label>
           <div class="col-sm-10">
           <input type="text" class="form-control" id="Name" name="name" value="<?php echo $name ;?>" placeholder="Name">
           </div>
         </div>
         <div class="row mb-3">
           <label for="inputText" class="col-sm-2 col-form-label">Email</label>
           <div class="col-sm-10">
           <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ;?>" placeholder="Email">
           </div>
         </div>
         <div class="row mb-3">
           <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
           <div class="col-sm-10">
           <textarea class="form-control" id="Address" name="address" rows="3" placeholder="Address"><?php echo $address ;?></textarea>
           </div>
         </div>
         <div class="row mb-3">
           <label for="inputEmail" class="col-sm-2 col-form-label">Designation</label>
           <div class="col-sm-10">
           <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $designation ;?>"placeholder="Telephone Number">
           </div>
         </div>
         <div class="row mb-3">
           <label for="inputEmail" class="col-sm-2 col-form-label">Mobile Number</label>
           <div class="col-sm-10">
           <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ;?>"placeholder="Mobile Number">
           </div>
         </div>
         <div class="row mb-3">
           <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
           <div class="col-sm-10">
           <input type="text" class="form-control" id="password" name="password" value="<?php echo $password ;?>"placeholder="Password">
           </div>
         </div>

         <div class="row mb-3">
           <label class="col-sm-2 col-form-label">Submit Button</label>
           <div class="col-sm-10">
             <button type="submit" value="Update" name="update" class="btn btn-primary">Submit Form</button>
           </div>
         </div>

       </form><!-- End General Form Elements -->

     </div>
   </div>

</main>
     

<?php
include 'include_footer.php';
?>