<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Steam - User Account</title>
</head>
<body>
    <header>
        <h1>Create a User</h1>
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
        <form action="user_account_creation.php" method="post" id="createNewUser">
                <h2>Create a user</h2>
                <label for="userName">Enter a username:</label>
                <input type="text" id="userName" name="userName" required>

                <label for="displayName">Enter a display name:</label>
                <input type = "text" id = "displayName" name = "displayName" required>

                <label for="firstName">Enter your first name:</label>
                <input type = "text" id = "firstName" name = "firstName" required>

                <label for="lastName">Enter your last name:</label>
                <input type = "text" id = "lastName" name = "lastName" required>

                <label for="email">Enter your email:</label>
                <input type = "text" id = "email" name = "email" required>

                <label for="shippingAddress">Enter your address:</label>
                <input type = "text" id = "shippingAddress" name = "shippingAddress" required>

                <button type="submit" name="next" value="next">Next</button>
        </form>
    </section> 
    
    
    
    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
