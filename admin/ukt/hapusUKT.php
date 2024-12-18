<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusUKT($id);

header("location: index.php");


?>