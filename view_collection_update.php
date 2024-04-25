<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - View Collection</title>
</head>
<body>
    <?php
        if(isset($_POST["userName"]) && $_POST["searchUser"] == "searchUser" ){
           $user_username = $_POST["userName"];

           $query = "";
           $query .= "SELECT * ";
           $query .= "FROM user ";
           $query .= "WHERE user_username LIKE '$user_username'; ";

           $result = mysqli_query($connection, $query);
           $user = mysqli_fetch_array($result);
           $userid = $user["user_id"];

           $query = "";
           $query .= "SELECT DISTINCT * ";
           $query .= "FROM game ";
           $query .= "INNER JOIN genre ON game.genre_id = genre.genre_id ";
           $query .= "INNER JOIN age_rating on game.age_rating_id = age_rating.age_rating_id ";
           $query .= "INNER JOIN gamedev on game.gamedev_id = gamedev.gamedev_id ";
           $query .= "INNER JOIN library on game.game_id = library.game_id ";
           $query .= "WHERE game.game_id = library.game_id AND library.user_id = '$userid';";
           
           $result = mysqli_query($connection, $query);
        }
    ?>
    <header>
        <h1>Viewing <?php echo $user["user_displayname"]?>'s collection</h1>
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
    
    <section>
        <table>
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Game Genre</th>
                    <th>Age Rating</th>
                    <th>Studio</th>
                </tr>
            </thead>
            <tbody>
            <?php while($result_set = mysqli_fetch_array($result)) { ?>
                
                <tr>
                    <td><?php echo $result_set["game_title"]; ?></td>
                    <td><?php echo $result_set["genre_name"]; ?></td>
                    <td><?php echo $result_set["age_rating_name"]; ?></td>
                    <td><?php echo $result_set["gamedev_name"]; ?></td>
    
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