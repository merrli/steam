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
    <?php if(isset($_GET["rid"])){
        try{
            $game_id = $_GET["rid"];
            $user_name = $_POST["userName"];
            
            $game_query = "";
            $game_query .= "SELECT * ";
            $game_query .= "FROM game ";
            $game_query .= "WHERE game_id = $game_id ";

            $result = mysqli_query($connection, $game_query);

            if(!$result){
                throw new Exception("Error occured while fetching game information.");
            }

            $game = mysqli_fetch_array($result);

            $result = "";
            $user_query = "";
            $user_query .= "SELECT * ";
            $user_query .= "FROM user ";
            $user_query .= "WHERE user_username = '$user_name' ";

            $result = mysqli_query($connection, $user_query);

            if(!$result){
                throw new Exception("Error occured while fetching user information.");
            }

            $user = mysqli_fetch_array($result);

            $game_name = $game["game_title"];
            $user_id = $user["user_id"];
            
            $delete_query = "";
            $delete_query .= "DELETE FROM library where game_id = '$game_id' AND user_id = '$user_id'; ";
            
            $result = mysqli_multi_query($connection, $delete_query);

            if($result){ 
                echo "<section><h2>Game Deleted!</h2></section>";
            }
            else{ 
                throw new Exception("Error occured while deleting game from library.");
            }
        } catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
