<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Steam - Create a User</title>
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
            <li><a href="search_recipe.php">Search a Recipe</a></li>         
            <li><a href="ingredients_management.php">Ingredients Management</a></li>
        </ul>
    </nav>
    <?php

        //this will handle the preparation of the first recipe information
        if(isset($_POST["next"]) && $_POST["next"] == "next"){
            $studio_name = $_POST["studioName"];
            $studio_country = $_POST["country"];

            $query = " ";
            $query .= "INSERT INTO gamedev ";
            $query .= "(gamedev_name, gamedev_creation_date, gamedev_country) ";
            $query .= "VALUES ";
            $query .= "('$studio_name', NOW(),'$studio_country'); ";

        session_start();
        $_SESSION["insert_dev_query"] = $query;
        $_SESSION["studioName"] = $studio_name;
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
            $_SESSION["studioName"] = "";

            echo "<section><h1>Welcome!</h1></section>";
        }

    ?>

    <footer>
        <p>&copy; 2024 Recipe Book</p>
    </footer>
</body>
</html>