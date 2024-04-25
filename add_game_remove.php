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
            <li><a href="add_game.php">Add a Game</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
        </ul>
    </nav>

    <?php
        if(isset($_GET["rid"])){
            $game_id = $_GET["rid"];

            $game_query = "";
            $game_query .= "SELECT * ";
            $game_query .= "FROM game ";
            $game_query .= "WHERE game.game_id = '$game_id'; ";

            //echo $game_query;

            $result = mysqli_query($connection, $game_query);

            $game = mysqli_fetch_array($result);
        }
    ?>

    <section>
        <h2>Edit a Recipe</h2>
        <form action="add_game_remove_update.php?rid=<?php echo $game["game_id"]; ?>" method="post" id="addGameToLibraryForm">
            <label for="userName">Enter username:</label>
                <input type="text" id="userName" name="userName" value = "">
                
                <button type="submit">Delete from Library</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
