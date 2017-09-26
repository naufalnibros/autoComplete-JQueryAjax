<?php
require 'config.php';

$query = mysqli_query($kon, "SELECT * FROM siswa WHERE nis='".mysqli_escape_string($kon, $_POST['nis'])."'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
 ?>
