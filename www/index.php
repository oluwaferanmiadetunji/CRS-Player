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
$id = $config_data['device_id'];
?>
<html>

<head>

  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/main.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/index.js"></script>
  <!------ Include the above in your HEAD tag ---------->

</head>

<body id="LoginForm">
  <div class="container">
    <h1 class="form-heading text-center">Court Recording System 3.0</h1>
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Judge Login</h2>
          <p>Please enter your email and password</p>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" id="alertDiv" style="display: none" role="alert">
          <strong><span id="message"></span></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="login-form" method="post">
          <div class="form-group">
            <input type="email" class="form-control" required name="email" autofocus id="email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" required name="password" autocomplete="current_password" id="password" placeholder="Password">
          </div>
          <input type="hidden" class="form-control" name="device_id" id="device_id" value=<?php echo $id; ?>>
          <input type="submit" name="submit" id="submit" class="btn btn-primary" value='Login' />
        </form>

        <form action="login.php" method="post" style="display: none">
          <div class="form-group">
            <input type="email" class="form-control" name="email2" autofocus id="email2" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password2" autocomplete="current_password" id="password2" placeholder="Password">
          </div>
          <input type="hidden" class="form-control" name="device_id2" id="device_id2" value=<?php echo $id; ?>>
          <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Login</button>
        </form>
      </div>
      <p class="botto-text">&copy;2019, All rights reserved.</p>
    </div>
  </div>
  </div>


</body>

</html>