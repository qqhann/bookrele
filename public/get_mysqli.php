<?php
require_once __DIR__ . '/../src/bookreledb.php';

$mysqli = get_mysqli();
$res = $mysqli->query(
    "select * from book;"
);

foreach($res as $row) {
    print_r($row);
}

$res = select_search_series("JO");
foreach($res as $row) {
    print_r($row);
}

$res = select_series_book(0);
print_r($res);
foreach($res as $row) {
    print_r($row);
}
