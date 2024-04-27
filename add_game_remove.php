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
            <li><a href="add_game.php">Add a Game to Library</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
            <li><a href = "edit_user.php">Edit Profile</a></li>
        </ul>
    </nav>

    <?php
        if(isset($_GET["rid"])){
            try{
            $game_id = $_GET["rid"];

            $game_query = "";
            $game_query .= "SELECT * ";
            $game_query .= "FROM game ";
            $game_query .= "WHERE game.game_id = '$game_id'; ";

            $result = mysqli_query($connection, $game_query);

            if(!$result){
                throw new Exception("Error occured while fetching game data.");
            }


            $game = mysqli_fetch_array($result);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    ?>

    <section>
        <?php if(isset($game)) { ?>
            <h2>Remove a Game</h2>
            <form action="add_game_remove_update.php?rid=<?php echo $game["game_id"]; ?>" method="post" id="addGameToLibraryForm">
                <label for="userName">Enter username:</label>
                    <input type="text" id="userName" name="userName" value = "">
                    
                    <button type="submit">Delete from Library</button>
            </form>
        <?php } else {
            echo "<p>No Game Found</p>";
        } ?>
    </section>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
