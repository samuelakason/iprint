<?php

include "config.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM  projects WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['file_name'];

    if(file_exists($filepath))
    {
        header('Content-type: application/octet-stream');

        header('Content-Description: File Transfer');

        header('Content-Disposition: attachment; filename=' .basename($filepath));

        header('Expires: 0');

        header('Cache-Control: must-revalidate');
        header('Pragma:public');

        header('Content-Length:' . filesize('uploads/' . $file['name']));

        readfile('uploads/' .$file['name']);

        mysqli_query($conn, $updateQuery);

        exit;
    }
}

?>