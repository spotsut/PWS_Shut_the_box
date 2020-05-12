<?php

class Register
{
    public function register_user($nick, $email, $pass)
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (nickname, email, password) VALUES ('$nick', '$email', '$pass')";

        if ($conn->query($sql) === TRUE) {
            $msg =  "New record created successfully";
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        return $msg;
    }
}