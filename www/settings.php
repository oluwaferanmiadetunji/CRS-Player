<?php
if (isset($_POST['submit'])) {
  $c = [];
  $c['login'] = password_hash($_POST['uuid'], PASSWORD_DEFAULT);
  $c['email'] = $_POST['email'];
  $c['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $c['server'] = $_POST['server'];
  file_put_contents("../config.php", json_encode($c));
  echo "<script type='text/javascript'>
        window.location= 'index.php';
        </script>";
  exit();
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
          <h2>Create Settings</h2>
        </div>
        <form class="Login" action="" method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="server" id="server" placeholder="Server IP">
          </div>
          <input type="hidden" class="form-control" name="uuid" id="uuid" value=''>
          <button type="submit" id="submit" name="submit" class="btn btn-primary">Signup</button>
        </form>
      </div>
      <p class="botto-text">&copy;2019, All rights reserved.</p>
    </div>
  </div>
  </div>
</body>

</html>