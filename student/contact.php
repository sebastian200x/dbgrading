<?php include_once "navbar.php"; ?>
<!DOCTYPE>
<html>
<head>
  <title>Report</title>
</head>
<body>
 <?php $StudentID = $_SESSION['StudentID'];
 $emailquery = mysqli_query($db, "SELECT * FROM tblstd WHERE tblstd.StdID = $StudentID");
 $emailfetch = mysqli_fetch_assoc($emailquery); ?>
 <form method="post">
   <div class="col-md-5" style="margin: auto; margin-top: 10%;">
     <div class="form-group">
      <label for="exampleFormControlInput1">Email address to contact</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@cityofmalabonuniversity.edu.ph"  disabled required name="emailcontact" value="<?php echo $emailfetch['StdEmail']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Describe Problem" required name="desc"></textarea>
    </div>
    <div class="a-grid">
      <button class="btn btn-primary" type="submit" name="update">Submit Problem</button>
    </div>
  </div>
</form>
</body>
</html>
<?php
if (isset($_POST['update'])){
  $emailcontact = $emailfetch['StdEmail'];
  $desc = $_POST['desc'];
  $sql = "INSERT INTO tblcontact (ContEmail, ContDesc) VALUES ('$emailcontact','$desc')";
  if (mysqli_query($db, $sql)) {
   ?>
   <script type="text/javascript">
    window.alert("Problem Submitted...");
    window.location = "#";
  </script>
  <?php 
}
}
?>
<!--  -->