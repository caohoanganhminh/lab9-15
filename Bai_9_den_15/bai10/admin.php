<?php session_start(); if(empty($_SESSION['admin'])){header('Location: login.php');exit;} ?>
<!doctype html><html lang="vi"><meta charset="utf-8"><h1>Trang quản trị</h1><p>Xin chào <?=htmlspecialchars($_SESSION['display_name'])?>.</p><p>Bạn đã đăng nhập thành công bằng SESSION.</p><a href="logout.php">Đăng xuất</a></html>
