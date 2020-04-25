<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
header('Content-type: text/html; charset=utf-8');
$config = json_decode(file_get_contents("../config.php"), true);
$server = $config['server'];

//ob_end_flush();

if (isset($_GET['sync']) && $_GET['sync'] <= 0) {
  $x = file_get_contents($server . "api.php?fetch=0");
  $list = json_decode($x, true);
  if (!is_array($list)) {
?>
    <script>
      alert('Unable to connect to server. Verify your network connection.');
      window.location = "cases.php";
    </script>
  <?php
    die();
  }

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
    <div class="container-fluid mb-3">
      <div class="text-center">
        <br /><br />
        <h1 class="text-center m-3" id="infoBox">Copying....</h1>
        <?php

        echo '<script>document.getElementById("infoBox").innerHTML = "Connected to server successfully";</script>';
        $totalFiles = count($list);
        $current = 0;
        $file = [];
        foreach ($list as $l) {
          $id = $l['case_id'];
          $title = $l['title'];
          $current += 1;
          $percent = ceil($current * 100 / $totalFiles);
          echo '<script>document.getElementById("infoBox").innerHTML = "Fetching annotatons for ' . $title . '<br />Copying case.... ' . $percent . '% of ' . $totalFiles . ' Files";</script>';
          #echo "<h3>Fetching annotatons for $title</h3>";
          $file[] = '<a href="head.php?index=' . $id . '" class="btn btn-lg btn-primary btn-block search">' . $title . '</a>';
          $y = file_get_contents($server . "api.php?fetch=" . $id);
          file_put_contents($id . ".txt", $y);
          #echo "<h3>$title annotatons saved.</h3>";
          ob_flush();
          for ($i = 0; $i < 1000; $i++) echo "<!-------------------- --------------------->";
          flush();
        }
        $file = implode("", $file);
        file_put_contents("cases.txt", $file);
        #echo '<div>Case titles updated successfully!</div>';
        flush();
        sleep(1);
        ?>
        <script>
          alert('Case titles updated successfully!.');
        </script>
      <?php
    } else if (isset($_GET['sync'])) {

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
          <div class="container-fluid mb-3">
            <div class="text-center"><br /><br />
              <h1 class="text-center m-3">Copying <span id="infoBox">0</span></h1>
              <?php
              $html = file_get_contents($_GET['sync'] . ".txt");
              $x = explode("#vFilez#", $html);
              $x = explode(",", $x[1]);
              $totalFiles = count($x);
              $current = 0;
              foreach ($x as $file) {
                $current += 1;
                $percent = ceil($current * 100 / $totalFiles);
                echo '<script>document.getElementById("infoBox").innerHTML = "Videos.... ' . $percent . '% of ' . $totalFiles . ' Files";</script>';
                #echo '<div>Copying ... '.$file.'</div>';
                if (!file_exists("files/" . $file . ".ogv")) {
                  if (copy($server . "files/" . $file . ".ogv", "files/" . $file . ".ogv")) {
                    #echo '<div>Successfully copied</div>';
                  } #else echo '<div>Failed to copy '.$file.'.</div>';
                } #else echo '<div>Skipped '.$file.'.</div>';
                ob_flush();
                for ($i = 0; $i < 1000; $i++) echo "<!-------------------- --------------------->";
                flush();
              }
              $x = explode("#vAttachments#", $html);
              $x = explode(",", $x[1]);
              $totalFiles = count($x);
              $current = 0;
              foreach ($x as $file) {
                flush();
                $current += 1;
                $percent = ceil($current * 100 / $totalFiles);
                echo '<script>document.getElementById("infoBox").innerHTML = "Attachments.... ' . $percent . '% of ' . $totalFiles . ' Files";</script>';
                if (!file_exists("files/" . $file)) {
                  if (copy($server . "files/" . $file, "files/" . $file)) {
                    #echo '<div>Successfully copied.</div>';
                  } # else  echo '<div>Failed to copy '.$file.'.</div>';
                } #else   echo '<dv>Skipped '.$file.'.</div>';
                ob_flush();
                for ($i = 0; $i < 1000; $i++) echo "<!-------------------- --------------------->";
                flush();
              }
              #echo '<div>Case updated successfully</div>';
              flush();
              ob_flush();
              sleep(1);
              ?>
              <script>
                alert('Case updated successfully!.');
              </script>
            <?php
          }
            ?>
            <script>
              history.go(-1);
            </script>
            <?php
            die();
            ?>