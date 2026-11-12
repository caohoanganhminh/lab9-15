<?php
require __DIR__.'/functions.php';
$id=(int)($_GET['id']??0);$notice='';
if($id>0 && $_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['rate_submit'])){
 $rate=(int)($_POST['rate']??0);
 if($rate>=1&&$rate<=5){setRatingInfo($id,$rate);$notice='Cảm ơn bạn đã đánh giá!';}
}
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Bài 12 - Đánh giá sản phẩm</title>
<style>body{font:16px Arial;background:#eef2f5;margin:30px}.wrap{max-width:850px;margin:auto;background:white;padding:25px;border-radius:10px}article{display:inline-block;vertical-align:top;width:42%;padding:2%;border:1px solid #ddd;margin:1%}.thumb{width:100%;height:160px;object-fit:contain}.product-img{width:280px;max-width:100%;float:left;margin-right:25px}.stats{list-style:none;padding:0}a{color:#1769aa}</style>
<div class="wrap"><h1><a href="index.php">COMPUTER ABC</a></h1>
<?php if($id>0):?><p><a href="index.php">← Danh sách sản phẩm</a></p><?php if($notice):?><p style="color:green"><?=$notice?></p><?php endif;?>
<section><?=getProduct($id)?><div style="clear:both"></div><form method="post"><h3>Đánh giá sản phẩm</h3><?php for($i=5;$i>=1;$i--):?><label><input type="radio" name="rate" value="<?=$i?>" <?=$i===5?'checked':''?>> <?=$i?> sao</label> &nbsp;<?php endfor;?><p><button name="rate_submit" value="1">Gửi đánh giá</button></p></form></section>
<?php else:?><h2>Danh sách sản phẩm</h2><?=listProduct()?><?php endif;?>
<p><a href="../">← Trang chủ</a></p></div></html>
