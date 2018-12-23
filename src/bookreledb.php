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

/*
 * [x] Top / Search Function
 * [x] All User
 * [x] All Series
 * [x] All Book
 * [x] New Series
 * [x] New Book
 * [x] Edit Series
 * [x] Edit Book
 * [x] Delete Series
 * [x] Delete Book
 * [x] New Subscription
 * [x] Delete Subscription 
 * [x] Series Subscripted by User
 * [x] Book of a Series
 * [x] Sign up / New User
 * [x] Login
 * [x] Logout
 */

function select_search_series($keyword) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
SELECT id, name, complete
FROM series
WHERE name LIKE '%{$keyword}%';
    ");
    return $res;
}

function select_all_user() {
    $mysqli = get_mysqli();
    $res = $mysqli->query(
        "SELECT email, password FROM user;"
    );
    return $res;
}
function select_all_series() {
    $mysqli = get_mysqli();
    $res = $mysqli->query(
        "SELECT name, complete FROM series;"
    );
    return $res;
}
function select_all_book() {
    $mysqli = get_mysqli();
    $res = $mysqli->query(
        "SELECT series_id, volume, published_at FROM book;"
    );
    return $res;
}

// Insert
function insert_new_series($name, $complete) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
INSERT INTO series (name, complete)
VALUES ('{$name}', {$complete});
    ");
    return $res;
}
function insert_new_book($series_id, $volume, $published_at) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
INSERT INTO series (series_id, volume, published_at)
VALUES ({$series_id}, {$volume}, '{$published_at}');
    ");
    return $res;
}
// Update
function update_series($id, $name, $complete) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
UPDATE series SET name='{$name}', complete={$complete}
WHERE id = {$id};
    ");
    return $res;
}
function update_book($series_id, $volume, $published_at) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
UPDATE series SET published_at='{$published_at}'
WHERE series_id = {$series_id} AND volume = {$volume};
    ");
    return $res;
}
// Delete
function delete_series($id) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
DELETE FROM series
WHERE id = {$id};
    ");
    return $res;
}
function delete_book($series_id, $volume) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
DELETE FROM book
WHERE series_id = {$id} AND volume = {$volume};
    ");
    return $res;
}
/*
 * New Subscription
 * Delete Subscription 
 * Series Subscripted by User
 * Book of a Series
 */
function insert_new_subscription($user_email, $series_id) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
INSERT INTO subscription (user_email, series_id)
VALUES ('{$user_email}', {$series_id});
    ");
    return $res;
}
function delete_subscription($user_email, $series_id) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
DELETE FROM subscription
WHERE user_email = {$user_email}, series_id = {$series_id};
    ");
    return $res;
}
function select_series_subscripted_by_user($user_email) {
    $mysqli = get_mysqli();
    $res = $mysqli->query("
SELECT name, complete
FROM series
WHERE series.id = subscription.series_id
AND subscription.user_email = {$user_email};
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
