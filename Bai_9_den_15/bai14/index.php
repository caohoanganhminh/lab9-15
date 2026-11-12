<?php
session_start();$message='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $input=trim($_POST['input']??'');$expected=$_SESSION['captcha']??'';
 if($expected!=='' && hash_equals($expected,$input))$message='Nhập CAPTCHA chính xác!';
 else $message='CAPTCHA không đúng. Vui lòng thử lại.';
 unset($_SESSION['captcha']);
}
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Bài 14 - CAPTCHA</title>
<style>body{font:16px Arial;background:#eef2f5;margin:50px}form{max-width:480px;margin:auto;background:white;padding:25px;border:1px solid #ccd;border-radius:9px}input[type=text]{padding:12px;width:180px}button{padding:10px 18px}.msg{font-weight:bold;color:#176b39}</style>
<form method="post"><h1>CAPTCHA - WEB</h1><p>Nhập chính xác 6 ký tự trong ảnh:</p>
<input type="text" name="input" maxlength="6" required autocomplete="off" style="text-transform:uppercase">
<img src="captcha.php" alt="Mã CAPTCHA" width="170" height="60" style="vertical-align:middle">
<p><button type="submit">Kiểm tra</button> <button type="button" onclick="document.querySelector('img').src='captcha.php?'+Date.now()">Đổi mã</button></p>
<?php if($message):?><p class="msg"><?=htmlspecialchars($message)?></p><?php endif;?>
<p><a href="../">← Trang chủ</a></p></form></html>
