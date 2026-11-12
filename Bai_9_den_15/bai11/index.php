<?php
require __DIR__.'/config.php';
$limit=10;
$total=(int)$conn->query('SELECT COUNT(*) AS n FROM tintuc')->fetch_assoc()['n'];
$totalPages=max(1,(int)ceil($total/$limit));
$page=max(1,min($totalPages,(int)($_GET['page']??1)));
$start=($page-1)*$limit;
$stmt=$conn->prepare('SELECT id,title FROM tintuc ORDER BY id LIMIT ?,?');
$stmt->bind_param('ii',$start,$limit); $stmt->execute(); $rows=$stmt->get_result();
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Bài 11 - Phân trang</title>
<style>body{font:16px Arial;background:#f2f5f8;margin:40px}.wrap{max-width:720px;margin:auto;background:white;padding:25px;border-radius:10px}.item{padding:12px;border-bottom:1px solid #ddd}.pages a,.pages strong{display:inline-block;padding:8px 11px;margin:3px;border:1px solid #ccc;border-radius:5px;text-decoration:none}.pages strong{background:#1769aa;color:white}</style>
<div class="wrap"><h1>Bài 11 - Phân trang dữ liệu</h1><p>Tổng số tin: <?=$total?> | 10 tin mỗi trang | Trang <?=$page?>/<?=$totalPages?></p>
<?php while($row=$rows->fetch_assoc()):?><div class="item"><strong><?=$row['id']?>.</strong> <?=htmlspecialchars($row['title'])?></div><?php endwhile;?>
<div class="pages"><a href="?page=1">Đầu</a><?php for($i=1;$i<=$totalPages;$i++):?><?php if($i===$page):?><strong><?=$i?></strong><?php else:?><a href="?page=<?=$i?>"><?=$i?></a><?php endif;?><?php endfor;?><a href="?page=<?=$totalPages?>">Cuối</a></div>
<p><a href="../">← Trang chủ</a></p></div></html>
