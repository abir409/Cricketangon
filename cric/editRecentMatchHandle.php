    <?php
    require 'header.php';
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $team1 = $_POST['team1'];
        $team2 = $_POST['team2'];
        $type = $_POST['type'];

        $sql = "UPDATE recent_matches SET team1 = '$team1', team2 = '$team2', type = '$type' WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/cric/recentMatches.php");
        } else {
            header("Location: http://localhost/cric/");
        }
    }
    
    else
    header("Location: http://localhost/cric/");
    ?>