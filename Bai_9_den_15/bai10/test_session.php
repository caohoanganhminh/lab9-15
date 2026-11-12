<?php session_start(); ?>
<!doctype html><html lang="vi"><meta charset="utf-8"><h2>Kiểm tra Session</h2>
<p>Xin chào <?=htmlspecialchars($_SESSION['demo_name'] ?? 'Chưa có tên')?>, tuổi: <?=htmlspecialchars((string)($_SESSION['demo_age'] ?? 'Chưa có'))?></p><a href="index.php">Quay lại</a></html>
