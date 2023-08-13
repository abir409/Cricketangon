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

    <?php
    if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
        header("Location: http://localhost/cric/");
    }
    ?>

    <div class="container">
        <div class="row">
            <?php
            $postid = $_GET["id"];
            $sql = "SELECT * FROM recent_matches WHERE id = $postid";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-10" style="background: #e7f4ff; padding: 40px; border-radius: 20px; margin:auto; margin-bottom: 80px;">
                        <form action="editRecentMatchHandle.php" method="POST">
                            <label for="team1"><b>Team 1</b></label>
                            <input type="text" id="team1" name="team1" value="<?php echo $row['team1'] ?>">

                            <label for="team2"><b>Team 2</b></label>
                            <input type="text" id="team2" name="team2" value="<?php echo $row['team2'] ?>">

                            <select name="type">
                                <option value="1">Test</option>
                                <option value="2">One Day</option>
                                <option value="3">T-20</option>
                            </select>

                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                            <button type="submit">Update</button>
                        </form>
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