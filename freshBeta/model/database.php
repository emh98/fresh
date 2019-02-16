<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=192.168.56.1;dbname=fresh;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}