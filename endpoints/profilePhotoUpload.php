<?php

    $directory = '../imageProfile/';
    $targetDirectory = $directory . basename(($_FILES['profileImageUpload']['name']));

    if (isset($_FILES['profileImageUpload']))
    {
                
            if (move_uploaded_file($_FILES['profileImageUpload']['tmp_name'], $targetDirectory))
            {   
                    http_response_code(200);
                    echo "Upload successfully";
            }else{
                    http_response_code(400);
                    echo "Upload failed";
            }     
    }else{
        http_response_code(400);
        echo "No file uploaded";
    }
