<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusTahun($id);

header("location: index.php");


?>