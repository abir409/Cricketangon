        <?php
        require 'header.php';

        if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
            header("Location: http://localhost/cric/");
        }

        $id2 = $_GET['id'];

        $sql = "DELETE FROM post WHERE id=$id2;";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/cric/allPosts.php");
        } else {
            header("Location: http://localhost/cric/");
        }
        