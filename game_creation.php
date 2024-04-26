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
            $game_title = $_POST["gameTitle"];
            $pub_date = $_POST["pubDate"];
            $genre = $_POST["gameGenre"];
            $age_rating = $_POST["ageRating"];
            $game_cost = $_POST["gameCost"];
            $game_dev = $_POST["gameDev"];

            $query = " ";
            $query .= "INSERT INTO game ";
            $query .= "(game_title, pub_date, genre_id, age_rating_id, game_cost, gamedev_id) ";
            $query .= "VALUES ";
            $query .= "('$game_title', '$pub_date','$genre', '$age_rating', '$game_cost', '$game_dev'); ";

        session_start();
        $_SESSION["insert_game_query"] = $query;
        $_SESSION["gameTitle"] = $game_dev;
        }
        $result = mysqli_multi_query($connection, $query);

        if($result){
            $_SESSION["insert_game_query"] = "";
            $_SESSION["gameTitle"] = "";

            echo "<section><h1>Game has been Added to Steam!</h1></section>";
        }

    ?>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>