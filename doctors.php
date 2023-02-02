<?php
session_start();
require './database/dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/homepage.css">
</head>

<body>
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Patients
                            <a href="user-create.php" class="btn btn-primary float-end">Add users</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Specialization</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM doctors";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $user) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $user['doctor_id']; ?>
                                            </td>
                                            <td>
                                                <?= $user['d_first_name']; ?>
                                            </td>
                                            <td>
                                                <?= $user['d_last_name']; ?>
                                            </td>
                                            <td>
                                                <?= $user['d_username']; ?>
                                            </td>
                                            <td>
                                                <?= $user['d_email']; ?>
                                            </td>
                                            <td>
                                                <?= $user['specialization']; ?>
                                            </td>
                                            <td>
                                                <a href="user-view.php?id=<?= $user['doctor_id']; ?>"
                                                    class="btn btn-info btn-sm">View</a>
                                                <a href="user-edit.php?id=<?= $user['doctor_id']; ?>"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_user" value="<?= $user['doctor_id']; ?>"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>