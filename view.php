<?php 

include 'download.php';

include "config.php";

$sql = "SELECT * FROM projects";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Submitted Projects</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Submitted Projects</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Email</th>

        <th>Phone Number</th>

        <th>Busines Description</th>

        <th>Uploaded Project</th>

        <th>Download</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['name']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['number']; ?></td>

                    <td><?php echo $row['description']; ?></td>

                    <td><?php echo $row['file_name']; ?></td>

                    <td>
                        <a class="btn btn-info" href="download.php?id=<?php echo $row['id']; ?>">Download</a>
                    </td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>