<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" href="styles/styles.css">
    <title>Recipe Book - Ingredients Management</title>
</head>
<body>
    <header>
        <h1>Welcome to My Recipe Book Page</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href = "game_dev_account.php">Create a Dev</a></li>
            <li><a href="add_game.php">Add a Game</a></li> 
        </ul>
    </nav>

    <section>
        <form action = "add_game_create.php" method = "post" id = "addNewGame">
            <h2>Add a game to your collection</h2>

            <label for="gameName">Enter the game  name:</label>
            <input type="text" id="gameName" name="gameName">
            <?php
                $queryGame = "SELECT game_id, game_title FROM game";
                $result = mysqli_query($connection, $queryGame);
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
                <?php while($result_set = mysqli_fetch_array($result)){ ?>
                <option value="<?php echo $result_set["age_rating_id"] ?>"><?php echo $result_set["age_rating_name"] ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="search_game" value="searchGame">Search Game</button>  
        </section>
                  

    <footer>
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>
