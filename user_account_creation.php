<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>NotSteam - Create a User</title>
</head>
<body>
    <header>
        <h1>Create a user</h1>
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
    <?php

        //this will handle the preparation of the first recipe information
        if(isset($_POST["next"]) && $_POST["next"] == "next"){
            $user_name = $_POST["userName"];
            $display_name = $_POST["displayName"];
            $first_name = $_POST["firstName"];
            $last_name = $_POST["lastName"];
            $email = $_POST["email"]; 
            $address = $_POST["shippingAddress"];

            $query = " ";
            $query .= "INSERT INTO user ";
            $query .= "(user_first_name, user_last_name, user_username, user_displayname, user_email, user_shipping_address) ";
            $query .= "VALUES ";
            $query .= "('$first_name', '$last_name', '$user_name', '$display_name', '$email', '$address'); ";
            

        session_start();
        $_SESSION["insert_user_query"] = $query;
        $_SESSION["user_name"] = $user_name;
        }
        $result = mysqli_multi_query($connection, $query);

        if($result){
            $_SESSION["insert_user_query"] = "";
            $_SESSION["user_name"] = "";

            echo "<section><h1>Welcome!</h1></section>" ;
        }

    ?>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>