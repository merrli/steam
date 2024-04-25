<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - Add/Delete a Game to Library</title>
</head>
<body>
    <header>
        <h1>Add/Delete a Game to Library</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href = "game_dev_account.php">Create a Dev</a></li>
            <li><a href = "game_setup.php">Create a Game</a></li>
            <li><a href="add_game.php">Add a Game</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
        </ul>
    </nav>

    <section>
        <form action = "add_game_create.php" method = "post" id = "addNewGame">
            <h2>Add a game to your collection</h2>

            <label for="gameName">Enter the game  name:</label>
            <input type="text" id="gameName" name="gameName">
            <?php
                $queryGenre = "SELECT genre_id, genre_name FROM genre";
                $result = mysqli_query($connection, $queryGenre);

                $queryRating = "SELECT age_rating_id, age_rating_name FROM age_rating";
                $result2 = mysqli_query($connection, $queryRating);
            ?>

            <label for="gameGenre">Genre:</label>
            <select id="gameGenre" name="gameGenre">
                <option value="--">-- Select a Genre --</option>
                <?php while($result_set = mysqli_fetch_array($result)){ ?>
                <option value="<?php echo $result_set["genre_id"] ?>"><?php echo $result_set["genre_name"] ?></option>
                <?php } ?>
            </select>

            <label for="gameRating">Age Rating:</label>
            <select id="gameRating" name="gameRating">
                <option value="--">-- Select a Rating --</option>
                <?php while($result_set = mysqli_fetch_array($result2)){ ?>
                <option value="<?php echo $result_set["age_rating_id"] ?>"><?php echo $result_set["age_rating_name"] ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="search_game" value="searchGame">Search Game</button>  
        </section>
                  

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
