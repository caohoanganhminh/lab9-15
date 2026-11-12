<?php session_start(); $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 require __DIR__.'/config.php';
 $stmt=$conn->prepare('SELECT username,password,display_name FROM users WHERE username=?');
 $stmt->bind_param('s',$username); $username=trim($_POST['username']??''); $stmt->execute();
 $user=$stmt->get_result()->fetch_assoc();
 if($user && (password_verify($_POST['password']??'',$user['password']) || hash_equals($user['password'],$_POST['password']??''))){
  session_regenerate_id(true); $_SESSION['admin']=$user['username']; $_SESSION['display_name']=$user['display_name'];
  header('Location: admin.php'); exit;
 } else $error='Tên đăng nhập hoặc mật khẩu không đúng.';
}
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Đăng nhập</title><style>body{font:16px Arial;margin:50px}form{max-width:350px;margin:auto;padding:25px;border:1px solid #ddd;border-radius:8px}input{display:block;margin:10px 0;padding:9px;width:95%}</style>
<form method="post"><h2>Đăng nhập quản trị</h2><?php if($error):?><p style="color:red"><?=htmlspecialchars($error)?></p><?php endif;?>
<label>Tên đăng nhập</label><input name="username" required><label>Mật khẩu</label><input type="password" name="password" required><button>Đăng nhập</button><p>Tài khoản mẫu: admin / 123456</p><a href="index.php">Trang chủ bài 10</a></form></html>
