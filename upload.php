<?php

// Include the database configuration file
include 'config.php';
$statusMsg = '';
$backlink = ' <a href="./">Go back</a>';


// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($fileName,PATHINFO_EXTENSION);



if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $email = $_POST['email'];

    $number = $_POST['number'];

    $description = $_POST['description'];

    $image = $_FILES['file']['name'];

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){


        //rename image file
        $randomNum = rand(0,100000);
        $rename = 'opf_' .date('dmYmd').$randomNum;
        $newname=$rename. '.' .$fileType;

        $fileName = $_FILES["file"]["tmp_name"];

        //$newname = 'opf_' . md5(rand()) . date('dmYmd') . '.' .$fileType; //rename image file

                // Upload file to server
            if(move_uploaded_file($fileName, 'uploads/'.$newname)){


                // Insert image file name into database
                $insert = $conn->query("INSERT into projects (name, email, number, description, file_name, upload_time) VALUES ('$name', '$email', '$number', '$description','".$newname."', NOW())");
                if($insert){
                    $statusMsg = "The file <b>".$newname. "</b> has been uploaded successfully." . $backlink;
                }else{
                    $statusMsg = "File upload failed, please try again." . $backlink;
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload." . $backlink;
        }
    }else{
            $statusMsg = "The file <b>".$newName. "</b> is already exist." . $backlink;
        }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}


// Display status message
echo $statusMsg;
?>