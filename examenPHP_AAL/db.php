<?php
class Connection
{
    public static function connect()
    {
        $connect = new mysqli("localhost", "root", "", "contactos_empresaliares");
        $connect->query("SET NAMES 'utf8'");
        return $connect;
    }
}