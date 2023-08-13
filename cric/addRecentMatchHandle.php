    <?php
    require 'header.php';
    if (!empty($_POST)) {
        $team1 = $_POST['team1'];
        $team2 = $_POST['team2'];
        $type = $_POST['type'];

        $sql = "INSERT INTO recent_matches (team1,team2,type) VALUES ('$team1','$team2','$type')";
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

    