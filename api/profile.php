<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../database/connect.php';
    include_once '../function/accounts.php';

    $database = new Database();
    $connect = $database->connectDatabase();
    $account = new Accounts($connect);
    $account->id = isset($_GET['id']) ? $_GET['id'] : die();

    echo json_encode($account->getProfile());
?>