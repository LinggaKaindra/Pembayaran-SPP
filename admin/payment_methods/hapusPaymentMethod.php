<?php 

require "../../functions.php";

$id = $_GET["id"];

hapusPaymentMethod($id);

header("location: index.php");


?>