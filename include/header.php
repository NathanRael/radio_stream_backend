<?php
if (!isset($_SESSION)) {
    session_start();
}

function cors($param = true)
{
    $method = $_SERVER["REQUEST_METHOD"];
    if ($param) {
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }

        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            exit(0);
        }
    } else {
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header('Access-Control-Allow-Headers: X-Requested-With, Origin, Content-Type, X-CSRF-Token, Accept, Access-Control-Allow-Headers');
        header('Access-Control-Allow-Methods: GET,POST, DELETE,PATCH,PUT, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
    }
}
cors(true);
//http://localhost:5173
//http://192.168.43.229:5173