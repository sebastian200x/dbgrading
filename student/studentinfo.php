<?php
include_once "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Student Info</title>
</head>
<body>
  <?php
  $StudentID = $_SESSION['StudentID'];
  $query = mysqli_query($db, "SELECT * FROM tblstdinfo, tblacadinfo WHERE tblstdinfo.StdID = $StudentID AND tblacadinfo.StdID  = $StudentID");
  $info = mysqli_fetch_assoc($query);
  ?>
  <form method="post">
    <div class="container p-3 my-3 border">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Edit Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="enroll.php">Enrollment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="changepass.php">Change Password</a>
        </li>
      </ul>
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mb-2 text-primary">Information</h6>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" id="fname" disabled value="<?php echo $info['StdFName'] ?>">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="mname">Middle Name</label>
              <input type="text" class="form-control" id="mname" disabled value="<?php echo $info['StdMName'] ?>">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" id="lname" disabled value="<?php echo $info['StdLName'] ?>">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="bday">Date of Birth</label>
              <input type="text" class="form-control" id="bday" disabled value="<?php echo $info['StdBday'] ?>">
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="gender">Gender</label>
              <input type="text" class="form-control" id="gender" disabled value="<?php echo $info['StdSex'] ?>">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="civil">Civil Status</label>
              <input type="text" class="form-control" id="civil" disabled value="<?php echo $info['StdStatus'] ?>">
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group">
              <label for="section">Section</label>
              <input type="url" class="form-control" id="section" disabled value="<?php echo $info['StdSec'] ?>">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="form-group">
              <label for="program">Program</label>
              <input type="text" class="form-control" id="program" disabled value="<?php echo $info['StdCourse'] ?>">
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group">
              <label for="yearlevel">Year Level</label>
              <input type="text" class="form-control" id="yearlevel" disabled disabled value="<?php echo $info['StdYear'] ?>">
            </div>
          </div>


          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mb-2 text-primary">Address</h6>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
            <div class="form-group">
              <label for="Street">House No.</label>
              <input type="text" class="form-control" id="Street" placeholder="House Number" value="<?php echo $info['StdHNo'] ?>" name="StdHNo">
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <div class="form-group">
              <label for="ciTy">Street</label>
              <input type="text" class="form-control" id="ciTy" placeholder="Street" value="<?php echo $info['StdStreet'] ?>" name="StdStreet">
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
            <div class="form-group">
              <label for="zIp">Barangay</label>
              <input type="text" class="form-control" id="zIp" placeholder="Barangay" value="<?php echo $info['StdBarangay'] ?>" name="StdBarangay">
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
            <div class="form-group">
              <label for="zIp">City</label>
              <input type="text" class="form-control" id="zIp" placeholder="City" value="<?php echo $info['StdCity'] ?>" name="StdCity">
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
            <div class="form-group">
              <label for="zIp">Zip Code</label>
              <input type="text" class="form-control" id="zIp" placeholder="Zip Code" value="<?php echo $info['StdZip'] ?>"name="StdZip">
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
            <div class="text-middle">
              <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
              <button type="submit" id="cancel" name="cancel" class="btn btn-secondary">Cancel</button>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
          </div>

        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>
<?php
if (isset($_POST['update'])){
  $StdHNo = $_POST['StdHNo'];
  $StdStreet = $_POST['StdStreet'];
  $StdBarangay = $_POST['StdBarangay'];
  $StdCity = $_POST['StdCity'];
  $StdZip = $_POST['StdZip'];
  $update = mysqli_query($db, "UPDATE tblstdinfo SET StdHNo = '$StdHNo', StdStreet = '$StdStreet', StdBarangay = '$StdBarangay', StdCity = '$StdCity', StdZip = '$StdZip' WHERE tblstdinfo.stdID = " . $_SESSION['StudentID']);
  ?>
  <script type="text/javascript">
    window.alert("Update Successfully");
    window.location = "editinfo.php";
  </script>
  <?php
}
if (isset($_POST['cancel'])){ ?>
  <script type="text/javascript">
    window.location = "index.php";
  </script>
  <?php
}