<?php

$srvr = "localhost";
$usr = "root";
$pwd = "";
$dbname = "costcalc";

$conn = mysqli_connect($srvr,$usr,$pwd,$dbname);

if (!$conn || empty($conn)) {

  die("DATABASE ERROR!". mysqli_connect_error());
}

?>