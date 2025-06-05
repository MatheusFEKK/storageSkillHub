<?php

    require_once'./config/connection.php';
    require_once'./objects/File.php';

    $database = new database();
    $db       = $database->connect();
    $fileObj = new File($db);

    
    if ($db)
    {
        echo "Connected successfully with the storage server\n";
    }else{
        echo "Connection severed with the storage server\n";
    }

    // $EncodedData = file_get_contents('php://input');
    // $DecodedData = json_decode($EncodedData, true);
    // if(isset($DecodedData['imageName']))
    // {
        
    // }

    if (isset($_POST['sendFile']))
    {
        $fileObj->UploadFile('thatshitworked2');
            
        if (isset($_FILES['uploadFile']) && $_FILES['uploadFile']['error'] === UPLOAD_ERR_OK)
        {
                $fileObj->UploadFile('chegoarquivoagora');
                $directory = './imageFiles/';
                $pasta = $directory . basename(($_FILES['uploadFile']['name']));
                
                if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $pasta))
                {   
                    http_response_code(200);
                    echo "Upload successfully";
                }else{
                    http_response_code(400);
                    echo "Upload failed";
                }     
            }else {
                http_response_code(400);
                echo "No file uploaded";
            }
            
    }
    
    if (isset($_POST['jsonData']))
    {
        $jsonData = json_decode($_POST['jsonData'], true);
        $fileObj->UploadFile($jsonData);
        if ($jsonData)
        {
            echo "JSON data receveied";
        }else{
            echo "Invalid Json tata\n";
        }
    }else{
        echo "No JSON data received\n";
    }