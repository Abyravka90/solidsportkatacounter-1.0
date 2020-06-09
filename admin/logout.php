<?php
session_start();
session_destroy();
setcookie("logout", "anda telah berhasil logout", time() + 1);
header('location:index.php');
