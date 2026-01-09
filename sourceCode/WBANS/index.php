<?php 
include 'include_header.php';
include 'include_sidebar.php';
include 'connection.php';

$select = "SELECT * FROM employee";
// print_r($select);
// die();

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
<section class="section">
  <?php
$data = mysqli_query($conn,$select);
        $result = mysqli_num_rows($data);
        if($result)
        {
            while($row = mysqli_fetch_array($data))
            {
                ?>

<div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo $row['profile_img']; ?>" class="img-fluid rounded-start " alt="..." style="width: 80%;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['name']; ?></h5>
                  <p class="card-text" style="margin-top: -12px"><?php echo $row['designation']; ?></p>
                  <?php 
                  $t = $row['status'];
                  if($t == 1){
                  ?>
                  <p class= "fw-bold">Health Condition: </h6>
                      <span class="text-success fw-bold">Normal</span></p>
                         </br>
                  <a type="button" class="btn btn-primary mt-2" href="monitoring.php?id=<?php echo $row['id'];?>">View More</a>  
                  <?php } else { ?>
                    <p class="fw-bold text-danger" style="margin-top: -12px">Inactive</p>
                    <a type="button" class="btn btn-primary mt-2" href="monitoring.php?id=<?php echo $row['id'];?>">View More</a>  
                    <?php } ?>
                </div>
              </div>
            </div>
</div>
<?php
            }
          }
          ?>


</section>
</main>
<?php
include 'include_footer.php';
?>