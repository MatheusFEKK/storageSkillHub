<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./receiveFile.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadFile">
        <button type="submit" name="sendFile">Enviar</button>
    </form>
</body>
</html>