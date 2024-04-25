<?php require_once("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Steam - User Account</title>
</head>
<body>
    <header>
        <h1>Create a Dev</h1>
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
        <form action="game_dev_creation.php" method="post" id="createNewDev">
                <h2>Create a dev</h2>
                <label for="studioName">Enter your Studio Name:</label>
                <input type="text" id="studioName" name="studioName" required>

                <label for="country">Enter your country:</label>
                <input type="text" id="country" name="country" required>

                <button type="submit" name="next" value="next">Next</button>
        </form>
    </section> 
    
    
    
    <footer>
        <p>&copy; 2024 NotSteam by Vincent Tran and Sean Bolles</p>
    </footer>
</body>
</html>

<?php/*
    <section>    
        <form action="#" method="post" id="createRecipeFormPrimaryInfo">
                <h2>Recipe Ingredients</h2>
                <label for="recipeIngredient">Ingredient:</label>
                <select id="recipeIngredient" name="recipeIngredient" required>
                    <option value="--">-- Select Ingredient --</option>

                    <?php
                        $queryIng = "SELECT ingredient_id, ingredient_name FROM ingredient";
                        $result = mysqli_query($connection, $queryIng); 
                    ?>
                    <?php while($result_set = mysqli_fetch_array($result)){ ?>
                    <option value="<?php echo $result_set["ingredient_id"]; ?>"><?php echo $result_set["ingredient_name"]; ?></option>
                    <?php } ?>
                    
                </select>
    
                <label for="recipeIngredientValue">Quantity:</label>
                <input type="number" id="recipeIngredientValue" name="recipeIngredientValue" required>
                <?php
                        $queryUnit = "SELECT unit_id, unit_name FROM unit";
                        $result = mysqli_query($connection, $queryUnit); 
                    ?>
                <label for="ingredientUnitSelect">Select Unit:</label>
                <select id="ingredientUnitSelect" name="unitID">
                    <option value="--"> -- Choose a Unit -- </option>
                    <?php while($result_set = mysqli_fetch_array($result)){ ?>
                    <option value="<?php echo $result_set["unit_id"]; ?>"><?php echo $result_set["unit_name"]; ?></option>
                    <?php } ?>
                </select>
    
                <label for="comments">Additional Comments:</label>
                <textarea id="comments" name="comments" rows="4"></textarea>
                <button type="submit" name="add_more_ingredients" value="addMore">Add more Ingredient</button>
                <button type="submit" name="submit_recipe" value="submitRecipe">Finish Recipe</button>
        </form>
    </section>
*/?>

