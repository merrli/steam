<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - Create a dev</title>
</head>
<body>
    <header>
        <h1>Create a dev</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href = "game_dev_account.php">Create a Dev</a></li>
            <li><a href = "game_setup.php">Create a Game</a></li>
            <li><a href="add_game.php">Add a Game to Library</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
        </ul>
    </nav>
    <?php

        //this will handle the preparation of the first recipe information
        if(isset($_POST["next"]) && $_POST["next"] == "next"){
            $game_dev = $_POST["studioName"];
            $studio_country = $_POST["country"];

            $query = " ";
            $query .= "INSERT INTO gamedev ";
            $query .= "(gamedev_name, gamedev_creation_date, gamedev_country) ";
            $query .= "VALUES ";
            $query .= "('$game_dev', NOW(),'$studio_country'); ";

        session_start();
        $_SESSION["insert_dev_query"] = $query;
        $_SESSION["studioName"] = $game_dev;
        }
        $result = mysqli_multi_query($connection, $query);

        if($result){
            $_SESSION["insert_user_query"] = "";
            $_SESSION["studioName"] = "";

            echo "<section><h1>Welcome!</h1></section>";
        }

    ?>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>