<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if (isset($_GET['series_name']) && isset($_GET['volume']) && isset($_GET['delete'])) {
    $series_name = $_GET['series_name'];
    $volume      = $_GET['volume'];

    $res = delete_book($series_name, $volume);
    if (
        true
    ) {
        header('Location: '.$__ROOT__.'/series.php?series_name='.$series_name);
        exit;
    }
    
    http_response_code(500);
}