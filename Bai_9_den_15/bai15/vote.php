<?php
session_start();require __DIR__.'/config.php';
if(isset($_SESSION['voted'])){header('Location: ketqua.php');exit;}
$id=(int)($_POST['idPA']??0);
$stmt=$conn->prepare('SELECT idPA FROM phuongan WHERE idPA=? AND idBC=1');$stmt->bind_param('i',$id);$stmt->execute();
if(!$stmt->get_result()->fetch_assoc()){header('Location: index.php');exit;}
$conn->begin_transaction();
try{
 $a=$conn->prepare('UPDATE binhchon SET SoLanChon=SoLanChon+1 WHERE idBC=1');$a->execute();
 $b=$conn->prepare('UPDATE phuongan SET SoLanChon=SoLanChon+1 WHERE idBC=1 AND idPA=?');$b->bind_param('i',$id);$b->execute();
 $conn->commit();$_SESSION['voted']=true;
}catch(Throwable $e){$conn->rollback();die('Không thể ghi nhận bình chọn.');}
header('Location: ketqua.php');exit;
