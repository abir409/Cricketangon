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
    ?>
    <div class="container main-body posts">
        <div class="row">
            <form action="" method="POST" style="width: 400px;">
                <input type="text" placeholder="Search..." name="keyword"/>
                <button type="submit">=></button>
            </form>
            <div class="grid-container">
                <?php
                if (!empty($_POST)) {
                    $keyword = $_POST["keyword"];
                    $sql = "SELECT * FROM post WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
                } else
                    $sql = "SELECT * FROM post";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="grid-item">

                            <h3><?php echo $row["title"] ?></h3>
                            <p><?php $text = $row['description'];
                                if (strlen($text) > 200) {
                                    $text = substr($text, 0, 200);
                                    echo $text;
                                } else {
                                    echo $text;
                                } ?></p>
                            <form action="postDetails.php" method="GET">
                                <input type="hidden" name="postId" value="<?php echo $row["id"] ?>" />
                                <input type="submit" value="Show More" />
                            </form>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <?php
    require 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</body>

</html>