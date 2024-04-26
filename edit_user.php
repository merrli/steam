<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" href="styles/styles.css">
    <title>Steam - Home Page</title>
</head>
<body>
    <header>
        <h1>Steam Bootleg</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href = "game_dev_account.php">Create a Dev</a></li>
            <li><a href="add_game.php">Add a Game</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
            <li><a href = "edit_user.php">Edit Profile</a></li>    

        </ul>
    </nav>

    <section>
        <form action = "edit_user_update.php" method = "post" id = "editUser">
            <h2>Find your profile</h2>
            <label for="userName">Enter your username:</label>
            <input type="text" id="userName" name="userName">
        <button type="submit" name="searchUser" value="searchUser">Edit user</button>  
    </section>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
