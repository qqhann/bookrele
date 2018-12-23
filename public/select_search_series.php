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
<a href="/~s1511548/select_series_book.php?series_id=<?php echo $row['id'] ?>">
<div>
名前: <?php echo $row['name'] ?>
完結(真偽値0or1): <?php echo $row['complete'] ?>
</div>
</a>
<?php endforeach; ?>
