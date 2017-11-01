<?php

require '../config.php';
session_start();
unset($_SESSION['id']);
header('Location:'. BASE_URL);

?>