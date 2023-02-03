<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/general.css">
</head>


<?php

setcookie("username", "istike");
if(isset($_COOKIE["username"])){
    echo "HIIIIIIIIIIIIIIIIIII";
}else{
    echo "BYEEEEEEEEEEEEEEEEEEEE";
}
    //login.php

    // include("../database/dbcon.php");

    // if (isset($_COOKIE["type"])) {
//     header("location:../index.php");
// }

    // $message = '';

    // if (isset($_POST["user_login"])) {
//     if (empty($_POST["username"]) || empty($_POST["password"])) {
//         $message = "<div class='alert alert-danger'>Both Fields are required</div>";
//     } else {
//         $username = $_POST["username"];
//         $query = "SELECT * FROM users WHERE username = $username";

    // $statement = $connect->prepare($query);
// $statement->execute(
//     array(
//         'user_email' => $_POST["user_email"]
//     )
// );
// $count = $statement->rowCount();
//         if ($count > 0) {
//             $result = $statement->fetchAll();
//             foreach ($result as $row) {
//                 if (password_verify($_POST["user_password"], $row["user_password"])) {
//                     setcookie("type", $row["user_type"], time() + 3600);
//                     header("location:index.php");
//                 } else {
//                     $message = '<div class="alert alert-danger">Wrong Password</div>';
//                 }
//             }
//         } else {
//             $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
//         }
//     }
// }
    ?>

<body>
    <div class="">
        <h4>
            <a href="../index.php" class=""><button class="btn">BACK</button></a>
        </h4>
        <div class="container">
            <div class="form">
                <form action="" method="POST" class="form">

                    <div class="">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="">
                    </div>
                    <div class="">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="">
                    </div>
                    <div class="">
                        <button type="submit" name="user_login" class="sign">Login</button>
                    </div>
                    <p class="smallText">Don't have an account? <a href="./userRegister.php" class="sign">Sign
                            in</a></p>

                </form>
            </div>
        </div>
    </div>


</body>

</html>