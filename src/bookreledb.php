<?php

//require
require_once __DIR__.'/../vendor/autoload.php';

//for .env
use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__.'/..');
$dotenv->load(); //.envが無いとエラーになる

function get_mysqli() {
    $host = "localhost";
    $dbname = "s1511548";
    $user = "s1511548";
    $pass = getenv('MYSQL_PASSWORD');
    $mysqli = new mysqli($host, $user, $pass, $dbname);
    if ($mysqli->connect_error) {
        die("MySQL connection error");
    } else {
        $mysqli->set_charset("utf8");
    };
    return $mysqli;
}
