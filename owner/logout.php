<?php
session_start();
session_destroy();
unset($_SESSION['Id']);
header("Location: ../index.php");
?>