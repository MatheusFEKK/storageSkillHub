<?php
    $directory = '../imageFiles/';
    $targetDirectory = $directory . basename(($_FILES['uploadFile']['name']));
    
    if (isset($_FILES['uploadFile']))
    {
                
            if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $targetDirectory))
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