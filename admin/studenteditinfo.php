
<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Student Info</title>
</head>
<body>
  <?php 
  $StudentID = $_SESSION['stdid'];
  ?>
  <form method="post">
    <div class="container p-3 my-3 border">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Edit Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="changepass.php">Change Password</a>
        </li>
      </ul>
      <div class="col-12">
        <h5 class="text-center">Manage Student Info</h5>
      </div>
      <div class="row py-3">
        <?php
        $query = mysqli_query($db, "SELECT * FROM tblstdinfo, tblacadinfo, tblstd WHERE tblstdinfo.StdID = '$StudentID' AND tblacadinfo.StdID  = '$StudentID' AND tblstd.StdID = '$StudentID'");
        $info = mysqli_fetch_assoc($query);
        ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Information</h6>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $info['StdFName'] ?>" placeholder="First Name" required>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="mname">Middle Name</label>
            <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $info['StdMName'] ?>" placeholder="Middle Name">
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $info['StdLName'] ?>" placeholder="Last Name" required>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="bday">Date of Birth</label>
            <input type="text" class="form-control" id="bday" name="bday" value="<?php echo $info['StdBday'] ?>" placeholder="Birthday" required>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" list="gender-list" value="<?php echo $info['StdSex'] ?>" placeholder="Gender" required>
            <datalist id="gender-list">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </datalist>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="civil">Civil Status</label>
            <input type="text" class="form-control" id="civil" name="status" value="<?php echo $info['StdStatus'] ?>" placeholder="Civil Status" required>
          </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Address</h6>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
          <div class="form-group">
            <label for="StdHNo">House No.</label>
            <input type="number" class="form-control" id="StdHNo" placeholder="House Number" value="<?php echo $info['StdHNo'] ?>" name="StdHNo" required>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
          <div class="form-group">
            <label for="StdStreet">Street</label>
            <input type="text" class="form-control" id="StdStreet" placeholder="Street" value="<?php echo $info['StdStreet'] ?>" name="StdStreet" required>
          </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
          <div class="form-group">
            <label for="StdBarangay">Barangay</label>
            <input type="text" class="form-control" id="StdBarangay" placeholder="Barangay" value="<?php echo $info['StdBarangay'] ?>" name="StdBarangay" required>
          </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
          <div class="form-group">
            <label for="StdCity">City</label>
            <input type="text" class="form-control" id="StdCity" placeholder="City" value="<?php echo $info['StdCity'] ?>" name="StdCity" required>
          </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
          <div class="form-group">
            <label for="StdZip">Zip Code</label>
            <input type="number" class="form-control" id="StdZip" pattern="(?=.*?[0-9])[0-9]{4}" placeholder="Zip Code" value="<?php echo $info['StdZip'] ?>"name="StdZip" maxlength="4" required>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Academic Info</h6>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
          <div class="form-group">
            <label for="section">Student Number</label>
            <input type="number" class="form-control" id="stdno" name="stdno" value="<?php echo $info['StdUser'] ?>" name="stdno" placeholder="Student Number" required>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
          <div class="form-group">
            <label for="yearsec">Year and Section</label>
            <small class="text-muted">Ex: 1A, 2B</small>
            <?php $year = (int)filter_var($info['StdSec'], FILTER_SANITIZE_NUMBER_INT); ?>
            <?php $sec = substr($info['StdSec'], -1); ?>
            <input class="form-control" type="text" pattern="[1-4][A-Z]" maxlength="2" title="Please follow the example. One number and one letter only." id="yearsec" name="yearsec" placeholder="Year and Section" value="<?php echo $year . $sec ?>" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
          <div class="form-group">
            <label for="sem">Semester</label>
            <select class="form-control" id="sem" name="sem" required>
              <option value="<?php echo $info['StdSem']; ?>" hidden selected><?php echo $info['StdSem']; ?></option>
              <option value="1st">1st</option>
              <option value="2nd">2nd</option>
            </select>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

          <div class="form-group">
            <label for="dept">Department</label>
            <input class="form-control" type="text" list="dept-list" id="dept" name="dept" placeholder="Department" value="<?php echo $info['StdDept']; ?>" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
            <datalist id="dept-list">
              <?php 
              $deptq = mysqli_query($db, "SELECT DISTINCT StdDept FROM tblacadinfo");
              while($deptf = mysqli_fetch_assoc($deptq)){ 
                ?>
                <option value="<?php echo $deptf['StdDept'] ?>"></option>
              <?php } ?>
            </datalist>
          </div>
        </div>
        <div class="col-3">
        </div>
        <div class="col-6">
          <div class="form-group text-center">
            <label for="course">Course</label>
            <input class="form-control text-center" type="text" id="course" name="course" placeholder="Course" readonly value="<?php echo $info['StdCourse'] ?>">
          </div>
        </div>
        <div class="col-3">
        </div>
        <div class="col-12 text-center">
          <button type="submit" id="accept" name="update" class="btn btn-success">Update Information</button>
          <button type="submit" id="cancel" name="cancel" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</body>
</html>
<?php 
if (isset($_POST['update'])) {

  $stdno = $_POST['stdno'];

  $accept1 = "UPDATE
  `tblstd`
  SET
  `StdUser` = '$stdno',
  `StdReg` = '1'
  WHERE StdID = '$StudentID'";

  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $bday = $_POST['bday'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];
  $stdhno = $_POST['StdHNo'];
  $stdstreet = $_POST['StdStreet'];
  $stdbarangay = $_POST['StdBarangay'];
  $stdcity = $_POST['StdCity'];
  $stdzip = $_POST['StdZip'];

  $accept2 = "UPDATE
  `tblstdinfo`
  SET
  `StdFName` = '$fname',
  `StdMName` = '$mname',
  `StdLName` = '$lname',
  `StdBday` = '$bday',
  `StdSex` = '$gender',
  `StdStatus` = '$status',
  `StdHNo` = '$stdhno',
  `StdStreet` = '$stdstreet',
  `StdBarangay` = '$stdbarangay',
  `StdCity` = '$stdcity',
  `StdZip` = '$stdzip'
  WHERE StdID = '$StudentID'";

  $stdsec = $_POST['yearsec'];
  $stdcourse = $_POST['course'];
  $stddept = $_POST['dept'];
  $stdsem = $_POST['sem'];

  $year = (int)filter_var($stdsec, FILTER_SANITIZE_NUMBER_INT);
  $sec = substr($stdsec, -1);
  $fullsec = "BSIT ".$year.$sec;
  if ($year == 1) {
    $fullyear = $year."st";
  }
  else if($year == 2){
    $fullyear = $year."nd";

  }
  else if($year == 3){
    $fullyear = $year."rd";

  }
  else if($year == 4){
    $fullyear = $year."th";
  }
  $accept3 = "UPDATE
  `tblacadinfo`
  SET
  `StdYear` = '$fullyear',
  `StdSec` = '$fullsec',
  `StdSem` = '$stdsem',
  `StdDept` = '$stddept',
  `StdCourse` = '$stdcourse'
  WHERE StdID = '$StudentID'";

  $accept_1 = mysqli_query($db, $accept1);
  $accept_2 = mysqli_query($db, $accept2);
  $accept_3 = mysqli_query($db, $accept3);
  unset($_SESSION['StdID']);
  ?>
  <script type="text/javascript">
    window.location = "studentCRUD.php";
    window.alert("Information Updated");
  </script>
  <?php
}
?>