<?php
include 'include_header.php';
include 'include_sidebar.php';
include 'connection.php';
$int_id=$_GET['id'];
// print_r($int_id);
// die();

$select = "SELECT * FROM employee where id = $int_id";
$data = mysqli_query($conn,$select);
$row = mysqli_fetch_array($data);

$select2 = "SELECT * FROM medical where emp_id = $int_id";
$data2 = mysqli_query($conn,$select2);
$row2 = mysqli_fetch_array($data2);

$status = $row['status'];

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    

    <section class="section dashboard">
      <a type="button" class="btn btn-danger" href="alert.php?id=<?php echo $int_id?>" style = "margin-bottom: 20px">Generate an Alert</a>
      <div class="row">

      <!-- Sales Card -->
      <!-- <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">
 
            <div class="card-body">
              <h5 class="card-title">Select Employee</h5>
              <label for="inputState" class="form-label">State</label>
              <div class="d-flex align-items-center">
              
              <div class="col-md-4">
              <form method = 'get' action="">   
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>Pratik Sonar</option>
                    <option>Yash Ringe</option>
                    <option>Sanket Shinde</option>
                  </select>
                  <form> 
                </div>
                <div class="ps-3 ">
                <button class="btn btn-primary" type="submit" name="submit">Select</button>

                </div>
              </div>
              </form>
            </div>

          </div>
        </div> -->
        <!-- End Sales Card -->
      <?php 
      // if (isset($_REQUEST['submit'])) {
        if($status == 1){
      ?>
      

      <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">


          
            <div class="card-body">
              <h5 class="card-title">Model Prediction <span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-activity"></i>
                </div>
                <div class="ps-3">
                  <h6>Great Health</h6>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">ECG <span>/Today</span></h5>
                  <!-- <a type="button" class="btn btn-primary" href="demo_ecg.php" style = "float: right">Download ECG</a> -->
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <a type="button" class="btn btn-primary" href="demo_ecg.php" style = "float: right">Download ECG</a>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'ECG Score',
                          data: [95, 94, 95, 94, 94, 94, 92.5],
                        }, 
                        // {
                        //   name: 'Revenue',
                        //   data: [11, 32, 45, 32, 34, 52, 41]
                        // }, {
                        //   name: 'Customers',
                        //   data: [15, 11, 32, 18, 9, 24, 11]
                        // }
                      ],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

        <!-- Sales Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">SPO2 <span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-lungs"></i>
                </div>
                <div class="ps-3">
                  <h6>99</h6>
                  <span class="text-success small pt-1 fw-bold">Excellent</span>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- End Sales Card -->
        
        <!-- Sales Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Heart Rate<span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <div class="ps-3">
                  <h6 id="myText">78</h6>
                  <span class="text-success small pt-1 fw-bold">Normal</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->
<?php } ?>        
        </div><!-- End Right side columns -->
  <?php
  //  } 
  ?>
  <section class="section profile">
  <div class="row">
        
    <div class="col-xl-5">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="<?php echo $row['profile_img']; ?>" alt="Profile" class="rounded-circle">
          <h2><?php echo $row['name']; ?></h2>
          <h3><?php echo $row['designation']; ?></h3>
        </div>
      </div>
      <div class="card">
        <div class="card-body pt-3">
      <div class="tab-pane fade show active profile-overview">

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Name</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;"><?php echo $row['name']; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Company</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;">HealthMap</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Job</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;"><?php echo $row['designation']; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Country</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;"><?php echo $row['country']; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Address</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;"    ><?php echo $row['address']; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Phone</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;"><?php echo $row['phone']; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label" style="font-size: 13px;">Email</div>
                <div class="col-lg-9 col-md-8" style="font-size: 13px;"><?php echo $row['email']; ?></div>
              </div>

            </div>

    </div>
    </div>
    </div>

    <div class="col-xl-7">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Medical Data</button>
            </li>

            <!-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li> -->

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <a type="button" class="btn btn-primary" href="demo_pdf.php?id=<?php echo $int_id?>" style = "float: right">Download Data</a>
            <h5 class="card-title">Doctor's Remark</h5>
                  <p class="small fst-italic">Everythings great</p>
                  
              <h5 class="card-title">Health Details</h5>
              

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Age</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['age'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['gender'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Diabetic</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['diabetic'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Cholesterol</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['cholesterol'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Family History</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['family'];?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Allergies</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['allergies'];?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Height</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['height'];?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Weight</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['weight'];?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Daily Exercise</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['exercise'];?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Medication</div>
                <div class="col-lg-9 col-md-8"><?php echo $row2['medication'];?></div>
              </div>

              

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form>
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="assets/img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="Job" value="xsigner">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control" id="Country" value="USA">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form>

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
    
  </div>
</section>
      </div>
    </section>

  </main><!-- End #main -->
<?php
include 'include_footer.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
		$(document).ready(function() {
			var textArray = ['78', '80', '82', '81', '79']; // array of text options
			var currentIndex = 0; // current index in array
			
			setInterval(function() {
				$('#myText').fadeOut(500, function() { // fade out current text
					currentIndex = (currentIndex + 1) % textArray.length; // update current index
					$(this).text(textArray[currentIndex]).fadeIn(500); // update text with next option and fade in
				});
			}, 10000); // change interval time in milliseconds as desired
		});
	</script>