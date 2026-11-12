<?php
require_once __DIR__.'/config.php';
function getRatingInfo($id){
 global $conn;
 $stmt=$conn->prepare('SELECT rate_1,rate_2,rate_3,rate_4,rate_5 FROM rating_info WHERE product_id=?');
 $stmt->bind_param('i',$id);$stmt->execute();$r=$stmt->get_result()->fetch_assoc();
 $out='<h4>Thống kê đánh giá</h4><ul class="stats">';
 for($i=5;$i>=1;$i--){$count=(int)($r['rate_'.$i]??0);$out.='<li>'.$i.' sao: '.$count.' lượt</li>';}
 return $out.'</ul>';
}
function setRatingInfo($id,$rate){
 global $conn;
 if($rate<1||$rate>5)return;
 $column='rate_'.$rate;
 $stmt=$conn->prepare("UPDATE rating_info SET `$column`=`$column`+1 WHERE product_id=?");
 $stmt->bind_param('i',$id);$stmt->execute();
}
function getProduct($id){
 global $conn;
 $stmt=$conn->prepare('SELECT id,title,img_url FROM products WHERE id=?');
 $stmt->bind_param('i',$id);$stmt->execute();$p=$stmt->get_result()->fetch_assoc();
 if(!$p)return '<p>Không tìm thấy sản phẩm.</p>';
 return '<img class="product-img" src="'.htmlspecialchars($p['img_url']).'" alt="Sản phẩm"><h2>'.htmlspecialchars($p['title']).'</h2>'.getRatingInfo($id);
}
function listProduct(){
 global $conn;$r=$conn->query('SELECT id,title,img_url FROM products ORDER BY id');$out='';
 while($p=$r->fetch_assoc()){
  $out.='<article><img class="thumb" src="'.htmlspecialchars($p['img_url']).'" alt=""><h3><a href="index.php?id='.(int)$p['id'].'">'.htmlspecialchars($p['title']).'</a></h3>'.getRatingInfo((int)$p['id']).'</article>';
 }
 return $out;
}
