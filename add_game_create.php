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
        if(isset($_POST["search_game"]) && $_POST["search_game"] == "searchGame" ){
           $game_title = strtolower($_POST["gameName"]);
           $genre_id = $_POST["gameGenre"];
           $rating_id = $_POST["gameRating"];
           if($genre_id == "--"){$genre_id = "";} 

           if($rating_id == "--") $rating_id = "";

           try{
                $query = "";
                $query .= "SELECT DISTINCT * ";
                $query .= "FROM game ";
                $query .= "INNER JOIN genre ON game.genre_id = genre.genre_id ";
                $query .= "INNER JOIN age_rating on game.age_rating_id = age_rating.age_rating_id ";
                $query .= "INNER JOIN gamedev on game.gamedev_id = gamedev.gamedev_id ";

                $result = mysqli_query($connection, $query);
                if(!$result){
                    throw new Exception("Query failed: " . mysqli_error($connection));
                }
            } catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
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

            <?php while($result_set = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $result_set["game_title"]; ?></td>
                    <td><?php echo $result_set["genre_name"]; ?></td>
                    <td><?php echo $result_set["age_rating_name"]; ?></td>
                    <td><?php echo $result_set["gamedev_name"]; ?></td>
                    <td><?php if ($result_set["game_cost"] > 0 )echo $result_set["game_cost"]; 
                        else echo "Free"
                    ?></td>
                    
                    <td><a id="editLink" href="add_game_to_library.php?rid=<?php echo $result_set["game_id"]; ?>">Add</a></td>
                    <td><a id="deleteLink" href="add_game_remove.php?rid=<?php echo $result_set["game_id"]; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>