<?php
require_once __DIR__ . '/../src/session.php';

echo PASSWORD_DEFAULT;
echo '<br>';
echo password_hash('qqhann', PASSWORD_DEFAULT);
