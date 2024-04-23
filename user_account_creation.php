<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Recipe Book - Create a Recipe</title>
</head>
<body>
    <header>
        <h1>Create a user</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_account.php">Create a User</a></li>
            <li><a href="search_recipe.php">Search a Recipe</a></li>         
            <li><a href="ingredients_management.php">Ingredients Management</a></li>
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
        /*elseif(isset($_POST["submit_recipe"]) && $_POST["submit_recipe"] == "submitRecipe"){
            $ingredient_id = $_POST["recipeIngredient"];
            $recipe_ingredient_value = $_POST["recipeIngredientValue"];
            $unit_id = $_POST["unitID"];

            session_start();
            $recipe_name = $_SESSION["recipe_name"];

            $query = "SET @recipe_id = (SELECT recipe_id FROM recipe WHERE recipe_name = '$recipe_name'); ";
            $query .= "INSERT INTO recipe_ingredient ";
            $query .= "(recipe_id, ingredient_id, recipe_ingredient_value, unit_id) ";
            $query .= "VALUES ";
            $query .= "(@recipe_id, '$ingredient_id', '$recipe_ingredient_value', '$unit_id'); ";
            
            $_SESSION["insert_recipe_query"] .= $query; 

            $final_query = $_SESSION["insert_recipe_query"];
            
            $result = mysqli_multi_query($connection, $final_query);

            if($result){
                $_SESSION["insert_recipe_query"] = "";
                $_SESSION["recipe_name"] = "";

                echo "<section><h1>Bonne Appetite</h1></section>";
            }
        }*/

        $result = mysqli_multi_query($connection, $query);

        if($result){
            $_SESSION["insert_user_query"] = "";
            $_SESSION["user_name"] = "";

            echo "<section><h1>Welcome!</h1></section>";
        }

    ?>

    <footer>
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>