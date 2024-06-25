<?php
@session_start();
include_once "config.php";
$rec=new RecipeManager();
 
 
    // Retrieve form data
    $recipe_id=$_POST["recipe_id"];
    $diet = $_POST["diet"];
    $cuisineType=$_POST["cuisineType"];
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
    else:
    $img_name=$_POST['oldimg'];
    endif;
    $result=$rec->updateRecipe($diet,$cuisineType,$recipe_name,$desc,$ing,$ins,$img_name,$recipe_id);
    
        if ($result) {
       
        header("location:edit-recipe.php?rid=".$recipe_id."&msg=Updated Successfully");
      
        ?>
      
        <?php } else {
        header("location:edit-recipe.php?rid=".$recipe_id."&msg=Unable to update");
        }
   