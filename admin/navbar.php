<?php include_once "../connect.php";
if (isset($_SESSION['ProfID'])) { 
  ?>
  <script type="text/javascript">
    window.alert("Already Logged In as Professor. Redirecting...");
    window.location = "../prof/dashboard.php";
  </script>
  <?php 
}
if (isset($_SESSION['StudentID'])) { 
  ?>
  <script type="text/javascript">
    window.alert("Already Logged In as Student. Redirecting...");
    window.location = "../student/subject.php";
  </script>
  <?php 
}
if (!isset($_SESSION['AdminID'])) { 
  ?>
  <script type="text/javascript">
    window.alert("Please Login First");
    window.location = "../login.php";
  </script>
  <?php 
}
$Info = mysqli_query($db, "SELECT DISTINCT * FROM academicinfo");
if(mysqli_num_rows($Info) > 0) {
  $AY = mysqli_fetch_assoc(mysqli_query($db, "SELECT AY FROM academicinfo"));
  $_SESSION['ACADEMICYEAR'] = $AY['AY'];
  $Sem = mysqli_fetch_assoc(mysqli_query($db, "SELECT Sem FROM academicinfo"));
  $_SESSION['ACADEMICSEM'] = $Sem['Sem'];
}
else
{
}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel = "shortcut icon" href = "../pics/cmulogo2.ico" type = "image/x-icon">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
      <img src="../pics/cmulogo.png" style="width:40%; margin-left: 10%;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
           <i class="bi bi-speedometer2"></i> Dashboard
         </a>
       </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="bi bi-info-circle"></i> Information Process
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="studentCRUDmenu.php"><i class="bi bi-person-badge"></i> Edit Student Users</a>
        <a class="dropdown-item" href="profCRUD.php"><i class="bi bi-person"></i> Edit Professor Users</a>
      </div>
    </li>

  </ul>
</div>
<div class="dropdown mr-5">
  <?php 
  $problem = mysqli_query($db, "SELECT * FROM tblcontact");
  if ($problems = mysqli_num_rows($problem) > 0) {
    ?>
    <a button type="button" class="btn btn-danger text-white" href="settings.php"><?php echo $problems; ?> <i class="bi bi-exclamation-square"></i></a>
    <?php 
  }
  else{
    ?>
    <?php
  }
  ?>
  <button class="btn btn-secondary dropdown-toggle" type="button" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Account
  </button>
  <div class="dropdown-menu" aria-labelledby="account">
    <a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> Logout</a>
  </div>
  <a class="btn btn-secondary" href="settings.php"><i class="bi bi-sliders"></i> Acad Setting</a>
</div>
</nav>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</body>
</html>
