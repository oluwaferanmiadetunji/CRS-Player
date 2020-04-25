<?php
session_start();
if (isset($_POST['submit2'])) {
  $_SESSION['email'] = $_POST['email2'];
  echo "<script type='text/javascript'>
        window.location= 'cases.php';
        </script>";
  exit();
} else {
  header('Location: index.php');
  exit();
}
