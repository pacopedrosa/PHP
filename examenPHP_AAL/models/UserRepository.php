<?php

class UserRepository
{

    public static function login($username, $password)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
        $result = $connect->query($query);
        if ($user = $result->fetch_assoc()) {

            return new User($user['id'], $user['username'], $user['rol']);
        } else $_SESSION['info'] = "ERROR";
        return false;
    }

}
