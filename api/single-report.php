<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../database/connect.php';
    include_once '../function/reports.php';

    $database = new Database();
    $connect = $database->connectDatabase();
    $report = new Reports($connect);
    $report->id = isset($_GET['id']) ? $_GET['id'] : die();

    echo json_encode($report->getSingleReport());
?>