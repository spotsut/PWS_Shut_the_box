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
        $count = 0;
        while ($row = $result->fetch_row()) {
            $scores[$count] = $row;
            $count++;
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


        $sql = "SELECT s.id_score, u.nickname,  s.score, s.state, s.data FROM scores s
                inner join users u on s.user = u.id_user
                ORDER BY score DESC LIMIT 10;";
        $result = $conn->query($sql);
        $count = 0;
        while ($row = $result->fetch_row()) {
            $scores[$count] = $row;
            $count++;
        }

        return $scores;
    }

    public function users(){
        $users = null;
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

        $sql = "select * from users order by nickname asc;";
        $result = $conn->query($sql);
        $count = 0;
        while ($row = $result->fetch_row()) {
            $users[$count] = $row;
            $count++;
        }

        return $users;
    }
}