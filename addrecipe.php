<?php include_once "header.php";?>
<?php @session_start();
include_once "config.php";
$rec=new RecipeManager();
 
?> 
<!----form-valid---->

    <script type="text/javascript">

         function validate(f)
            {
            let dit=f.diet;
            let ct=f.cuisineType;
            let rn=f.recipe_name;      
            let des=f.description;
            let ingr=f.ingredients;
            let inst=f.instructions;
            let ring=f.rimg;

                            
                        
            if(diet.value=='')
                { 
                    document.getElementById('dieterror').innerHTML= "diet should not be blank ";   
                    return false;
                }
            if(cuisineType.value=="")
            {
                   document.getElementById('cuisineTypeerror').innerHTML= " Cuisine Type Should not be blank ";
                  return false;
            }
            if(recipe_name.value=="")
                 {
                    document.getElementById('recipeerror').innerHTML= " Recipe Name should not be blank";
                    return false;
             }
             if(description.value=="")
                 {
                    document.getElementById('deserror').innerHTML= " Description Enquiry should not be blank";
                    return false;
             }
             if(ingredients.value=="")
                 {
                    document.getElementById('ingrerror').innerHTML= " Ingredients should not be blank";
                    return false;
             }

             if(instructions.value=="")
                 {
                    document.getElementById('insterror').innerHTML= " Instructions should not be blank";
                    return false;
             }

             if(rimg.value=="")
                 {
                    document.getElementById('rimgerror').innerHTML= " Rimg should not be blank";
                    return false;
             }
                return true;
            }
    </script>


    <!----form-valid---->

    <div class="recipe-container">
        <h2>Add Recipe</h2>
        <form method="post" onsubmit="return validate(this)" name="f1" enctype="multipart/form-data">

        <div class="slct">
            <div class="form-group">
                    <label for="diet">Diet Type</label>
                    <select  id="diet" name="diet">
                        <option value="">--Select--</option>
                        <option value="Weight Watchers">Weight Watchers</option>
                        <option value="Diary Free">Diary Free</option>
                        <option value="Gluten Free">Gluten Free</option>
                        <option value="High Protein">High Protein</option>
                        <option value="Vegetarian">Vegetarian</option>
                    </select>  
                    <span id="dieterror" class="error-color"></span>  
            </div>
            <div class="form-group">
                    <label for="cuisineType">Cousin Type</label>
                    <select  id="cuisineType" name="cuisineType">
                        <option value="">--Select--</option>
                        <option value="Indian">Indian</option>
                        <option value="Chinese">Chinees</option>
                        <option value="Italian">Italian</option>
                        <option value="Japanese">Japnees</option>
                        <option value="Canadian">Canadian</option>
                    </select>
                    <span id="cuisineTypeerror" class="error-color"></span>    
            </div>
        </div>

            <div class="form-group">
                <label for="recipe_name">Recipe Name</label>
                <input type="text" id="recipe_name" name="recipe_name" >
                <span id="recipeerror" class="error-color"></span>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" ></textarea>
                <span id="deserror" class="error-color"></span>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea id="ingredients" name="ingredients" ></textarea>
                <span id="ingrerror" class="error-color"></span>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea id="instructions" name="instructions" ></textarea>
                <span id="insterror" class="error-color"></span>
            </div>
            <div class="form-group">
                <label for="rimg">Recipe Image</label>
                <input type="file" id="rimg" name="rimg"></input>
                <span id="rimgerror" class="error-color"></span>
            </div>
            
            <button type="submit" name="submit">Submit</button>
        </form>
        <p>
        <?php
// Check if form is submitted
if(isset($_POST["submit"])){
    // Retrieve form data
    $diet=$_POST["diet"];
    $cuisineType=$_POST['cuisineType'];
    $recipe_name = $_POST["recipe_name"];
    $desc=$_POST['description'];
    $ing = $_POST["ingredients"];
    $ins = $_POST["instructions"];
    $img_name=$_FILES["rimg"]['name'];
    
    if (empty($recipe_name) || empty($ing) || empty($ins)) {
        echo "All fields are required.";
        exit;
    }
    if($img_name!=''):
        move_uploaded_file($_FILES['rimg']['tmp_name'],"recipe/".$img_name);
        $result=$rec->addRecipe($diet,$cuisineType,$recipe_name,$desc,$ing,$ins,$img_name,$_SESSION['userid']);
    
        if ($result>0) {
       
        echo "Recipe Added Successfully";
        ?>
   
    
        <?php } else {
        echo "Unable to Insert";
        }
    else:
    echo "please upload Image ";
    endif;    
}
?>

        </p>
    </div>
<?php include_once "footer.php";?>
