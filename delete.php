<?php 
require "functions.php";
$id = $_GET["id"];
$result = hapus($id);
echo $result;
?>