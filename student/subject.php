<?php
include_once "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enrollment</title>
</head>
<body>
  <div class="container p-3 my-3 border">
    <h3 style="text-align:center; font-weight: bold;">OFFICIAL SUBJECTS</h3>

    <div class="container">
      <?php
      $StudentID = $_SESSION['StudentID'];
      $infoquery = mysqli_query($db, "SELECT * FROM tblstd, tblstdinfo, tblacadinfo WHERE tblstd.StdID = $StudentID AND tblstdinfo.StdID = $StudentID AND tblacadinfo.StdID = $StudentID");
      $info = mysqli_fetch_assoc($infoquery);
      ?>
      <div class="row">
        <div class="col">Student Number: <?php echo $info['StdUser'];?></div>
        <div class="col">Student Name: <?php echo $info['StdFName'] . ' ' . $info['StdLName'];?> </div>
        <div class="col">Year and Section: <?php echo $info['StdSec'];?> </div>
      </div><br>
      <div class="row">
        <div class="col-6">Program: <?php echo $info['StdCourse'];?> </div>
        <div class="col-3">Department: <?php echo $info['StdDept'];?> </div>
        <div class="col-3"> School Year: <?php echo $info['StdAY'] ?> </div>
      </div><br>
      <?php
      $acadyearquery = mysqli_query($db, "SELECT DISTINCT GradeAY, GradeSem FROM tblgrades WHERE StdID = '$StudentID' ORDER BY GradeAY DESC, GradeSem DESC");
      while($acad = mysqli_fetch_assoc($acadyearquery)){
        $AYfetch = $acad['GradeAY'];
        $Semfetch = $acad['GradeSem'];
        echo $AYfetch . ', ' . $Semfetch . ' Sem'; //acad year and sem
        ?>
        <br> 
        <div class="container">
          <table class="table table-bordered text-center">
            <thead class="thead-light">
              <tr>
                <th scope="col">Course Code</th>
                <th scope="col">Course</th>
                <th scope="col">Units</th>
                <th scope="col">Section</th>
                <th scope="col">Professor</th>
              </tr>
            </thead>
            <?php
            $subq = mysqli_query($db, "SELECT SubID, ProfID FROM tblgrades WHERE StdID = '$StudentID' AND GradeSem = '$Semfetch' AND GradeAY = '$AYfetch'");
            while($subf = mysqli_fetch_assoc($subq)){
              ?>
              <tbody>
                <tr>
                  <?php 
                  $sub = mysqli_fetch_assoc( mysqli_query($db, "SELECT * FROM tblsubinfo WHERE SubID = '".$subf['SubID']."'"));
                  ?>
                  <td><?php echo $sub['SubCode']; ?></td>
                  <td><?php echo $sub['SubName']; ?></td>
                  <td><?php echo $sub['SubUnit']; ?></td>
                  <td><?php echo $sub['SubSec']; ?></td>
                  <?php 
                  $prof =  mysqli_fetch_assoc( mysqli_query($db, "SELECT DISTINCT * FROM tblprof WHERE ProfID = '".$subf['ProfID']."'"));
                  ?>
                  <td><?php echo $prof['ProfFName']. ' ' .$prof['ProfLName']; ?></td>
                </tr>
                <?php
              }
              ?>
              <tr>
               <?php 
               $unitquery = mysqli_query($db, "SELECT SUM(tblsubinfo.SubUnit) AS unittotal FROM tblsubinfo, tblgrades WHERE tblsubinfo.ProfID = tblgrades.ProfID AND tblgrades.GradeAY = tblsubinfo.SubAY AND tblgrades.GradeSem = tblsubinfo.SubSem AND tblgrades.GradeAY = '$AYfetch' AND tblgrades.GradeSem = '$Semfetch' AND StdID = '$StudentID'");
               $unitfetch = mysqli_fetch_assoc($unitquery);
               ?>
               <td></td>
               <td></td>
               <td>Total: <?php echo $unitfetch['unittotal']; ?></td>
               <td></td>
               <td></td>
             </tr>

           </tbody>
         </table>
       </div>
       <?php 
     }
     ?>
   </div>
 </body>
 </html>


