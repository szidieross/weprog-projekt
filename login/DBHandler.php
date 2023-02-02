<?php

use function PHPSTORM_META\type;

class DBhandler
{
    public $dbh;

    function __construct()
    {
        $server_name = "mysql:host=localhost";
        $username = "root";
        $database_name = "rendelo";
        $this->dbh = new PDO("$server_name;$database_name", "$username", "");
    }


    function getID($email, $password)
    {
        $password = md5($password);
        $stmt = $this->dbh->prepare("SELECT id from user WHERE email='$email' AND password='$password'");
        $stmt->execute();

        return $stmt->fetchColumn();
    }


    function login($username, $password)
    {
        $password = md5($password);
        $stmt = $this->dbh->prepare("SELECT * from users WHERE username='$username' AND password='$password'");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            // date_default_timezone_set('Europe/Bucharest');
            // $date = getdate();
            // $today = date("Y.m.d - H:i:s");
            $sql = "UPDATE users SET last_login=? WHERE username='$username' AND password='$password'";
            // $this->dbh->prepare($sql)->execute([$today]);
            return true;
        } else
            return false;
    }

    function register($password, $email, $name)
    {


        $date = getdate();
        $today = date("Y.m.d - H:i:s");
        $sql = "INSERT INTO user (password,email, name,created_at) VALUES (:password, :email, :name, :created_at)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['password' => md5($password), 'email' => $email, 'name' => $name, 'created_at' => $today]);
    }

    function documentinsert($filename, $file_type, $date_uploaded, $id)
    {


        $sql = "INSERT INTO storage (filename,file_type,date_uploaded,user_id) VALUES (:filename, :file_type,:date_uploaded, :user_id)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['filename' => $filename, 'file_type' => $file_type, 'date_uploaded' => $date_uploaded, 'user_id' => $id]);
    }


    function getdocuments($id)
    {
        $stmt = $this->dbh->prepare("SELECT * FROM storage WHERE user_id=?");
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        if (sizeof($data) == 0) {
            echo
                "<h2>No files uploaded</h2>";


        } else {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Type</th>";
            echo "<th>Date</th>";
            echo "<th>Action</th>";
            echo "<th>View</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($data as $row) {
                echo "<tr>";

                echo "<td data-label='Name'>" . $row['filename'] . "</td>";
                echo "<td data-label='Type'>" . $row['file_type'] . "</td>";
                echo "<td data-label='Date'>" . $row['date_uploaded'] . "</td>";
                echo "<td data-label='Delete'><a class='delete'href='deletestorage.php?id=" . $row["id"] . "' >Delete</td>";
                echo "<td data-label='View'><a class='view'href='viewfile.php?id=" . $row["id"] . "' >View</td>";


                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";

        }
    }


}