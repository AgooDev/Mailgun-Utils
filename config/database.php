<?php
namespace Mailing\database;
require_once "config.php";
require '../vendor/autoload.php';

class Mysql
{
    function connect()
    {
        $db = new MysqliDb (DB_CONNECTION, DB_USER, DB_PASSWORD, DB_NAME);
        return $db;
    }
    function disconnect($conn)
    {
        unset($conn);
        $conn = null;
    }
}