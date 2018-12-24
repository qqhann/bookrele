<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if (isset($_GET['series_name']) && isset($_GET['subscribe'])) {
    $user_email = current_user();
    $series_name = $_GET['series_name'];

    $res = insert_new_subscription($user_email, $series_name);
    if (
        true
    ) {
        header('Location: '.$__ROOT__.'/series.php?series_name='.$series_name);
        exit;
    }
    
    http_response_code(500);
}