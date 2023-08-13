<!DOCTYPE html>
<html lang="en">

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

<body>
    <?php
    require 'header.php';
    if (isset($_SESSION['login'])) {
        header("Location: http://localhost/cric");
    }
    ?>
    <div class="container main-body login">
        <div class="row">

            <form action="" method="post">
                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname">

                    <label for="ename"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="ename">

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Register</button>
                </div>
                <div class="container">
                    <span class="psw" style="margin-bottom: 20px;">already a member yet <a href="login.php"> login here</a></span>
                </div>
            </form>

        </div>
    </div>

    <?php
    if (!empty($_POST)) {
        $username2 = $_POST['uname'];
        $gmail = $_POST['ename'];
        $password2 = md5($_POST['psw']);

        $sql = "SELECT * FROM login WHERE username='$username2' OR gmail='$gmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql2 = "INSERT INTO login (username,password,gmail,level) VALUES('$username2','$password2','$gmail','2')";
            $result = $conn->query($sql2);
            $_SESSION['login'] = true;
            $_SESSION['gmail'] = $gmail;
            $_SESSION['level'] = 2;
            $_SESSION['password'] = $password;
            header("Location: http://localhost/cric");
        } else {
    ?><p class="text-white">User Already Registerted</p>
    <?php }
    } ?>

</body>

</html>