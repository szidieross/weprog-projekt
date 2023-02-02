<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/general.css">
</head>

<body>
    <div class="">
        <h4>
            <a href="../index.php" class="btn">BACK</a>
        </h4>
        <div class="container">
            <div class="form">
                <form action="" method="POST"  class="form">

                    <div class="">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <!-- <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div> -->
                    <div class="">
                        <label>Password</label>
                        <input type="password" name="password" class="">
                    </div>
                    <div class="">
                        <button type="submit" name="user_login" class="sign">Login</button>
                    </div>
                    <p class="smallText">Don't have an account? <a href="./userRegister.php" class="sign">Sign
                            up</a></p>

                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // include('DBhandler.php');
        // $dbh = new DBhandler();
        $email = $_POST['username'];
        $password = $_POST['password'];

        if ($dbh->login($email, $password)) {
            $id = $dbh->getID($email, $password);
            echo $id;
            session_start();
            $_SESSION['userID'] = $id;
            header("Location: ../index.php");
            exit();
        } else {
            echo "
    <script>
        document.getElementById('status').style.color = 'red'
        document.getElementById('status').style.fontSize = '15px'
        document.getElementById('status').innerHTML = 'Wrong password or email!'

    </script>
    ";
            die();
        }


    } ?>
</body>

</html>