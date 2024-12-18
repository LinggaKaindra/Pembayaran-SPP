<?php 
require"../../functions.php";

$id = $_GET["id"];

hapusHis($id);
header("location: ../index.php");



?>