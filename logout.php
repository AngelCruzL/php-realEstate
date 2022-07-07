<?php
session_start();

$_SESSION = [];
header('Location: /bienes-raices/src/index.php');
