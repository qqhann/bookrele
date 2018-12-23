<?php
require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
?>

<h1>Series: シリーズ（本のシリーズ）</h1>
<?php 
$res = select_all_series();
foreach($res as $row): ?>
<div>
<?php echo $row['name'] ?>
</div>
<?php endforeach; ?>

<h1>Book: 本（個々の本）</h1>
<?php 
$res = select_all_book();
foreach($res as $row): ?>
<div>
<?php echo $row['series_name'] ?>
<?php echo $row['volume'] ?>
</div>
<?php endforeach; ?>

<h1>User: ユーザー</h1>
<?php 
$res = select_all_user();
foreach($res as $row): ?>
<div>
<?php echo $row['email'] ?>
</div>
<?php endforeach; ?>
