<?php
require_once "./database/dbcon.php";
// if (isset($_SESSION['user_id']) != "") {
//     header("Location: dashboard.php");
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
        $username_error = "Last name must contain only alphabets and space";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    } else if (strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    } else if ($password != $cpassword) {
        $cpassword_error = "Password and Confirm Password doesn't match";
    } else {
        $query = "INSERT INTO users (first_name,last_name,username,email,password) VALUES('$first_name','$last_name','$username','$email','$password')";
        if (mysqli_query($con, $query)) {
            header("location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>
    <div class="container">
        <h4>
            <a href="index.php" class="btn">BACK</a>
        </h4>
        <div class="form">
            <div class="form-content">
                <form action="" method="post">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger">
                            <?php if (isset($first_name_error))
                                echo $first_name_error; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger">
                            <?php if (isset($last_name_error))
                                echo $last_name_error; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger">
                            <?php if (isset($username_error))
                                echo $username_error; ?>
                        </span>
                    </div>
                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger">
                            <?php if (isset($email_error))
                                echo $email_error; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger">
                            <?php if (isset($password_error))
                                echo $password_error; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger">
                            <?php if (isset($cpassword_error))
                                echo $cpassword_error; ?>
                        </span>
                    </div>
                    <button type="submit" class="btn" name="register" value="submit">Sign up</button>
                    <p>Already have an account? <a href="login.php"><button class="btn">Login</button></a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>