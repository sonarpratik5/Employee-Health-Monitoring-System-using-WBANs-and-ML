<?php 
include "include_header.php";
include "include_sidebar.php";
include "connection.php";
use Twilio\Rest\Client;

if(isset($_GET['id'])){
     $int_id=$_GET['id'];
} else {
$int_id=$_REQUEST['emp_id'];
}

$select = "SELECT * FROM employee where id = $int_id";
$data = mysqli_query($conn,$select);
$row = mysqli_fetch_array($data);


if (isset($_REQUEST['submit'])) {
$problem = $_REQUEST['problem'];
$remark = $_REQUEST['remark'];

$query    = "INSERT into alert (emp_id, problem, doctor_remark) VALUES ('$int_id','$problem','$remark')";
            
$result   = mysqli_query($conn, $query);
if($result){
  require_once 'vendor/autoload.php'; // Include the Twilio PHP library
// Twilio account credentials
$accountSid = 'AC70bb3822f32c967ec9f83f32a947445a'; // Replace with your Twilio account SID
$authToken = 'ccb02c1b5a4c33e187192dd6bc074c80'; // Replace with your Twilio auth token

// Create a new Twilio client
$client = new Client($accountSid, $authToken);
$emp_name = $row['name'];
// Sending SMS
$fromNumber = '+13613226552'; // Replace with your Twilio phone number
$toNumber = $row['helpline']; // Replace with the recipient's phone number
$message = ".
Alert! $emp_name may be in danger!.
Problem: $problem.
Doctor Remark: $remark"; // Replace with your SMS message

try {
    $client->messages->create(
        $toNumber,
        [
            'from' => $fromNumber,
            'body' => $message
        ]
    );
    // header("Location: index.php ");
} catch (Exception $e) {
    echo 'Failed to send SMS. Error: ' . $e->getMessage();
}
}


}


?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Generate Alert</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Generate Alert</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="<?php echo $row['profile_img']; ?>" alt="Profile" class="rounded-circle" style="width: 15%; margin-bottom: 10px;">
          <h5><?php echo $row['name']; ?></h5>
          <h6><?php echo $row['designation']; ?></h6>
        </div>
      </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Problem</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="problem" placeholder="Problem">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Doctor's Remark</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="remark" placeholder="Remark">
                  </div>
                </div>
                                            
                <input type="hidden" name="emp_id" value="<?php echo $int_id ?>">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-danger" value="submit" name="submit">Trigger an Alarm</button>
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