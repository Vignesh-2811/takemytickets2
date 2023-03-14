<?php
include "config/connection.php";
session_start();


$to = $_SESSION['to'];
$booking_id = $_SESSION['booking_id'];
$venue = $_SESSION['venue'];
$category = $_SESSION['category'];
$quantity = $_SESSION['quantity'];
$amount_paid = $_SESSION['amount_paid'];

$insert_query = "INSERT INTO tickets (ticketowner, bookingid, venue, category, quantity, amount_paid) VALUES (?, ?, ?, ?, ?, ?)";
$stmt_insert_query = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param($stmt_insert_query, "ssssss", $to, $booking_id, $venue, $category, $quantity, $amount_paid);
mysqli_stmt_execute($stmt_insert_query);

?>
