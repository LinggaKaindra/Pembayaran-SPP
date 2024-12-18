<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusSis($id);
header("location: petugas.php");

?>