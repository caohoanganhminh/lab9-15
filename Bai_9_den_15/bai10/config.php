<?php
$conn = new mysqli('localhost','root','','session_demo');
if ($conn->connect_error) { die('Lỗi kết nối CSDL: '.htmlspecialchars($conn->connect_error)); }
$conn->set_charset('utf8mb4');
