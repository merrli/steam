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
            $query_check = "";
            $query_check .= "SELECT * ";
            $query_check .= "FROM library ";
            $query_check .= "WHERE library.user_id = '$user_id' AND library.game_id = '$game_id'; ";
            
            $result = mysqli_query($connection, $query_check);
            
            if(mysqli_num_rows($result) > 0){
                echo "<section>$game_name is already in your library!</section>";
            }else{            
                $query = "";
                $query .= "INSERT INTO library ";
                $query .= "(game_id, user_id) ";
                $query .= "VALUES ('$game_id', '$user_id')";

                $add_result= mysqli_multi_query($connection, $query);

                $query = "";
                $query .= "INSERT INTO transaction ";
                $query .= "(transaction_date, trasaction_tax, payment_id, game_id, user_id) ";
                $query .= "VALUES (NOW(), '1', '1', '$game_id', '$user_id')";

                $add_transaction= mysqli_multi_query($connection, $query);
                
                if($add_result) echo "<section>$game_name has been added to your library!</section>";
                if($add_transaction) echo "<section>A transaction has been filed</section>";
            } 

        }
    ?>

    
    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
