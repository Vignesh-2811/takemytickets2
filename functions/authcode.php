<?php
session_start();
include("../config/connection.php");

if (isset($_POST['register_btn'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    //Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {

        $_SESSION['message'] = "Email already registered";
        header("Location: ../register.php");
    } else {

        if ($password == $cpassword) {
            // Insert user data

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the query
            $insert_query = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $insert_query);

            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);

            // Execute the statement
            $insert_query_run = mysqli_stmt_execute($stmt);

            // Close the statement and database connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // Check if the query was successful and redirect accordingly
            if ($insert_query_run) {

                $_SESSION['message'] = "Registered Successfully";
                header('Location: ../login.php');
            } else {

                $_SESSION['message'] = "Something went wrong";
                header('Location: ../register.php');
            }
        } else {

            $_SESSION['message'] = "Passwords do not match";
            header("Location: ../register.php");
        }
    }
} else if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare the query
    $login_query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $login_query);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set from the executed statement
    $result_set = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result_set) > 0) {
        $userdata = mysqli_fetch_array($result_set);
        $hashed_password = $userdata['password'];

        // Verify the hashed password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['auth'] = true;

            $userid = $userdata['id'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];
            $_SESSION['email'] = $email;

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'email' => $useremail,
            ];

            $_SESSION['role_as'] = $role_as;

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header('Location: ../index.php');
        } else {

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            $_SESSION['message'] = "Invalid Credentials";
            header('Location: ../login.php');
        }
    } else {

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        $_SESSION['message'] = "Something went wrong";
        header('Location: ../login.php');
    }
} else if (isset($_POST['continue_btn'])) {

    $venue = mysqli_real_escape_string($conn, $_POST['event_name']);
    $tickets = mysqli_real_escape_string($conn, $_POST['tickets']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $_SESSION['venue'] = $venue;
    $_SESSION['tickets'] = $tickets;
    $_SESSION['type'] = $type;

    // Prepare the query
    $insert_query = "INSERT INTO templisting (venue, tickets, type) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert_query);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sss", $venue, $tickets, $type);

    // Execute the statement
    $insert_query_run = mysqli_stmt_execute($stmt);

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Check if the query was successful and redirect accordingly
    if ($insert_query_run) {
        header('Location: ../verification.php');
    } else {
        $_SESSION['message'] = "Something went wrong";
        header('Location: ../index.php');
    }
}
