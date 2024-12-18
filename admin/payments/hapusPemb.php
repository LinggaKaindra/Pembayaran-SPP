<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusPemb($id);
header("location: index.php");


?>