<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: multipart/form-data; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../database/connect.php';
    include_once '../function/reports.php';

    $database = new Database();
    $connect = $database->connectDatabase();
    $report = new Reports($connect);

    $fileName = $_FILES['picture']['name'];
    $tempPath = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];

    $tempName = time();
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    move_uploaded_file($tempPath, '../image/' . $tempName . '.' . $fileExt);

    // if(empty($fileName)) {
    //     $error = true;
    //     echo json_encode(        
    //         array(
    //             'error' => true,
    //             'message' => 'Please select image first'
    //         )
    //     );
    // } else {
	//     $upload_path = 'image/';
	//     $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
	//     $valid_extensions = array('jpeg', 'jpg', 'png'); 

    //     if(in_array($fileExt, $valid_extensions)) {			
    //         if(!file_exists($upload_path . $fileName)) {
    //             if($fileSize < 5000000) {
    //                 move_uploaded_file($tempPath, '../image/'.$fileName);
    //             } else {		
    //                 $error = true;
    //                 echo json_encode(
    //                     array(
    //                         'error' => true,
    //                         'message' => 'Maximum size of image is 5 MB'
    //                     )
    //                 );
    //             }
    //         } else {		
    //             $error = true; 
    //             echo json_encode(
    //                 array(
    //                     'error' => true,
    //                     'message' => 'Image already exists'
    //                 )
    //             );
    //         }
    //     } else {	
    //         $error = true;
    //         echo json_encode(   
    //             array(
    //                 'error' => true,
    //                 'message' => 'Invalid Extension, only JPG, JPEG or PNG are allowed'
    //             )
    //         );
    //     }
    // }
		
    $report->animal = $_POST['animal'];
    $report->status = $_POST['status'];
    $report->province = $_POST['province'];
    $report->city = $_POST['city'];
    $report->location = $_POST['location'];
    $report->color = $_POST['color'];
    $report->characteristic = $_POST['characteristic'];
    $report->reporter = $_POST['reporter'];
    $report->phone = $_POST['phone'];
    $report->date = $_POST['date'];
    $report->picture = $tempName . '.' . $fileExt;

    $report->createReport();
?>