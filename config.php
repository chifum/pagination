<?php
require_once'const.php';

$conn = mysqli_connect(servername, username, password, dbname);

if($conn == TRUE) {
}
else {
    die("Connection failed " . mysqli_error($conn));
}
?>