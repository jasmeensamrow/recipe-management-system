<?php
@session_start();
include_once "config.php";
$rec=new RecipeManager();
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$userId = $_SESSION['userid'];

if (isset($_POST["index"], $_POST["recipe_id"])) {
    
    $restaurantId = $_POST["recipe_id"];
    $rating = $_POST["index"];
    
    $checkIfExistQuery = "select * from tbl_rating where user_id = '" . $userId . "' and restaurant_id = '" . $restaurantId . "'";
    if ($result = mysqli_query($conn, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }
    
    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO rating(user_id,recipe_id, rating) VALUES ('" . $userId . "','" . $recipe_Id . "','" . $rating . "') ";
        $result = mysqli_query($conn, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}