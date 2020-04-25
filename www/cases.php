<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$config = json_decode(file_get_contents("../config.php"), true);
$server = $config['server'];
?>

<html>

  <head>

    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
    body {
      background: url("/images/cases.jpg") no-repeat 100% 100% fixed;

    }
    </style>
  </head>

  <body>
    <div class="d-flex justify-content-between bg-dark">
      <a class="btn btn-lg btn-dark flex-fill" href="api.php?sync=0">Update Case List</a>
      <a class="btn btn-lg btn-dark flex-fill" href="index.php">Logout</a>
    </div>
    <div class="container-fluid">
      <div class="text-center">
        <h1>List of Cases</h1>
        <br />
        <div class="d-flex justify-content-center"><input class="form-control" style="width:50% !important;"
            id="myFilter" type="text" placeholder="Search.."></div>
        <br />
        <?php @include("cases.txt"); ?>
      </div>
    </div>
  </body>

</html>
<script src="js/filter.js"></script>