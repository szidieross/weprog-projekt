<?php
// session_start();
require '../database/dbcon.php';
require '../database/code.php';

// if (isset($_POST['add_user'])) {
//     // $id = mysqli_real_escape_string($con, $_POST['id']);

//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
//     $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);

//     $query = "INSERT INTO users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', password='$password'";
//     $query_run = mysqli_query($con, $query);

//     echo "dfgfgdfgdfg"
//     ;
//     if ($query_run) {
//         // $_SESSION['message'] = "Student Updated Successfully";
//         header("Location: ./userLogin.php");
//         exit(0);
//     } else {
//         // $_SESSION['message'] = "Student Not Updated";
//         header("Location: ../index.php");
//         exit(0);
//     }
// }
?>

<?php
// if (isset($_POST['save_student'])) {
//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);

//     $query = "INSERT INTO patient (username,email,password) VALUES ('$username','$email','$password')";

//     $query_run = mysqli_query($con, $query);
//     if ($query_run) {
//         $_SESSION['message'] = "Student Created Successfully";
//         header("Location: index.php");
//         exit(0);
//     } else {
//         $_SESSION['message'] = "Student Not Created";
//         header("Location: index.php");
//         exit(0);
//     }
// }
?>

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
                <form action="" method="POST" class="">

                    <div class="">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="" required>
                    </div>
                    <div class="">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="" required>
                    </div>
                    <div class="">
                        <label>Username</label>
                        <input type="text" name="username" class="" required>
                    </div>
                    <div class="">
                        <label>Email</label>
                        <input type="email" name="email" class="" required>
                    </div>
                    <div class="">
                        <label>Password</label>
                        <input type="password" name="password" class="" required>
                    </div>
                    <div class="">
                        <button type="submit" name="add_user" class="sign">Sign up</button>
                    </div>
                    <p class="smallText">Already have an account? <a href="./userLogin.php" class="sign">Sign
                            in</a></p>

                </form>
            </div>
        </div>
    </div>


    <?php
    // include('DBhandler.php');
    // $server = new DBhandler();
    // if (isset($_POST['submit'])) {
    //     $msg;
    //     $dbh = new PDO("mysql:host=localhost;dbname=webprojekt", "root", "");
    //     $firstname = $_POST['firstname'];
    //     $lastname = $_POST['lastname'];
    //     $name = $firstname . " " . $lastname;
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     $confirm_pass = $_POST['confirm_pass'];
    


    //     $number = preg_match('@[0-9]@', $password);
    //     $uppercase = preg_match('@[A-Z]@', $password);
    //     $lowercase = preg_match('@[a-z]@', $password);
    //     $specialChars = preg_match('@[^\w]@', $password);
    
    //     function checkEmail($email)
    //     {
    //         $dbh = new PDO("mysql:host=localhost;dbname=webprojekt", "root", "");
    //         $stmt = $dbh->prepare("SELECT * from user WHERE email='$email'");
    //         $stmt->execute();
    //         $count = $stmt->rowCount();
    
    //         if ($count == 0)
    //             return true;
    //         else
    //             return false;
    //     }
    

    //     if (
    //         empty($firstname) ||
    //         empty($lastname) ||
    //         empty($email) ||
    //         empty($password) ||
    //         empty($confirm_pass)
    //     ) {
    //         echo "
    //     <script>document.getElementById('status').innerHTML='All fields required'</script>
    //     ";
    //         die();
    //     }
    
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         echo "
    //         <script>document.getElementById('status').innerHTML='Valid email required'</script>
    //     ";
    //         die();
    //     }
    
    //     if (!checkEmail($email)) {
    //         echo "
    //     <script>document.getElementById('status').innerHTML='Email already used'</script>
    //     ";
    //         die();
    //     }
    
    //     if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    //         echo "
    
    //         <script>
    //         document.getElementById('status').style.fontSize='15px'
    //         document.getElementById('status').innerHTML='Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.'</script>
    //     ";
    //         die();
    //     }
    
    //     if ($password != $confirm_pass) {
    //         echo "
    //     <script>
    //     document.getElementById('status').innerHTML='Confirm password dont match'
    
    //     </script>
    //     ";
    //         die();
    //     }
    
    //     echo "
    
    //         <script>
    //         document.getElementById('status').style.color='green'
    //         document.getElementById('status').innerHTML='Succes'</script>
    //     ";
    //     $server->register($password, $email, $name);
    



    // }
    ?>
</body>

</html>