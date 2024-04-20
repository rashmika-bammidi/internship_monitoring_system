<?php

session_start();

$_SESSION["username"]="ims";
$_SESSION["class"]="cse";

echo $_SESSION["username"];
echo $_SESSION["class"];

?>