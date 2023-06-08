<?php
require_once "./database/dbcon.php";
require "code.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>
    <div class="">
        <h4>
            <a href="index.php" class=""><button class="btn">BACK</button></a>
        </h4>
        <div class="form">
            <form action="code.php" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required value="<?php if (isset($_COOKIE["username"])) {
                        echo $_COOKIE["username"];
                    } ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required
                        value="<?php if (isset($_COOKIE["email"])) {
                            echo $_COOKIE["username"];
                        } ?>">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn" value="Sign Up">
                </div>
                <p>Already have an account? <a href="homepage.php"> <button class="btn">Sign in</button></a></p>
            </form>
        </div>
    </div>
</body>
<?php mysqli_close($con); ?>

</html>