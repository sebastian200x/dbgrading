<?php include_once "../connect.php"; ?>
<?php if (isset($_SESSION['StudentID'])) {?>
  <script type="text/javascript">
    window.alert("You're already logged in as Student. Redirecting...")
    window.location = "../student/grades.php";
  </script>
<?php } ?>
<?php if (isset($_SESSION['ProfID'])) {?>
  <script type="text/javascript">
    window.alert("You're already logged in Professor. Redirecting...")
    window.location = "../prof/dashbard.php";
  </script>
<?php } ?>
<?php if (isset($_SESSION['AdminID'])) {?>
  <script type="text/javascript">
    window.alert("You're already logged in Admin. Redirecting...")
    window.location = "../admin/studentCRUDmenu.php";
  </script>
<?php } ?>
<!DOCTYPE html>
<html>
<head>
    <link rel = "shortcut icon" href = "../pics/cmulogo2.ico" type = "image/x-icon">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">
      <img src="../pics/cmulogo.png" style="width:40%; margin-left: 10%;" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Authentication
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="../login.php">Login</a>
            <a class="dropdown-item" href="../contact.php">Contact Admin</a>
          </div>
        </li>
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