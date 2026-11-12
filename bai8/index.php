<?php
// Bai 8: Su dung CKEditor de soan thao trong PHP
$tomtat = '';
$noidung = '';
$daGui = ($_SERVER['REQUEST_METHOD'] === 'POST');
if ($daGui) {
    $tomtat = trim($_POST['tomtat'] ?? '');
    $noidung = trim($_POST['noidung'] ?? '');
}
function e($value) {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
// Chi cho phep mot so the HTML co ban khi hien thi ban xem truoc.
function locHtml($html) {
    return strip_tags($html, '<p><br><strong><b><em><i><u><ul><ol><li><h1><h2><h3><blockquote><a>');
}
?>
<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bài 8 - Sử dụng CKEditor trong PHP</title>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<style>
*{box-sizing:border-box}body{margin:0;background:#f1f5f9;color:#1e293b;font:16px Arial,sans-serif}
.wrap{max-width:1000px;margin:35px auto;padding:0 16px}.panel{background:#fff;padding:28px;border-radius:14px;box-shadow:0 8px 28px #0f172a12}
h1{margin-top:0;color:#145da0}.note{background:#eff6ff;padding:13px 16px;border-left:4px solid #2684d9;border-radius:6px;line-height:1.55}
label{display:block;font-weight:bold;margin:22px 0 8px}input[type=text]{width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:7px}
button{margin-top:20px;padding:12px 22px;border:0;border-radius:8px;background:#1769aa;color:white;font-weight:bold;cursor:pointer}
.result{margin-top:25px;padding:18px;border:1px solid #cbd5e1;border-radius:8px;background:#f8fafc}.result h2{color:#145da0}.raw{white-space:pre-wrap;overflow-wrap:anywhere;background:#fff;padding:12px;border:1px solid #e2e8f0;border-radius:6px}
a{color:#1769aa}
</style>
</head>
<body>
<div class="wrap"><main class="panel">
<h1>BÀI 8 – SỬ DỤNG CKEDITOR ĐỂ SOẠN THẢO TRONG PHP</h1>
<p class="note"><b>Mục tiêu:</b> Sử dụng trình soạn thảo CKEditor để nhập nội dung có định dạng, gửi dữ liệu bằng biểu mẫu POST và nhận nội dung trong PHP. Thư viện CKEditor được tải từ CDN nên máy cần có Internet.</p>
<form method="post" action="">
    <label for="tomtat">Cách 1: CKEDITOR.replace('tomtat') – Soạn thảo tóm tắt</label>
    <textarea name="tomtat" id="tomtat" rows="7"><?= e($tomtat) ?></textarea>

    <label for="noidung">Cách 2: Áp dụng CKEditor cho tất cả textarea – Nội dung chi tiết</label>
    <textarea name="noidung" id="noidung" rows="9"><?= e($noidung) ?></textarea>
    <button type="submit" name="gui">Gửi nội dung</button>
</form>

<?php if ($daGui): ?>
<section class="result">
    <h2>KẾT QUẢ PHP NHẬN ĐƯỢC</h2>
    <h3>Tóm tắt</h3>
    <?php if ($tomtat !== ''): ?>
        <div><?= locHtml($tomtat) ?></div>
        <p><b>Dữ liệu HTML nhận được:</b></p><div class="raw"><?= e($tomtat) ?></div>
    <?php else: ?><p>Bạn chưa nhập phần tóm tắt.</p><?php endif; ?>
    <hr>
    <h3>Nội dung chi tiết</h3>
    <?php if ($noidung !== ''): ?>
        <div><?= locHtml($noidung) ?></div>
        <p><b>Dữ liệu HTML nhận được:</b></p><div class="raw"><?= e($noidung) ?></div>
    <?php else: ?><p>Bạn chưa nhập nội dung chi tiết.</p><?php endif; ?>
</section>
<?php endif; ?>
<p style="margin-top:24px"><a href="../">← Quay về danh sách bài thực hành</a></p>
</main></div>
<script>
// Cach 1: goi CKEDITOR.replace() cho mot textarea cu the.
CKEDITOR.replace('tomtat');
// Cach 2: duyet tat ca textarea va khoi tao CKEditor cho tung o.
document.querySelectorAll('textarea').forEach(function(el) {
    if (!CKEDITOR.instances[el.id]) CKEDITOR.replace(el.id);
});
</script>
</body>
</html>
