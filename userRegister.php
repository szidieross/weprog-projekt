<?php
if (isset($_POST['save_student'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO patient (username,email,password) VALUES ('$username','$email','$password')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Created";
        header("Location: index.php");
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/homepage.css">
</head>

<body>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sign Up
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Sign up</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>