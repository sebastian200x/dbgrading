
<?php include_once "navbar.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Student Info</title>
</head>
<form method="post">
  <div class="container p-3 my-3 border">
    <div class="container text">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Professor Info</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" required>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" required>
          </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <label for="username">Username</label>
          <small class="text-muted">This will serves as the username for the account</small>
          <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" value="password" readonly required>
          <small class="text-muted">Default Value is "password"</small>
        </div>
        <div class="col text-center pt-2">
          <button type="submit" id="addprof" name="addprof" class="btn btn-primary">Add Professor</button>
          <button type="submit" id="cancel" name="cancel" class="btn btn-secondary" formnovalidate>Cancel</button>
        </div>
      </div>
    </div>
  </form>
</body>
</html>

<?php 
if (isset($_POST['addprof'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $username = $_POST['username'];

  $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  mysqli_query($db, "INSERT INTO `tblprof`(
    `ProfUser`,
    `ProfPass`,
    `ProfEmail`,
    `ProfFName`,
    `ProfLName`
  )
  VALUES(
    '$username',
    '$hashpassword',
    '',
    '$fname',
    '$lname'
  )");
  ?>
  <script type="text/javascript">
    window.location=" profCRUD.php";
    window.alert("Professor Added Successfully");
  </script>
  <?php
}

?>

<!-- <style type="text/css">
  body{
  padding:100px 0;
  background-color:#efefef
}
a, a:hover{
  color:#333
}
</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <form>
  <div class="form-group">
    <label>Password</label>
    <div class="input-group" id="show_hide_password">
      <input class="form-control" type="password">
      <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</form>
    </div>
  </div>
</div>
        <script type="text/javascript">
          $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
        </script>  -->