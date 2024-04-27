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
        try{
            if(isset($_POST["userName"]) && $_POST["searchUser"] == "searchUser"){
                $user_name = $_POST["userName"];

                $user_query = "";
                $user_query .= "SELECT * ";
                $user_query .= "FROM user ";
                $user_query .= "WHERE user.user_username = '$user_name'; ";

                $result = mysqli_query($connection, $user_query);

                if(!$result){
                    throw new Exception("Error occured while fetching user data.");
                }

                $user = mysqli_fetch_array($result);
    ?>

    <section>
        <form action="edit_user_result.php?rid=<?php echo $user["user_id"];?>" method="post" id="editUserProfile">
            <label for="displayName">Display Name:</label>
            <input type = "text" id="displayName" name="displayName" value="<?php echo $user["user_displayname"];?>" required>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $user["user_first_name"]; ?>" required>
        
            <label for="lastName">Last Name:</label>
            <input type = "text" id="lastName" name="lastName" value="<?php echo $user["user_last_name"];?>" required>

            <label for="email">eMail:</label>
            <input type = "text" id="email" name="email" value="<?php echo $user["user_email"];?>" required>

            <label for="address">Address:</label>
            <input type = "text" id="address" name="address" value="<?php echo $user["user_shipping_address"];?>" required>

            <label for="userCountry">Country:</label>
            <input type = "text" id="userCountry" name="userCountry" value="<?php echo $user["user_country"];?>" required>

            <button type="submit" href = "edit_user_result.php?rid=<?php echo $user["user_id"];?>">Save Changes</button>
        
    </section>

    <?php
            }
        } catch(Exception $e){
            echo "Error: ".$e->getMessage();
        }
    ?>

    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>
