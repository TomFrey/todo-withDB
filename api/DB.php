<?php


class DB
{

    private static $SERVERNAME = "localhost";
    private static $DB_NAME = "todo_app";
    private static $USERNAME = "root";
    private static $PASSWORD = "root";

    private static $CONN;


    public static function get() {
        if (!DB::$CONN) {
            DB::$CONN = new PDO("mysql:host=" . DB::$SERVERNAME . ";dbname=" . DB::$DB_NAME . ";charset=utf8mb4", DB::$USERNAME, DB::$PASSWORD);
            DB::$CONN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return DB::$CONN;
        } else {
            return DB::$CONN;
        }

    }

}


/*class DB_optimized
{
    private static $PDO;

    public static function get()
    {
        return DB_optimized::$PDO ?: DB_optimized::$PDO = new PDO('mysql:host=localhost;dbname=todo_app;charset=utf8mb4', 'root', 'root');
    }
}*/
