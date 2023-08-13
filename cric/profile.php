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
    if (!isset($_SESSION['login'])) {
        header("Location: http://localhost/cric");
    }
    ?>
    <div class="container main-body login">
        <div class="row">
            <h2>Update Profile</h2>
            <?php
            $gmail = $_SESSION['gmail'];
            $password = $_SESSION['password'];
            $sql = "SELECT * FROM login WHERE gmail = '$gmail' AND password='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <div class="container">
                            <label for="uname"><b>Username</b></label>
                            <input type="text" name="uname" value="<?php echo $row['username'] ?>">

                            <label for="ename"><b>Email</b></label>
                            <input type="email" name="ename" value="<?php echo $row['gmail'] ?>">

                            <label for="password"><b>Password</b></label>
                            <input type="password" name="pwd">

                            <input type="hidden" name="id" value="<?php echo $row['login'] ?>">

                            <button type="submit">Update</button>
                        </div>
                    </form>
            <?php }
            } ?>
        </div>
    </div>

    <?php
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $username2 = $_POST['uname'];
        $gmail = $_POST['ename'];
        $password2 = md5($_POST['pwd']);

        $sql = "UPDATE login SET username = '$username2', gmail= '$gmail', password='$password2' WHERE login = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['login'] = true;
            $_SESSION['gmail'] = $gmail;
            $_SESSION['password'] = $password2;
            header("Location: http://localhost/cric");
        } else { ?>
            <p class="text-white">Cannnot Update Profile</p>
    <?php }
    } ?>

</body>

</html>