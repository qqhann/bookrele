<?php
require_once __DIR__ . '/../src/session.php';

echo $__ROOT__;
echo 'Location: '.$__ROOT__.'/';
echo PASSWORD_DEFAULT;
echo '<br>';
echo password_hash('qqhann', PASSWORD_DEFAULT);
