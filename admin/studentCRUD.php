<?php include_once "navbar.php";
if (!isset($_SESSION['section'])) {
  ?>
  <script type="text/javascript">
    window.alert("Please select section first. Don't use other back button");
    window.location = "studentCRUDmenu.php";
  </script>
  <?php
}
$section = $_SESSION['section'];
$course = $_SESSION['course'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $section ?></title>
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

    <!-- 2nd ROW on table title -->
    <div class="form-row p-3">
      <div class="col-3">
        <h3>Students of <b><?php echo $section; ?></b></h3>
      </div>
      <div class="col-9 text-right">
        <button  type="submit" class="btn btn-secondary" name="viewsub"><i class="bi bi-view-list"></i> View Subjects</button> <!-- py = padding top and bottom, mr = margin right -->
      </div>
    </div>
    
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col" style="width: 15%">Student No.</th>
          <th scope="col">Last Name</th>
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col" class="text-center" colspan="2" style="width: 15%">EDIT/DELETE</th>
        </tr>
      </thead>

      <tbody>
       <?php 
       $stdquery = mysqli_query($db, "SELECT DISTINCT * FROM tblstd, tblstdinfo, tblacadinfo WHERE tblacadinfo.StdSec = '$section' AND tblacadinfo.StdCourse = '$course' AND tblacadinfo.StdID = tblstd.StdID AND tblstdinfo.StdID = tblstd.StdID AND tblstd.StdReg = '1' ORDER BY tblstdinfo.StdLName");
       while($stdfetch = mysqli_fetch_assoc($stdquery)){
        ?>
        <tr>

          <td><?php echo $stdfetch['StdUser']; $studentno = $stdfetch['StdUser'];?></td>
          <td><?php echo $stdfetch['StdLName']; $studentlname = $stdfetch['StdLName'];?></td>
          <td><?php echo $stdfetch['StdFName']; $studentfname = $stdfetch['StdFName']?></td>
          <td><?php echo $stdfetch['StdMName']; $studentmname = $stdfetch['StdMName']?></td>
          <?php 
          $StdID = $stdfetch['StdID'];
          ?>
          <td class="text-center">
            <button class="btn btn-success" name="editbtn" value="<?php echo $StdID ?>"><i class="bi bi-pencil-square"></i></button>
          </td>
          <td class="text-center">
            <button onclick="return confirm('Are you sure you want to permanently delete <?php echo $stdfetch['StdFName'].' '.$stdfetch['StdLName'] ?>?')" class="btn btn-danger" name="deletebtn" value="<?php echo $StdID ?>"><i class="bi bi-trash-fill"></i></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</form>
</html>
<?php 
if (isset($_POST['backbtn'])) {
  unset ($_SESSION['section']);
  ?>
  <script type="text/javascript">
    window.location = "studentCRUDmenu.php";
  </script>
  <?php
}
if (isset($_POST['editbtn'])) {
 $_SESSION['stdid'] = $_POST['editbtn']; 
 ?>
 <script type="text/javascript">
  window.location = "studenteditinfo.php";
</script>
<?php
}
if (isset($_POST['viewsub'])) {
 $_SESSION['section'] = $section;
 ?>
 <script type="text/javascript">
  window.location = "viewsub.php";
</script>
<?php
}
?>
<?php
if (isset($_POST['deletebtn'])) {
  $stdid = $_POST['deletebtn'];
  $delete2 = mysqli_query($db, "DELETE FROM tblstdinfo WHERE StdID = '$stdid'");
  $delete2 = mysqli_query($db, "DELETE FROM tblacadinfo WHERE StdID = '$stdid'");
  $delete2 = mysqli_query($db, "DELETE FROM tblgrades WHERE StdID = '$stdid'");
  $delete = mysqli_query($db, "DELETE FROM tblstd WHERE StdID = '$stdid'");
  ?>
  <?php
}
?>