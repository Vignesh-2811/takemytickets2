<?php
include "config/connection.php";

session_start();
$email = $_SESSION['email'];

$command = escapeshellcmd('python3 main.py ' . $email);
$output = shell_exec($command);
$ticket_info = json_decode($output, true);


$from = $ticket_info['from'];
$to = $ticket_info['to'];
$booking_id = $ticket_info['booking_id'];
$venue = $ticket_info['venue'];
$category = $ticket_info['category'];
$quantity = $ticket_info['quantity'];
$amount_paid = $ticket_info['amount_paid'];
$idexist= false;

$_SESSION['to'] = $ticket_info['to'];
$_SESSION['booking_id'] = $ticket_info['booking_id'];
$_SESSION['venue'] = $ticket_info['venue'];
$_SESSION['category'] = $$ticket_info['category'];
$_SESSION['quantity'] = $ticket_info['quantity'];
$_SESSION['amount_paid'] = $ticket_info['amount_paid'];


$check_booking_id_query = "SELECT bookingid FROM tickets WHERE bookingid='$booking_id'";
$check_booking_id_query_run = mysqli_query($conn,$check_booking_id_query);

if(mysqli_num_rows($check_booking_id_query_run) > 0)

        {

            $idexist= true;

        }

if ($ticket_info['from'] != 'tickets@bookmyshow.email') {

    $response['status'] = 'error';
    $response['message'] = "Please list a valid ticket";

} else if($ticket_info['to'] != $email) {

    $response['status'] = 'error';
    $response['message'] = "Login / Signup with the to email address in the email";

} else if ($ticket_info['quantity'] < $quantity) {

    $response['status'] = 'error';
    $response['message'] = "Mismatch in ticket quantity";

}else if ($idexist === true) {

    $response['status'] = 'error';
    $response['message'] = "This ticket is already listed";

}else {

    $response['status'] = 'success';

}


// send response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
