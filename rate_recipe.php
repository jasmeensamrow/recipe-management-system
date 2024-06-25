<?php
@session_start();
include_once 'config.php'; // Include the PHP script with database functions
$rec=new RecipeManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipeId = $_POST['recipe_id'];
    $rating = $_POST['rating'];
    if(isset($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }
    if(isset($_POST['page'])){
        $page=$_POST['page'];
    }
 //  print_r($_POST); 
    // Add rating to the database
 //die; 
    $rec->addRating($recipeId, $_SESSION['userid'], $rating);
    if($page=='search' && $keyword!=''){
        header("location:search.php?keyword=$keyword");    
    }
     else if ($page=='search' && $keyword=='')
     {
        header("location:search.php");
     }
    else{
    header("location:index.php");
    }    
}
?>