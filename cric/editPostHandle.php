    <?php
    require 'header.php';
    if (!empty($_POST)) {
        $id2 = $_POST['id'];
        $title2 = $_POST['title'];
        $description2 = $_POST['description'];

        $sql = "UPDATE post SET title = '$title2', description= '$description2' WHERE id = '$id2'";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/cric/allPosts.php");
        } else {
            header("Location: http://localhost/cric/");
        }
    }
    else 
    header("Location: http://localhost/cric/");
    ?>