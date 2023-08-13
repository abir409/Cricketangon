    <?php
    require 'header.php';
    if (!empty($_POST)) {
        $title2 = $_POST['title'];
        $description2 = $_POST['description'];

        $sql = "INSERT INTO post (title,description) VALUES ('$title2','$description2')";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/cric/allPosts.php");
        } else {
            header("Location: http://localhost/cric/");
        }
    } else
        header("Location: http://localhost/cric/");
    ?>

    