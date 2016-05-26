<?php
require_once "config.php";
require SITE_ROOT.'/vendor/autoload.php';

class MysqlDB
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