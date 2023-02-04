<?php
// session_start();
require './database/dbcon.php';
require './database/code.php';
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
            <?php if ($_COOKIE['username'] === 'admin'): ?>
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
                                <tr>
                                    <td>
                                        <?= $user['date']; ?>
                                    </td>
                                    <td>
                                        <?= $user['time']; ?>
                                    </td>
                                    <form action="" method="POST" class="form-flex">

                                        <td><button type="submit" name="appointment_booking" value="<?= $user['appointment_id']; ?>"
                                                class="">Book
                                                Appointment</button></td>
                                    </form>

                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><h5> No Record Found </h5></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            <?php endif; ?>

        <?php else: ?>
            even more html
        <?php endif; ?>
    </div>
</body>

</html>