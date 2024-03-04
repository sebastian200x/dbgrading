<?php include_once "../connect.php"; ?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="sectionlist.php">
      <img src="../pics/cmulogo.png" style="width:40%;margin-left: 10%;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Information Process
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php">Student Info</a>
          <a class="dropdown-item" href="index.php">Student Subject</a>
          <a class="dropdown-item" href="index.php">Faculty Info</a>
          <a class="dropdown-item" href="index.php">Display Records</a>
        </div>
      </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Grading Process
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="sectionlist.php">Student List</a>
            <a class="dropdown-item" href="editsectionlist.php">Edit Student Grades</a>
            <a class="dropdown-item" href="#">Print Master List</a>
            <a class="dropdown-item" href="#">Print Student Grades</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="dropdown mr-5">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Account
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </div>
  </nav>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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
<?php
$Info = mysqli_query($db, "SELECT DISTINCT * FROM academicinfo");
if (mysqli_num_rows($Info) > 0) {
  $AY = mysqli_fetch_assoc(mysqli_query($db, "SELECT AY FROM academicinfo"));
  $_SESSION['ACADEMICYEAR'] = $AY['AY'];
  $Sem = mysqli_fetch_assoc(mysqli_query($db, "SELECT Sem FROM academicinfo"));
  $_SESSION['ACADEMICSEM'] = $Sem['Sem'];
} else {
}
?>