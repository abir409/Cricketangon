<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricketangon</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'header.php';
    ?>



    <section class="container live-score">
    <div class="column_news" style="background-color:#aaa;">
                          
                          <img src="image/bd.jpg" alt="Paris" width="100%" height="856px">
                                                 
                     </div>
    </section>

    <section class="container live-score">

        <iframe src="https://bwidget.crictimes.org/" style="width:100%;min-height: 250px;" frameborder="0" scrolling="yes"></iframe>
    </section>

    <div class="container main-body posts">
        <div class="row">
            <h2>Post</h2>

            <div class="grid-container">
                <?php
                $sql = "SELECT * FROM post limit 6";
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
                <?php
                    }
                }
                ?>
                <button type="button" class="btn btn-info" style="width: 300px;"><a href="allPosts.php" style="color: #ffffff;">View all posts</a></button>
            </div>

            <div class="container main-body posts">
                <div class="row">

                    <h2>Recent Matches</h2>
                    <?php
                    $sql = "SELECT * FROM recent_matches limit 6";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-md-12" style="text-align:center;padding: 20px;">
                                <div class="column_news" style="background-color:#aaa; padding: 20px;">
                                    <h3><?php echo $row["team1"] ?> VS <?php echo $row["team2"] ?></h3>
                                    <button type="button" class="btn btn-success" style="width: 200px;"><a href="recentMatches.php" style="color: #ffffff;">View all recent matches</a></button>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                    <button type="button" class="btn btn-info" style="width: 300px;"><a href="recentMatches.php" style="color: #ffffff;">View all recent matches</a></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    require 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>