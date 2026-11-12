<?php
session_start();require __DIR__.'/config.php';
$question=$conn->query('SELECT MoTa FROM binhchon WHERE idBC=1')->fetch_assoc();
$stmt=$conn->prepare('SELECT idPA,MoTa FROM phuongan WHERE idBC=1 ORDER BY idPA');$stmt->execute();$options=$stmt->get_result();
$message='';
if(isset($_SESSION['voted']))$message='Bạn đã bình chọn trong phiên này. Bạn có thể xem kết quả bên dưới.';
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Bài 15 - Bình chọn</title>
<style>body{font:16px Arial;background:#eef2f5;margin:45px}.box{max-width:550px;margin:auto;background:white;padding:25px;border-radius:10px}label{display:block;padding:9px}.btn{padding:10px 18px}</style>
<div class="box"><h1>BÌNH CHỌN</h1><h3><?=htmlspecialchars($question['MoTa']??'Bình chọn')?></h3>
<?php if($message):?><p style="color:#9a6700"><?=htmlspecialchars($message)?></p><?php endif;?>
<form method="post" action="vote.php">
<?php $first=true;while($o=$options->fetch_assoc()):?><label><input type="radio" name="idPA" value="<?=(int)$o['idPA']?>" <?=$first?'checked':''?>> <?=htmlspecialchars($o['MoTa'])?></label><?php $first=false;endwhile;?>
<p><button class="btn" type="submit" <?=isset($_SESSION['voted'])?'disabled':''?>>Bình chọn</button> <a href="ketqua.php">Xem kết quả</a></p>
</form><p><a href="../">← Trang chủ</a></p></div></html>
