<?php 

include "config.php";


  // if (isset($_POST['submit'])) {

  //   $name = $_POST['name'];

  //   $email = $_POST['email'];

  //   $number = $_POST['number'];

  //   $description = $_POST['description'];

  //   $image = $_FILES['file']['name'];

  //   //the directory to upload to
  //   $targetDir = "uploads/";

  //   //the file being upload
  //   $targetFile = $targetDir.basename($_FILES['file']['name']);

  //   //select the file type - file extension
  //   $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

  //   //valid file extensions we will allow
  //   $extensions_arr= array("jpg","jpeg","png");
    
  //   //checking the extension of our uploaded file
  //   if(in_array($fileType,$extensions_arr)){

  //   $sql = "INSERT INTO projects (name, email, number, description, file_name, upload_time) VALUES ('$name', '$email', '$number', '$description', '$image', NOW())";

  //   // Upload file
  //   move_uploaded_file($_FILES['file']['tmp_name'],$targetDir.$name);

  // }

  //   $result = $conn->query($sql);

  //   if ($result == TRUE) {

  //     echo "Project Uploaded Sucessfully.";

  //   }else{

  //     echo "Error:". $sql . "<br>". $bd->error;

  //   } 

  //   $conn->close(); 

  // }

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
  <title>Upload Project</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">

  <h2>Upload Project</h2>

  <fieldset>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="John Doe" maxlength = "20" required>

    <label for="mail">Email:</label>
    <input type="email" id="email" name="email" placeholder="example@mail.com" maxlength = "20" required>

    <label for="password">Phone Number:</label>
    <input type="tel" id="number" name="number" placeholder="08000000000" maxlength = "11" required>

    <label for="bio">Business Description:</label>
    <textarea id="description" name="description" placeholder="Tell Us A Little About Your Company..." maxlength = "200" required></textarea>

    <label for="bio">Upload File To Be Printed:</label>
    <input type="file" name="file" required>
    <!-- <input type="submit" name="submit" value="Upload"> -->

  </fieldset>

  <button type="submit" value="submit" name="submit">Submit Project</button>

</form>

</body>
</html>