<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Student</title>
</head>
<body>
  <form method="post">
    <div class="container-fluid p-4 border"> <!-- pt = padding top, mt = margin top -->
      <!-- 1st ROW on table title -->
      <div class="form-row">
        <div class="col-12 text-left">
          <button class="btn btn-secondary" name="backbtn"><i class="bi bi-backspace"></i> Back</button>
        </div>
        <div class="col-12">
          <h3 class="text-center text-bold"><b>Manage Students</b></h3>
        </div>
      </div>

      <?php
      $reg = mysqli_query($db, "SELECT DISTINCT tblstd.StdID, tblstd.StdUser, tblstdinfo.StdLName, tblstdinfo.StdFName, tblstdinfo.StdMName FROM tblstd , tblstdinfo WHERE tblstd.StdReg = '0' AND tblstd.StdID = tblstdinfo.StdID ORDER BY tblstdinfo.StdLName");
      if (mysqli_num_rows($reg) <= 0) {
        ?>
        <table class="table text-center">
          <thead class="thead-light">
            <tr>
              <th>No Records</th>
            </tr>
          </thead>
        </table> 
        <?php
      }
      else{
        ?>
        <table class="table table-bordered table-hover" id="myTable">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="width: 15%">Student No.</th>
              <th scope="col">Last Name</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col" style="width: 15%">REGISTER/DELETE</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($regfetch = mysqli_fetch_assoc($reg)) {
              ?>
              <tr>
                <td><?php echo $regfetch['StdUser']; ?></td>
                <td><?php echo $regfetch['StdLName']; ?></td>
                <td><?php echo $regfetch['StdFName']; ?></td>
                <td><?php echo $regfetch['StdMName']; ?></td>
                <td>
                  <button class="btn btn-success" name="regbtn" value="<?php echo $regfetch['StdID'] ?>"><i class="bi bi-person-plus-fill"></i></button>
                  <button onclick="return confirm('Are you sure you want to delete <?php  echo $regfetch['StdFName'] .' '. $regfetch['StdFName'];?>?')" class="btn btn-danger" name="deleteregbtn" value="<?php echo $regfetch['StdID'] ?>"><i class="bi bi-trash-fill"></i></button>
                </td>
              </tr>
            <?php } }?>
          </tbody>
        </table>
      </div>
    </body>
  </form> 
  </html>
  <?php 
  if (isset($_POST['backbtn'])){ ?>

    <script type="text/javascript">
      window.location = "studentCRUDmenu.php";
    </script>
    <?php
  }
  if (isset($_POST['regbtn'])){
    $_SESSION['StdID'] = $_POST['regbtn']

    ?>
    <script type="text/javascript">
      window.location = "studentregedit.php";
    </script>
    <?php
  }
  if (isset($_POST['deleteregbtn'])){
    $StdID = $_POST['deleteregbtn'];
    $deletestdinfo = "DELETE FROM tblstdinfo WHERE StdID = '$StdID'";
    $deletestdacadinfo = "DELETE FROM tblacadinfo WHERE StdID = '$StdID'";
    $deletestdacc = "DELETE FROM tblstd WHERE StdID = '$StdID'";
    if (mysqli_query($db, $deletestdinfo) && mysqli_query($db, $deletestdacadinfo) && mysqli_query($db, $deletestdacc)) {
      ?>
      <script type="text/javascript">
      window.location = "addstudent.php";
        window.alert("Delete Successfully");
      </script>
      <?php
    }
    else{
      ?>
      <script type="text/javascript">
        window.alert("ERROR! Account is not deleted");
      </script>
      <?php
    }
  }

  ?>