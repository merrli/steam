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
            <li><a href = "game_setup.php">Create a Game</a></li>
            <li><a href="add_game.php">Add a Game to Library</a></li> 
            <li><a href = "view_collection.php">View Collection</a></li>
            <li><a href = "edit_user.php">Edit Profile</a></li>    

        </ul>
    </nav>

    
    <?php
        if(isset($_GET["rid"])){
            $user_id = $_GET["rid"];

            $display_name = $_POST["displayName"];
            $first_name = $_POST["firstName"];
            $last_name = $_POST["lastName"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $country = $_POST["userCountry"];
            
            $query = "";
            $query .= "UPDATE user SET ";
            $query .= "user_displayname = '$display_name', ";
            $query .= "user_first_name = '$first_name', ";
            $query .= "user_last_name = '$last_name', ";
            $query .= "user_email = '$email', ";
            $query .= "user_shipping_address = '$address', ";
            $query .= "user_country = '$country' ";
            $query .= "WHERE user_id = '$user_id    '; ";

            $result= mysqli_query($connection, $query);

            if($result) echo "<section>Your changes has been saved!</section>";
        }
    ?>
    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
