<?php


class Consultas
{
    public function scorespessoais($user) {
        $scores = null;
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

        $sql = "SELECT * FROM scores WHERE user = '$user[0]' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $result = $result->fetch_row();
            $scores = $result;
        }
        return $scores;
    }

    public function topscores() {
        $scores = null;
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

        $sql = "SELECT * FROM scores ORDER BY score DESC LIMIT 10";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $result = $result->fetch_row();
            $scores = $result;
        }
        return $scores;
    }
}