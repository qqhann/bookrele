<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $res = select_search_series($name);
}

header('Content-Type: text/html; charset=UTF-8');

?>

<?php foreach($res as $row): ?>
<div>
<?php print_r($row) ?>
</div>
<?php endforeach; ?>
