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

    <div class="container">
        <div class="row">
            <?php
            $postid = $_GET["postId"];
            $sql = "SELECT * FROM post WHERE id = $postid";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-10" style="background: #e7f4ff; padding: 40px; border-radius: 20px; margin:auto; margin-bottom: 80px;">
                        <h1><?php echo $row["title"] ?></h1>
                        <h5><?php echo $row["description"] ?></h5>
                        <?php
                        if (isset($_SESSION['level']) && $_SESSION['level'] == 1) {
                        ?>
                            <span><a href="editPost.php?id=<?php echo $row["id"] ?>">Edit Post</a></span> ||
                            <span><a onclick="return confirm('Are you sure to delete!');" href="deletePost.php?id=<?php echo $row["id"] ?>">Delete Post</a></span>
                        <?php
                        }
                        ?>
                    </div>
            <?php }
            } ?>
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