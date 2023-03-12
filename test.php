<?php
// include "config/connection.php";

session_start();
// $email = $_SESSION['email'];


$email = "shakthivignesh2002@gmail.com";
$command = escapeshellcmd('python3 main.py ' . $email);
$output = shell_exec($command);
$ticket_info = json_decode($output, true);
print_r ($ticket_info);
?>