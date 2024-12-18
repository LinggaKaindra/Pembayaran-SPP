<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusProd($id);

header("location: index.php");


?>