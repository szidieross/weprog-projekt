<?php

session_start();
require 'dbcon.php';

if (isset($_POST['delete_appointment'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    // $a_id = $id['appointment_id'];

    $query = "UPDATE appointments SET taken=false, doctor_id=NULL, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: doctorsPage.php");
        exit(0);
    } else {
        // $_SESSION['message'] = "Student Not Deleted";
        header("Location: doctorsPage.php");
        exit(0);
    }
}

if (isset($_POST['delete_booking'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    // $a_id = $id['appointment_id'];

    $query = "UPDATE appointments SET taken=false, doctor_id=NULL, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: doctorsPage.php");
        exit(0);
    } else {
        // $_SESSION['message'] = "Student Not Deleted";
        header("Location: doctorsPage.php");
        exit(0);
    }
}

// if(isset($_POST['user_login']))
// {
//     $id = mysqli_real_escape_string($con, $_POST['id']);

//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
//     // $phone = mysqli_real_escape_string($con, $_POST['phone']);
//     // $course = mysqli_real_escape_string($con, $_POST['course']);

//     $query = "UPDATE patient SET username='$username', email='$email', password='$password' WHERE id='$id' ";
//     $query_run = mysqli_query($con, $query);

//     if($query_run)
//     {
//         $_SESSION['message'] = "Student Updated Successfully";
//         header("Location: index.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message'] = "Student Not Updated";
//         header("Location: index.php");
//         exit(0);
//     }

// }

// if(isset($_POST['doctor_login']))
// {
//     $id = mysqli_real_escape_string($con, $_POST['id']);

//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
//     // $phone = mysqli_real_escape_string($con, $_POST['phone']);
//     // $course = mysqli_real_escape_string($con, $_POST['course']);

//     $query = "UPDATE patient SET username='$username', email='$email', password='$password' WHERE id='$id' ";
//     $query_run = mysqli_query($con, $query);

//     if($query_run)
//     {
//         $_SESSION['message'] = "Student Updated Successfully";
//         header("Location: index.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message'] = "Student Not Updated";
//         header("Location: index.php");
//         exit(0);
//     }

// }

if (isset($_POST['add_user'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', password='$password'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        header("Location: ./userLogin.php");
        exit(0);
    } else {
        header("Location: ../index.php");
        exit(0);
    }
}

if (isset($_POST['user_login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', password='$password'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        header("Location: ./userLogin.php");
        exit(0);
    } else {
        header("Location: ../index.php");
        exit(0);
    }
}

// if(isset($_POST['set_appointment']))
// {
//     $student_id = mysqli_real_escape_string($con, $_POST['set_appointment']);

//     $query = "INSERT INTO appointments WHERE appointment_id='$student_id' ";
//     $query_run = mysqli_query($con, $query);

//     if($query_run)
//     {
//         $_SESSION['message'] = "Student Deleted Successfully";
//         header("Location: appointment.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message'] = "Student Not Deleted";
//         header("Location: appointment.php");
//         exit(0);
//     }
// }

?>