<?php
require "../include/All.php";

switch ($method) {
    case "GET":
        if (isset($_SESSION['user'])) {
            echo json_encode(["user" => $_SESSION["user"]]);
        } else {
            http_response_code(401);
            echo json_encode(["error" => "User not logged in"]);
        }
        break;
    case "POST":
        $id = $_POST["id"];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $imageUrl = $_POST['imageUrl'];
        $role = $_POST['role'];
        setSession($id, $name, $email, $password, $imageUrl, $role );
        break;
}
