<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricketangon";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
?>

<div class="container" id="header-section">
    <div class="navigation-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand nav-icon" href="index.php">Cricketangon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="allPosts.php">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="recentMatches.php">Recent Matches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="team.php">Our Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact.php">Contact Us</a>
                        </li>
                        <?php
                        if (isset($_SESSION['login'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="profile.php">Profile</a>
                            </li>
                        <?php } ?>
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION["level"] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="addPost.php">Add Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="addRecentMatch.php">Add Recent Match</a>
                            </li>
                        <?php } ?>
                        <?php
                        if (!isset($_SESSION['login'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="register.php">Register</a>
                            </li>
                        <?php } ?>
                    </ul>

                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>