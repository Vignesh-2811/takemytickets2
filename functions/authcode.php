<?php
session_start();
include("../config/connection.php");

if(isset($_POST['register_btn'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);

    // echo $cpassword;die;

        //Check if email already registered
        // $check_email_query = "SELECT email FROM users WHERE email='$email'";
        // $check_email_query_run = mysqli_query($conn,$check_email_query);
    
        // if(mysqli_num_rows($check_email_query_run) > 0)
        // {
            // $_SESSION['message'] = "Email already registered";
            // header("Location: ../register.php");
        // }
        // else
        // {
            
    
            // if($password == $cpassword)
            // {
                // Insert user data
                $insert_query="INSERT INTO users(email, password) VALUES('$email', '$password')";
    
                $insert_query_run=mysqli_query($conn,$insert_query);
                // print_r($insert_query);die;
            
                if($insert_query_run)
                {
                    $_SESSION['message'] = "Registered Successfully";
                    header('Location: ../login.php');
                }
                else
                {
                    $_SESSION['message'] = "Something went wrong";
                    header('Location: ../register.php');
                }
    
            // }
            // else
            // {
                // $_SESSION['message'] = "Passwords do not match";
                // header("Location: ../register.php");
            // }
        // }

}

else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($conn, $login_query);
    // print_r($login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['email'] = $email;

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'email' => $useremail,
        ];

        // $_SESSION['role_as'] = $role_as;

       
        header('Location: ../index.php');
       
    }
    else
    {
        header('Location: ../login.php');
    }
}

else if(isset($_POST['continue_btn'])){
    $venue = mysqli_real_escape_string($conn, $_POST['event_id']);
    $tickets = mysqli_real_escape_string($conn, $_POST['tickets']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $_SESSION['venue'] = $venue;
    $_SESSION['tickets'] = $tickets;
    $_SESSION['type'] = $type;
    // echo $venue; die;
    
    $insert_query = "INSERT INTO templisting(event, tickets, type) VALUES('$venue', '$tickets', '$type')";
    $insert_query_run=mysqli_query($conn,$insert_query);
    // print_r($insert_query);die;
    

    if($insert_query_run)
    {
        $_SESSION['message'] = "Added Successfully";
        header('Location: ../verification.php');
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: ../index.php');
    }
}
?>