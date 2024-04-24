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
            $user_name = $_POST["userName"];
            $game_query = "";
            $game_query .= "SELECT * ";
            $game_query .= "FROM game ";
            $game_query .= "WHERE game_id = $game_id ";

            $result = mysqli_query($connection, $game_query);
            $game = mysqli_fetch_array($result);

            $result = "";
            $user_query = "";
            $user_query .= "SELECT * ";
            $user_query .= "FROM user ";
            $user_query .= "WHERE user_username = '$user_name' ";

            $result = mysqli_query($connection, $user_query);
            $user = mysqli_fetch_array($result);
            //echo $user_query;
            $game_name = $game["game_title"];
            $user_id = $user["user_id"];

            $result = "";
            $query = "";
            $query .= "INSERT INTO library ";
            $query .= "(game_id, user_id) ";
            $query .= "VALUES ('$game_id', '$user_id')";

            $result= mysqli_multi_query($connection, $query);

            if($result) echo "<section>Your $game_name has been added to your library!</section>";
        }
    ?>

    
    <footer>
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>
