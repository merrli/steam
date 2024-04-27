<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - Create a Dev</title>
</head>
<body>
    <header>
        <h1>Create a Dev</h1>
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
        <form action="game_dev_creation.php" method="post" id="createNewDev">
                <h2>Create a dev</h2>
                <label for="studioName">Enter your Studio Name:</label>
                <input type="text" id="studioName" name="studioName" required>

                <label for="country">Enter your country:</label>
                <input type="text" id="country" name="country" required>

                <button type="submit" name="next" value="next">Next</button>
        </form>
    </section> 

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>


