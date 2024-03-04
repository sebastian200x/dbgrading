<?php include_once "../connect.php"; ?>
<?php if (isset($_SESSION['AdminID'])) { ?>
  <script type="text/javascript">
    window.alert("Already Logged In as Admin. Redirecting...");
    window.location = "../admin/studentCRUDmenu.php";
  </script>
<?php } ?>
<?php if (isset($_SESSION['ProfID'])) { ?>
  <script type="text/javascript">
    window.alert("Already Logged In as Professor. Redirecting...");
    window.location = "../prof/dashbord.php";
  </script>
<?php } ?>
<?php if (!isset($_SESSION['StudentID'])) { ?>
  <script type="text/javascript">
    window.alert("Please Login First");
    window.location = "../login.php";
  </script>
<?php } ?>
<!DOCTYPE>
<html>
<head>
    <link rel = "shortcut icon" href = "../pics/cmulogo2.ico" type = "image/x-icon">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="grades.php"> <img src="../pics/cmulogo.png" style="width:40%; margin-left: 10%;"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Information Process
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="grades.php">Display Grades</a>
            <a class="dropdown-item" href="subject.php">Student Subject</a>
            <a class="dropdown-item" href="contact.php">Contact Admin</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="btn-group" style="margin-right: 5%;">
      <button type="button" class="btn btn-secondary"><a href="studentinfo.php" style="color: white; text-decoration: none;">Profile</a></button>
      <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
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
