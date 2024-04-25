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
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>
