<?php
$message = ''; $uploaded = '';
$dir = __DIR__ . '/uploads/';
if (!is_dir($dir)) { mkdir($dir, 0755, true); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['ufile']) || $_FILES['ufile']['error'] !== UPLOAD_ERR_OK) {
        $message = 'Upload thất bại hoặc bạn chưa chọn ảnh.';
    } elseif ($_FILES['ufile']['size'] > 5 * 1024 * 1024) {
        $message = 'Ảnh vượt quá giới hạn 5MB.';
    } else {
        $tmp = $_FILES['ufile']['tmp_name'];
        $mime = (new finfo(FILEINFO_MIME_TYPE))->file($tmp);
        $types = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];
        if (!isset($types[$mime]) || getimagesize($tmp) === false) {
            $message = 'Tệp không phải ảnh JPG, PNG, GIF hoặc WEBP hợp lệ.';
        } else {
            $name = bin2hex(random_bytes(12)) . '.' . $types[$mime];
            if (move_uploaded_file($tmp, $dir . $name)) $uploaded = 'uploads/' . $name;
            else $message = 'Không thể lưu ảnh. Kiểm tra quyền ghi thư mục uploads.';
        }
    }
}
?>
<!doctype html><html lang="vi"><meta charset="utf-8"><title>Bài 9 - Upload ảnh</title>
<style>body{font:16px Arial;background:#f4f6f8;margin:40px}main{max-width:650px;margin:auto;background:white;padding:25px;border-radius:10px}button{padding:9px 18px}img{max-width:100%;max-height:350px;margin-top:15px}.msg{color:#176b39}</style>
<main><h1>Bài 9 - Kỹ thuật upload hình ảnh</h1>
<p>Chọn ảnh JPG, PNG, GIF hoặc WEBP (tối đa 5MB).</p>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<input type="file" name="ufile" accept="image/jpeg,image/png,image/gif,image/webp" required>
<button type="submit">Upload ảnh</button></form>
<?php if($message): ?><p style="color:#b42318"><?=htmlspecialchars($message)?></p><?php endif; ?>
<?php if($uploaded): ?><p class="msg">Upload thành công!</p><img src="<?=htmlspecialchars($uploaded)?>" alt="Ảnh vừa tải lên"><p><?=htmlspecialchars(basename($uploaded))?></p><?php endif; ?>
<p><a href="../">← Trang chủ</a></p></main></html>
