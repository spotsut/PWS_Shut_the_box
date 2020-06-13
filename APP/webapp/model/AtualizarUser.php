<?php


use ArmoredCore\WebObjects\Session;

class AtualizarUser
{
    public function autalizar($id, $nickname, $nome, $apelido, $email)
    {
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

        $sql = "update users set nickname = '$nickname', nome = '$nome', apelido  = '$apelido',  email = '$email' where id_user = '$id';";
        if ($conn->query($sql) === TRUE) {
            //$msg = "<strong class='msg_sucesso'>O seu registo foi feito com sucesso!</strong>";
            $sql = "SELECT * FROM users WHERE id_user = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $result = $result->fetch_row();
                Session::set('user', $result);
            }
        }

        return $scores;
    }
}