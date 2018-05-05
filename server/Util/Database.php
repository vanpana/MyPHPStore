<?php

class Database
{
    const DB_HOST = 'localhost:3306';
    const DB_NAME = 'store_db';
    const DB_USER = 'dbadmin';
    const DB_PASS = 'dbadmin';
    private static $connection;

    public static function getConnection()
    {
        // If connection wasn't initialized, do it here
        if (static::$connection == null) {
            static::$connection = new mysqli(static::DB_HOST, static::DB_USER, static::DB_PASS, static::DB_NAME);

            if (static::$connection == null) die("Couldn't connect to the database");
        }

        return static::$connection;
    }
}