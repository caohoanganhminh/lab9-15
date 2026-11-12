<?php
session_start();
if (!isset($_SESSION['demo_name'])) { $_SESSION['demo_name']='Sinh viên PHP'; $_SESSION['demo_age']=20; }
$_SESSION['visits'] = ($_SESSION['visits'] ?? 0) + 1;
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Bài 10 - Session</title>
<style>body{font:16px Arial;background:#f4f6f8;margin:40px}main{max-width:700px;margin:auto;background:white;padding:25px;border-radius:10px}li{margin:12px}</style>
<main><h1>Bài 10 - Một số bài tập về SESSION</h1>
<h3>1. Lưu thông tin trong Session</h3><p>Tên: <?=htmlspecialchars($_SESSION['demo_name'])?> | Tuổi: <?=$_SESSION['demo_age']?></p>
<h3>2. Bộ đếm lượt truy cập</h3><p>Bạn đã tải lại trang này <?=$_SESSION['visits']?> lần trong phiên hiện tại.</p>
<h3>3. Đăng nhập quản trị</h3><p><a href="login.php">Mở trang đăng nhập</a></p>
<ul><li><a href="test_session.php">Kiểm tra session ở trang khác</a></li><li><a href="unset.php">Xóa session ví dụ</a></li><li><a href="../">Trang chủ</a></li></ul></main></html>
