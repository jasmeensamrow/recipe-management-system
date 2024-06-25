<?php
@session_start();
include_once "config.php";
$rec=new RecipeManager();
 $rw=$rec->getRecipeById($_GET['rid']);
unlink("recipe/".$rw['img_url']);
 
   
    $result=$rec->deleteRecipe($_GET['rid']);
    
        if ($result) {
       
        header("location:recipe-list.php");
      
         } ?>
   