<?php

class Database
{
    const DB_HOST = 'localhost:3306';
    const DB_NAME = 'store_db';
    const DB_USER = 'dbadmin';
    const DB_PASS = 'dbadmin';
    private static $db;

    public static function getConnection()
    {
        // If connection wasn't initialized, do it here
        if (static::$db == null) {
            $dsn = 'mysql:host=' . static::DB_HOST . ';dbname=' . static::DB_NAME . ';charset=utf8';
            static::$db = new PDO($dsn, static::DB_USER, static::DB_PASS);

            if (static::$db == null) die("Couldn't connect to the database");
        }

        return static::$db;
    }
}