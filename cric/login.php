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
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Gmail" name="gmail" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Login</button>
                </div>

                <div class="container">
                    <span class="psw" style="margin-bottom: 20px;">not a member yet <a href="register.php"> register here</a></span>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (!empty($_POST)) {
        $gmail2 = $_POST['gmail'];
        $password2 = md5($_POST['psw']);
        $sql = "SELECT * FROM login WHERE gmail='$gmail2' AND password='$password2'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                if (!isset($_SESSION['login'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['gmail'] = $gmail2;
                    $_SESSION['level'] = $row['level'];
                    $_SESSION['password'] = $password2;
                    header("Location: http://localhost/cric");
                }
            }
        } else {
    ?>
            <p class="text-white">User Haven't Registered Yet</p>
    <?php }
    } ?>
</body>

</html>