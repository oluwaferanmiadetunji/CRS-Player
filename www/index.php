<?php
if (!file_exists("../config.php")) {
  //redirect to settngs.php
  echo '<script>
    window.location = "settings.php";
  </script>
  <meta http-equiv="Refresh" content="0; url=settings.php">';
  exit();
}
$error = false;
$config_data = json_decode(file_get_contents("../config.php"), true);
$id = $config_data['login'];

if (isset($_POST['submit'])) {
  $c = json_decode(file_get_contents("../config.php"), true);
  $login_uuid = $_POST['login_uuid'];
  $password = $_POST['password'];
  $uuid = $c['login'];
  $c_password = $c['password'];
  if (!password_verify($password, $c_password)) {
    $error = true;
  } else {
    echo "<script type='text/javascript'>
        window.location= 'cases.php';
        </script>";
    exit();
  }
}
?>
<html>

<head>

  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/main.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <!------ Include the above in your HEAD tag ---------->

</head>

<body id="LoginForm">
  <div class="container">
    <h1 class="form-heading text-center">Court Recording System 3.0</h1>
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Judge Login</h2>
          <?php
          if ($error) {
          ?>
            <div class="alert alert-danger">Invalid login details</div>
          <?php
          }
          ?>
          <p>Please enter your email and password</p>
        </div>
        <form id="Login" action="" method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
          </div>
          <input type="hidden" class="form-control" name="login_uuid" id="login_uuid" value=<?php echo $id; ?>>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
      <p class="botto-text">&copy;2019, All rights reserved.</p>
    </div>
  </div>
  </div>


</body>

</html>