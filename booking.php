<?php
include "config/connection.php";
session_start();


$to = $_SESSION['to'];
$booking_id = $_SESSION['booking_id'];
$venue = $_SESSION['venue'];
$category = $_SESSION['category'];
$quantity = $_SESSION['quantity'];
$amount_paid = $_SESSION['amount_paid'];

$insert_query = "INSERT INTO tickets(ticketowner, bookingid, venue, category, quantity, amount_paid) 
VALUES ('$to', '$booking_id', '$venue', '$category', '$quantity', '$amount_paid')";
$insert_query_run = mysqli_query($conn,$insert_query);




?>
