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
            <div class="col-md-12">
                Choose Type
                <form action="">
                    <select name="type">
                        <option value="0" selected>All</option>
                        <option value="1">Test</option>
                        <option value="2">One Day</option>
                        <option value="3">T-20</option>
                    </select>
                    <div class="col-md-1" style="margin:10px 0px;">
                        <button type="submit">=></button>
                    </div>
                </form>
            </div>
            <div class="grid-container">
                <?php
                if (!empty($_GET)) {
                    $type = $_GET["type"];
                    if ($type == 0)
                        $sql = "SELECT * FROM recent_matches";
                    else
                        $sql = "SELECT * FROM recent_matches WHERE type=$type";
                } else
                    $sql = "SELECT * FROM recent_matches";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="grid-item">
                            <h1><?php echo $row["team1"] ?> VS <?php echo $row["team2"] ?></h1>
                            <h2>Type :
                                <?php
                                if ($row["type"] == 1)
                                    echo "Test";
                                elseif ($row["type"] == 2)
                                    echo "One Day";
                                else
                                    echo "T-20";
                                ?>
                            </h2>
                            <p><?php
                                if (isset($_SESSION['level']) && $_SESSION['level'] == 1) {
                                ?>
                                    <span><a href="editRecentMatch.php?id=<?php echo $row["id"] ?>">Edit Recent Match</a></span> ||
                                    <span><a onclick="return confirm('Are you sure to delete!');" href="deleteRecentMatch.php?id=<?php echo $row["id"] ?>">Delete Recent Match</a></span>
                                <?php
                                }
                                ?>
                            </p>
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