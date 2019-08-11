<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JCUB Wine Shop</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/materialize.css">
    <link rel="stylesheet" href="../../css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="../../js/materialize.min.js"></script>
    <script src="../../js/jquery.js"></script>
    
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
<body><br/>
    <form class="center-align file-field input-field btn red lighten-2" action="upload.php" method="post" enctype="multipart/form-data">
    Select File Here.
    <br/>
        <input class="center-align btn red lighten-2" type="file" name="myFile"/>
        <br/>
        <input class="red lighten-2 white-text" id="uploadbtn" type="submit" value="Upload"/>
    </form>

<?php
define("UPLOAD_DIR", "./");
define("ERROR", "STOP! Error time! I have no idea what caused this." );
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "GET") {
}
// File upload action
else if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];
    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo $ERROR;
        exit;
    }
    // Check the filename is safe
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // Grab file from the temp dir
    $success = move_uploaded_file($myFile["tmp_name"], UPLOAD_DIR . $name);
    if (!$success) {
        echo $ERROR;
        exit;
        echo "Uploaded file! <a href=$name>Click</a> to execute/view ";
    }
}
?>

<div class="container result" id='result'>
    <div class="row">
        <p><br/><br/>
        <?php echo "<p id='upload_link'> Uploaded file! <a href=$name>Click</a> to execute/view </p>"; ?>
        </p>
    </div>
</body>



</html>