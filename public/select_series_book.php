<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if(isset($_GET['series_id'])) {
    $res = select_series_book($_GET['series_id']);
}

header('Content-Type: text/html; charset=UTF-8');

?>

<?php foreach($res as $row): ?>
<div>
巻数: <?php echo $row['volume'] ?>
公開日: <?php echo $row['published_at'] ?>
</div>
<?php endforeach; ?>
