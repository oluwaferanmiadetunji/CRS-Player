<?php
if (isset($_POST['submit2'])) {
  $c = [];
  $c['device_id'] = $_POST['device_id2'];
  $c['email'] = $_POST['email2'];
  $c['password'] = $_POST['password2'];
  $c['server'] = $_POST['server2'];
  file_put_contents("../config.php", json_encode($c));
  echo "<script type='text/javascript'>
        window.location= 'index.php';
        </script>";
  exit();
}
