<?php
include "../include/header.php";
session_unset();
session_destroy();
echo json_encode($_SESSION);
die;
