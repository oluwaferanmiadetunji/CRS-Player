<html>
  <head>

    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
    body {
      background: url("/images/case.jpg") no-repeat 100% 100% fixed;

    }
    </style>
  </head>
  <body>
 
  <div class="d-flex  flex-row-reverse bg-dark">
    <a class="btn btn-lg btn-dark flex-fill" href="cases.php">Go Back</a>
    <a href="api.php?sync=<?php echo $_GET['index'];?>" class="btn btn-lg btn-dark flex-fill">Update This Case</a>
    <a href="api.php?sync=<?php echo $_GET['index'];?>" class="btn btn-lg btn-dark flex-fill">Purge & Update This Case</a>
  </div>
<div class="container-fluid">
<?php 
if(file_exists($_GET['index'].".txt")) include($_GET['index'].".txt");
else echo "<h1 class='display-1'>File not found</h1>Connect to server and click ".'<a href="api.php?sync=0" class="btn btn-lg btn-dark flex-fill">Here</a>';
?>
</div>
</body>
</html>