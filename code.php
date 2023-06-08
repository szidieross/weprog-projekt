<?php

session_start();
require './database/dbcon.php';


// --------------------------------------------------------------------------------------------------------------------------------
// LOGIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE users.username = '$user' AND users.password = '$password'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $user = mysqli_fetch_assoc($query_run);
        setcookie("username", $user['username']);
        setcookie("user_id", $user['user_id']);
    }
    if ($query_run) {
        $_SESSION['message'] = "Logged in Successfully";
        header("Location: homepage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging in Not Successful";
        header("Location: homepage.php");
        exit(0);
    }
}


// --------------------------------------------------------------------------------------------------------------------------------
// ADMIN LOGIN
// --------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['adminlogin'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$password'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $user = mysqli_fetch_assoc($query_run);
        setcookie("username", $user['username']);
        setcookie("user_id", $user['user_id']);
    }

    if ($query_run) {
        $_SESSION['message'] = "Logged in Successfully";
        header("Location: adminLogin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging in Not Successful";
        header("Location: adminLogin.php");
        exit(0);
    }
}


// if (isset($_POST['adminlogin'])) {
//     $user = mysqli_real_escape_string($con, $_POST['username']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);

//     $query = "SELECT * FROM users WHERE users.username = '$user' AND users.password = '$password' AND users.username = 'admin' AND users.password = 'adminadm'";
//     $query_run = mysqli_query($con, $query);

//     if (mysqli_num_rows($query_run) > 0) {
//         $user = mysqli_fetch_assoc($query_run);
//         setcookie("username", $user['username']);
//         setcookie("user_id", $user['user_id']);
//     }
//     if ($query_run) {
//         $_SESSION['message'] = "Logged in Successfully";
//         header("Location: adminLogin.php");
//         // header("Location: index.php");
//         exit(0);
//     } else {
//         $_SESSION['message'] = "Logging in Not Successful";
//         header("Location: adminLogin.php");
//         exit(0);
//     }
// }


// --------------------------------------------------------------------------------------------------------------------------------
// LOGOUT
// --------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['logout'])) {
    $user_id = $_COOKIE['user_id'];

    setcookie("username", "", time() - 3600); // Remove the "username" cookie
    setcookie("user_id", "", time() - 3600); // Remove the "user_id" cookie

    $_SESSION['message'] = "Logged out Successfully";
    header("Location: homepage.php");
    exit(0);
}


// if (isset($_POST['logout'])) {
//     $user = mysqli_real_escape_string($con, $_POST['username']);

//     $query = "SELECT * FROM users WHERE users.user_id = 1";
//     $query_run = mysqli_query($con, $query);

//     if (mysqli_num_rows($query_run) > 0) {
//         foreach ($query_run as $user) {
//             setcookie("username", $user['username'], time() - 3600);
//             setcookie("user_id", $user['user_id'], time() - 3600);
//         }
//     }

//     if ($query_run) {
//         $_SESSION['message'] = "Logged out Successfully";
//         header("Location: homepage.php");
//         exit(0);
//     } else {
//         $_SESSION['message'] = "Logging out Not Successful";
//         header("Location: homepage.php");
//         exit(0);
//     }
// }



// --------------------------------------------------------------------------------------------------------------------------------
// ADD APPOINTMENT
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['add_appointment'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);

    $user = $_COOKIE['username'];
    $query1 = "SELECT users.user_id FROM users WHERE users.username = '$user'";
    $query_run1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($query_run1) > 0) {
        foreach ($query_run1 as $user) {
            $userid = $user['user_id'];
            $query = "UPDATE appointments SET taken=true, user_id='$userid' WHERE appointment_id='$id'";
        }
    }

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment booked successfully";
        header("Location: booking.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment not booked";
        header("Location: booking.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// DELETE APPOINTMENT
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['delete_appointment'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);

    $query = "UPDATE appointments SET taken=false, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: booking.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: booking.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// DELETE BOOKING
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['delete_booking'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    $query = "UPDATE appointments SET taken=false, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: homepage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: homepage.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// DELETE BOOKING AS ADMIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['delete_b'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    $query = "UPDATE appointments SET taken=false, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: appointments.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: appointments.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// REGISTER
// --------------------------------------------------------------------------------------------------------------------------------


// if (isset($_POST['register'])) {
//     $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
//     $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
//     $user = mysqli_real_escape_string($con, $_POST['username']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
//     $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

//     // Check if the username or email already exists in the database
//     $check_query = "SELECT * FROM users WHERE username = '$user' OR email = '$email'";
//     $check_result = mysqli_query($con, $check_query);

//     if (mysqli_num_rows($check_result) > 0) {
//         $_SESSION['message'] = "Username or email already exists";
//         header("Location: registration.php"); // Redirect to the registration page
//         exit(0);
//     } elseif ($password !== $confirm_password) {
//         $_SESSION['message'] = "Passwords do not match";
//         header("Location: registration.php"); // Redirect to the registration page
//         exit(0);
//     } else {
//         // Insert the new user into the database
//         $insert_query = "INSERT INTO users (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$user', '$email', '$password')";
//         $insert_result = mysqli_query($con, $insert_query);

//         if ($insert_result) {
//             $_SESSION['message'] = "Registration successful";
//             header("Location: homepage.php"); // Redirect to the homepage or login page
//             exit(0);
//         } else {
//             $_SESSION['message'] = "Registration failed";
//             header("Location: registration.php"); // Redirect to the registration page
//             exit(0);
//         }
//     }
// }


if (isset($_POST['register'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    
    if (!preg_match("/^[a-zA-Z ]+$/", $first_name)) {
        $first_name_error = "First name must contain only alphabets and space";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $last_name)) {
        $last_name_error = "Last name must contain only alphabets and space";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        $username_error = "Username must contain only alphabets and space";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please enter a valid email address";
    } else if (strlen($password) < 6) {
        $password_error = "Password must be a minimum of 6 characters";
    } else if ($password != $cpassword) {
        $cpassword_error = "Password and Confirm Password do not match";
    } else {
        $query = "INSERT INTO users (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$password')";
        
        if (mysqli_query($con, $query)) {
            header("location: index.php");
            exit();
        } else {
            // Log the error or display a generic error message
            echo "Registration failed. Please try again later.";
        }
    }
    
    mysqli_close($con);
}

?>