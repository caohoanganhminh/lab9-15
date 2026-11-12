<?php
require __DIR__.'/config.php';
$q=$conn->query('SELECT MoTa,SoLanChon FROM binhchon WHERE idBC=1')->fetch_assoc();
$r=$conn->query('SELECT MoTa,SoLanChon FROM phuongan WHERE idBC=1 ORDER BY idPA');
$total=(int)($q['SoLanChon']??0);
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Kết quả bình chọn</title>
<style>body{font:16px Arial;background:#eef2f5;margin:45px}.box{max-width:650px;margin:auto;background:white;padding:25px;border-radius:10px}.bar{height:16px;background:#e5e7eb;min-width:100px}.fill{height:16px;background:#e74c3c}</style>
<div class="box"><h1>KẾT QUẢ BÌNH CHỌN</h1><h3><?=htmlspecialchars($q['MoTa']??'')?></h3>
<table width="100%" cellpadding="8" border="1" style="border-collapse:collapse"><tr><th>Phương án</th><th>Kết quả</th><th>Số lượt</th></tr>
<?php while($o=$r->fetch_assoc()):$count=(int)$o['SoLanChon'];$percent=$total?($count/$total)*100:0;?>
<tr><td><?=htmlspecialchars($o['MoTa'])?></td><td><div class="bar"><div class="fill" style="width:<?=round($percent,2)?>%;max-width:100%"></div></div><?=number_format($percent,2)?>%</td><td><?=$count?></td></tr>
<?php endwhile;?></table><p align="right">Tổng số lượt bình chọn: <?=$total?></p>
<p><a href="index.php">Quay lại</a> | <a href="../">Trang chủ</a></p></div></html>
