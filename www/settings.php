<?php
if (file_exists("../config.php")) {
  //redirect to index.php
  echo '<script>
    window.location = "index.php";
  </script>
  <meta http-equiv="Refresh" content="0; url=settings.php">';
  exit();
}
?>
<html>

<head>

  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/main.css" rel="stylesheet">

  <!------ Include the above in your HEAD tag ---------->
</head>

<body id="LoginForm">
  <div class="container">
    <h1 class="form-heading text-center">Court Recording System 3.0</h1>
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Create Settings</h2>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" id="alertDiv" style="display: none" role="alert">
          <strong><span id="message"></span></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class='register-form' method="post">
          <div class="form-group">
            <input type="email" class="form-control" required autofocus name="email" id="email" placeholder="Email Address" autocomplete="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" required name="password" id="password" placeholder="Password" autocomplete="new_password">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" required name="server" id="server" placeholder="Server IP">
          </div>
          <input type="hidden" class="form-control" required name="device_id" id="device_id" value=''>
          <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Signup">
        </form>

        <form action="register.php" method="post" style="display: none">
          <div class="form-group">
            <input type="email" class="form-control" name="email2" id="email2" placeholder="Email Address" value='' autocomplete="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" value='' autocomplete="new_password">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="server2" id="server2" placeholder="Server IP" value=''>
          </div>
          <input type="text" class="form-control" name="device_id2" id="device_id2" value=''>
          <button type="submit" id="submit2" name="submit2" class="btn btn-primary">Signup</button>
        </form>
      </div>
      <p class="botto-text">&copy;2019, All rights reserved.</p>
    </div>
  </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/settings.js"></script>
</body>
<!-- -->

</html>