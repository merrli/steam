<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="styles/styles.css">
    <title>Recipe Book - Search/Edit a Recipe</title>
</head>
<body>
    <header>
        <h1>Search/Edit a Recipe</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create Recipe</a></li>
            <li><a href="search_recipe.php">Search a Recipe</a></li>         
            <li><a href="ingredients_management.php">Ingredients Management</a></li>
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
        <form action="add_game_to_library_update.php?rid=<?php echo $game["game_id"]; ?>" method="post" id="addGameToLibraryForm">
            <label for="userName">Enter username:</label>
                <input type="text" id="userName" name="userName" value = "">
                
                <button type="submit">Add to Library</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>
