<?php session_start(); unset($_SESSION['demo_name'],$_SESSION['demo_age']); header('Location: index.php'); exit;
