<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - View Collection</title>
</head>
<body>
    <header>
        <h1>Search for a user's collection</h1>
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
        if(isset($_GET["rid"])){
            $user_id = $_GET["rid"];

            $user_query = "";
            $user_query .= "SELECT * ";
            $user_query .= "FROM user ";
            $user_query .= "WHERE user.user_id = '$user_id'; ";

            //echo $user_query;

            $result = mysqli_query($connection, $user_query);

            $game = mysqli_fetch_array($result);
        }
    ?>

    <section>
        <h2>Search for a User's Library</h2>
        <form action="view_collection_update.php" method="post" id="viewUserCollection">
            <label for="userName">Enter username:</label>
                <input type="text" id="userName" name="userName" value = "">
                
                <button type="submit" name = "searchUser" value = "searchUser">View Collection</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
