<?php
require_once __DIR__ . '/../includes/bootstrap.php';
unset($_SESSION[CMS_SESSION_KEY]);
header('Location: /admin/login.php');
exit;
