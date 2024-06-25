<?php include_once "header.php";?>
<?php @session_start();
include_once "config.php";
$rec=new RecipeManager();
$data=$rec->getRecipeById($_GET['rid']); 
?> 

    <div class="recipe-container">
        <h2>Edit Recipe</h2>
        <form method="post" enctype="multipart/form-data" action="update.php">
        <div class="form-group">
                <label for="diet">Diet Type</label>
                <select  id="diet" name="diet">
                    <option value="">--Select--</option>
                    <?php if($data['diet']!=''):?>
                    <option value="<?php echo $data['diet'];?>" selected><?php echo $data['diet'];?></option>
                    <?php endif;?>
                    <option value="Weight Watchers">Weight Watchers</option>
                    <option value="Diary Free">Diary Free</option>
                    <option value="Gluten Free">Gluten Free</option>
                    <option value="High Protein">High Protein</option>
                    <option value="Vegetarian">Vegetarian</option>
                </select>    
        </div>
        <div class="form-group">
                <label for="cuisineType">Cuisine Type</label>
                <select  id="cuisineType" name="cuisineType">
                <option value="">--Select--</option>
                <?php if($data['cuisinetype']!=''):?>
                    <option value="<?php echo $data['cuisinetype'];?>" selected><?php echo $data['cuisinetype'];?></option>
                <?php endif;?>
                    
                <option value="Indian">Indian</option>
                    <option value="Chinese">Chinees</option>
                    <option value="Italian">Italian</option>
                    <option value="Japanese">Japnees</option>
                    <option value="Canadian">Canadian</option>
                </select>    
        </div> 
        
        <div class="form-group">
                <label for="recipe_name">Recipe Name</label>
                <input type="text" id="recipe_name" name="recipe_name" value="<?php echo $data['title'];?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" value="<?php echo $data['description'];?>"><?php echo $data['description'];?></textarea>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea id="ingredients" name="ingredients" value="<?php echo $data['ingred'];?>" required><?php echo $data['ingred'];?></textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea id="instructions" name="instructions" value="<?php echo $data['instructions'];?>"><?php echo $data['instructions'];?></textarea>
            </div>
            <div class="form-group">
                <label for="rimg">Recipe Image</label>
                <img src="recipe/<?php echo $data['img_url'];?>" height="100" width="100">
                <input type="hidden" value="<?php echo $data['img_url'];?>" name="oldimg">
                <input type="file" id="rimg" name="rimg"></input> 
            </div>
            <input type="hidden" value="<?php echo $data['recipe_id'];?>" name="recipe_id">
            <button type="submit" name="submit">Submit</button>
        </form>
        <p>
        <?php if(isset($_GET['msg'])){
            echo $_GET['msg'];
        }
            ?>

      
    
        </p>
    </div>
<?php include_once "footer.php";?>
