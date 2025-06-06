<?php

    require_once'../config/connection.php';
    require_once'../objects/File.php';
    
    $database = new database();
    $db       = $database->connect();
    $fileObj = new File($db);
    
    if ($db)
    {
        echo "Connected successfully with the storage server\n";
    }else{
        echo "Connection severed with the storage server\n";
    }


    $directory = '../imageFiles/';
    $targetDirectory = $directory . basename(($_FILES['uploadFile']['name']));
    
    if (isset($_FILES['uploadFile']))
    {
                
                if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $targetDirectory))
                {   
                    http_response_code(200);
                    $fileObj->UploadFile($targetDirectory);
                    echo "Upload successfully";
                }else{
                    http_response_code(400);
                    echo "Upload failed";
                }     
            }else {
                http_response_code(400);
                echo "No file uploaded";
                $fileObj->UploadFile('nothinginhere');
        }
