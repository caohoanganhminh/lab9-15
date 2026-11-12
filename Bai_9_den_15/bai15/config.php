<?php
$conn=new mysqli('localhost','root','','review');
if($conn->connect_error) die('Lỗi kết nối: '.htmlspecialchars($conn->connect_error));
$conn->set_charset('utf8mb4');
