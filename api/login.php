<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../database/connect.php';
    include_once '../function/accounts.php';

    $database = new Database();
    $connect = $database->connectDatabase();
    $account = new Accounts($connect);
    $data = json_decode(file_get_contents("php://input"));

    $account->identifier = $data->identifier;
    $account->password = $data->password;

    echo json_encode($account->getAccount());
?>