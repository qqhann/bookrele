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

function select_all_series() {
    $mysqli = get_mysqli();
    $res = $mysqli->query(
        "SELECT name, complete FROM series;"
    );
    return $res;
}
function select_all_user() {
    $mysqli = get_mysqli();
    $res = $mysqli->query(
        "SELECT email, password FROM user;"
    );
    return $res;
}

function select_search_series($keyword) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
SELECT name, complete
FROM series
WHERE name LIKE '%{$keyword}%';
    ");
    return $res;
}

function select_series_book($series_id) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
SELECT volume, published_at
FROM book
WHERE series_id = {$series_id};
    ");
    return $res;
}

function signup($email, $password) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
INSERT INTO user (email, password)
VALUES ('{$email}', '{$password}');
    ");
    return $res;
}
function login($email) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
SELECT email, password
FROM user
WHERE email = '{$email}';
    ");
    return $res;
}
