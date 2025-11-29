<!DOCTYPE html>
<html lang="se">
<head>
    <?php include("includes/config.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sitename . $divider . $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <!-- Nav-button small screens -->
        <input type="checkbox" id="navBtnInput" name="navBtn">
        <label for="navBtnInput" id="navBtn">
            <span class="bar1"></span>
            <span class="bar2"></span>
            <span class="bar3"></span>
        </label>
        <!-- Nav options -->
        <ul>
            <li><a href="index.php">Startsida</a></li>
            <li><a href="bucketlist.php">Bucketlist</a></li>
            <li><a href="ai.php">Ai</a></li>
        </ul>
    </nav>
    <main>