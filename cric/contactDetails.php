<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
include "header.php";
if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $sql = "INSERT INTO contact(name,email,subject,text) VALUES('$name','$email','$subject','$text')";
    $conn->query($sql);
    //header("Location: http://localhost/cric");
} else
    header("Location: http://localhost/cric");

?>
<!DOCTYPE html>
<html lang="en">



<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin:auto; text-align: center;">
                <h2>We have received your request. Please be patient, we will contact you shortly!</h2>
                <button type="button" class="btn btn-info" style="width: 300px;"><a href="http://localhost/cric" style="color: #ffffff;">Homepage</a></button>
            </div>
        </div>
    </div>
</body>


