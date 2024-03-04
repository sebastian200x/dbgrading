<?php include_once "connect.php"; ?>
<?php if (isset($_SESSION['StudentID'])) { ?>
  <script type="text/javascript">
    window.alert("You're already logged in as Student. Redirecting...")
    window.location = "student/grades.php";
  </script>
<?php } ?>
<?php if (isset($_SESSION['ProfID'])) { ?>
  <script type="text/javascript">
    window.alert("You're already logged in Professor. Redirecting...")
    window.location = "prof/sectionlist.php";
  </script>
<?php } ?>
<?php if (isset($_SESSION['AdminID'])) { ?>
  <script type="text/javascript">
    window.alert("You're already logged in Admin. Redirecting...")
    window.location = "admin/index.php";
  </script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <title></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="pics/cmulogo.png" style="width:40%; margin-left: 10%;" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartoggler"
        aria-controls="navbartoggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbartoggler">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Authentication
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="login.php">Login</a></li>
              <li><a class="dropdown-item" href="contact.php">Contact Admin</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>

</html>