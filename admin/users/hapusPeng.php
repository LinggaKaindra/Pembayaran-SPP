<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusPeng($id);
header("location: index.php");


?>