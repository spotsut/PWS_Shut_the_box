<?php

class Register
{
    public $email_user;
    public $nickname_user;
    public $msg;
    public function register_user($nick, $email, $pass)
    {
        $chk_email = $this->emailCheck($email);
        if ($chk_email == 0) {

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
                $this->nickname_user = "";
                $this->email_user = "";
                $msg = "<strong class='msg_sucesso'>O seu registo foi feito com sucesso!</strong>";
            } else {
                $msg = "<strong>Error: ($chk_email)</strong>>" . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }else{
            $msg = "<strong class='msg_erro'>O email: $email  já se encontra registado na base de dados!</strong>";
        }
        return $msg;
    }

    private function emailCheck($email){
        $exist = 0;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT email FROM users where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $exist = 1;
        }

        $conn->close();
        return $exist;
    }
}