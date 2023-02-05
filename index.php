<?php
// session_start();
require './database/dbcon.php';
require 'code.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>
    <div class="title">
        <h1 class="title">Online Doctor's Office</h1>
    </div>
    <div class="categories">
        <div class="groups">
            <div class="group-img"></div>
            <div class="group-data">
                <h2 class="group-name">Patients</h2>
                <a href="homepage.php" class=""><button class="btn">Sign up</button></a>
                <p class="smallText">Don't have an account yet? <a href="register.php" class=""><button class="btn">Sign
                            up</button></a>
                </p>
            </div>
        </div>
        <!-- <div class="groups">
            <div class="group-img"></div>
            <div class="group-data">
                <h2 class="group-name">Doctors</h2>
                <a href="./login/doctorLogin.php" class=""><button class="btn">Log in</button></a>
            </div>
        </div> -->
        <div class="groups">
            <div class="group-img"></div>
            <div class="group-data">
                <h2 class="group-name">Admin</h2>
                <a href="adminLogin.php" class="btn">Log in</a>
            </div>
        </div>
    </div>
</body>
<?php mysqli_close($con); ?>

</html>