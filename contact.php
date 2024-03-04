<?php include_once "navbar.php"; ?>
<!DOCTYPE>
<html>
<head>
  <title>Report</title>
</head>
<body>
 <form method="post">
   <div class="col-md-5" style="margin: auto; margin-top: 10%;">
     <div class="form-group">
      <label for="exampleFormControlInput1">Email address to contact</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@cityofmalabonuniversity.edu.ph" required name="emailcontact">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Describe Problem" required name="desc"></textarea>
    </div>
    <div class="a-grid">
      <button class="btn btn-primary" type="submit" name="contacbtn">Submit Problem</button>
    </div>
  </div>
</form>
</body>
</html>
<?php
if (isset($_POST['contacbtn'])){
  $emailcontact = $_POST['emailcontact'];
  $desc = $_POST['desc'];
  $sql = "INSERT INTO tblcontact (ContEmail, ContDesc) VALUES ('$emailcontact','$desc')";
  if (mysqli_query($db, $sql)) {
    ?>
    <script type="text/javascript">
      window.alert("Problem Submitted...");
      window.location = "index.php";
    </script>
    <?php 
  }
}
?>