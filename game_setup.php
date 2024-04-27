<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - Create a Game</title>
</head>
<body>
    <header>
        <h1>Create a Game</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href = "game_dev_account.php">Create a Dev</a></li>
            <li><a href = "game_setup.php">Create a Game</a></li>
            <li><a href="add_game.php">Add a Game to Library</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
            <li><a href = "edit_user.php">Edit Profile</a></li>
        </ul>
    </nav>
    <section>
        <form action="game_creation.php" method="post" id="createNewGame">
                <h2>Create a Game</h2>
                <label for="gameTitle">Enter your Game's Title:</label>
                <input type="text" id="gameTitle" name="gameTitle" required>

                <label for="pubDate">Enter the Publication Date: (year-month-day)</label>
                <input type="text" id="pubDate" name="pubDate" required>

                <?php
                    $queryGenre = "SELECT genre_id, genre_name FROM genre";
                    $result = mysqli_query($connection, $queryGenre);

                ?>
 
                <label for="gameGenre">Game Genre:</label>
                <select id="gameGenre" name="gameGenre" required>
                    <option value="--">-- Select a Genre --</option>

                    <?php while($result_set = mysqli_fetch_array($result)){ ?>
                    <option value="<?php echo $result_set["genre_id"] ?>"><?php echo $result_set["genre_name"] ?></option>
                    <?php } ?>

                </select>
                
                <?php
                    $queryAge = "SELECT age_rating_id, age_rating_name FROM age_rating";
                    $result = mysqli_query($connection, $queryAge);

                ?>
 
                <label for="ageRating">Age Rating:</label>
                <select id="ageRating" name="ageRating" required>
                    <option value="--">-- Select an Age Rating --</option>

                    <?php while($result_set = mysqli_fetch_array($result)){ ?>
                    <option value="<?php echo $result_set["age_rating_id"] ?>"><?php echo $result_set["age_rating_name"] ?></option>
                    <?php } ?>

                </select>

                <label for="gameCost">Enter your Game's Cost:</label>
                <input type="text" id="gameCost" name="gameCost" required>

                <?php
                    $queryAge = "SELECT gamedev_ID, gamedev_name FROM gamedev";
                    $result = mysqli_query($connection, $queryAge);

                ?>
 
                <label for="gameDev">Game Studio:</label>
                <select id="gameDDev" name="gameDev" required>
                    <option value="--">-- Select a Studio --</option>

                    <?php while($result_set = mysqli_fetch_array($result)){ ?>
                    <option value="<?php echo $result_set["gamedev_ID"] ?>"><?php echo $result_set["gamedev_name"] ?></option>
                    <?php } ?>

                </select>

                <button type="submit" name="next" value="next">Next</button>
        </form>
    </section> 

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>


