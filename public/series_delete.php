<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if (isset($_GET['series_name']) && isset($_GET['delete'])) {
    $name = $_GET['series_name'];

    $res = delete_series($name);
    if (
        true
    ) {
        header('Location: '.$__ROOT__.'/');
        exit;
    }
    
    http_response_code(500);
}