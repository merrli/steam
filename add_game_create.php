<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Steam - Create a User</title>
</head>
<body>
    <header>
        <h1>Create a user</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href = "game_dev_account.php">Create a Dev</a></li>
            <li><a href="add_game.php">Add a Game</a></li>     
        </ul>
    </nav>
    <?php
        if(isset($_POST["search_game"]) && $_POST["search_game"] == "searchGame" ){
           $game_title = strtolower($_POST["gameName"]);
           $genre_id = $_POST["gameGenre"];
           $rating_id = $_POST["gameRating"];
           if($genre_id == "--"){$genre_id = "";} 

           if($rating_id == "--") $rating_id = "";

           $query = "";
           $query .= "SELECT DISTINCT * ";
           $query .= "FROM game ";
           $query .= "INNER JOIN genre ON game.genre_id = genre.genre_id ";
           $query .= "INNER JOIN age_rating on game.age_rating_id = age_rating.age_rating_id ";
           $query .= "INNER JOIN gamedev on game.gamedev_id = gamedev.gamedev_id ";

           // echo $query;

           $result = mysqli_query($connection, $query);
           
        }
    ?>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Game Genre</th>
                    <th>Age Rating</th>
                    <th>Studio</th>
                    <th>Game Price</th>
                    <th>Add To Library</th>
                    <th>Delete From Library</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data, replace with actual records from your database -->

            <?php while($result_set = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $result_set["game_title"]; ?></td>
                    <td><?php echo $result_set["genre_name"]; ?></td>
                    <td><?php echo $result_set["age_rating_name"]; ?></td>
                    <td><?php echo $result_set["gamedev_name"]; ?></td>
                    <td><?php if ($result_set["game_cost"] > 0 )echo $result_set["game_cost"]; 
                        else echo "Free"
                    ?></td>
                    
                    <td><a id="editLink" href="search_recipe_edit.php?rid=<?php echo $result_set["game_id"]; ?>">Add to Library</a></td>
                    <td><a id="deleteLink" href="search_recipe_results_delete.php?rid=<?php echo $result_set["game_id"]; ?>">Delete from Library</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>