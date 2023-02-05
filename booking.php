<?php
// session_start();
require './database/dbcon.php';
require 'code.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>

    <div class="">
        <?php if (isset($_COOKIE['username'])): ?>
            <a href="./homepage.php"><button class="btn">Back to Homepage</button></a>
            <form action="" method="POST" class="">
                <input type="hidden" name="username" value="<?= $_COOKIE["username"] ?>" />
                <button type="submit" name="logout" value="<?= $user['user_id']; ?>" class="btn">Log Out</button>
            </form>
            <table class="">
                <h4>
                    <a href="./index.php" class="btn">Log out</a>
                </h4>
                <h2 class="title">Available Appointments</h2>

                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM appointments";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $user) {
                            ?>
                            <?php if ($user['taken'] == false): ?>
                                <tr>
                                    <td>
                                        <?= $user['date']; ?>
                                    </td>
                                    <td>
                                        <?= $user['time']; ?>
                                    </td>
                                    <form action="" method="POST" class="form-flex">
                                        <input type="hidden" name="appointment_id" value="<?= $user['appointment_id']; ?>" />
                                        <td><button type="submit" name="add_appointment" value="<?= $user['appointment_id']; ?>"
                                                class="btn">Book
                                                Appointment</button></td>
                                    </form>

                                </tr>
                            <?php endif; ?>
                            <?php
                        }
                    } else {
                        echo "<tr><h5> No Record Found </h5></tr>";
                    }
                    ?>

                </tbody>
            </table>

        <?php else: ?>
            <div class="noRights">
                <p>You can't reach this page.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
<?php mysqli_close($con); ?>

</html>