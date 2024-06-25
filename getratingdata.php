<?php
@session_start();
include_once "config.php";

$userId = $_SESSION['userid'];

$query = "SELECT * FROM recipe where recipe_id=".$_POST['recipe_id']." ORDER BY id DESC";
$result = $this->conn->query($query);

$outputString = '';

foreach ($result as $row) {
    $userRating = userRating($userId, $row['id'], $conn);
    $totalRating = totalRating($row['id'], $conn);
    $outputString .= '
        <div class="row-item">
 <div class="row-title">' . $row['name'] . '</div> <div class="response" id="response-' . $row['id'] . '"></div>
 <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['id'] . ',' . $userRating . ');"> ';
    
    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $row['id'] . '_' . $count;
        
        if ($count <= $userRating) {
            
            $outputString .= '<li value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  id="' . $starRatingId . '" class="star" onclick="addRating(' . $row['id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['id'] . ',' . $count . ');">&#9733;</li>';
        }
    } // endFor
    
    $outputString .= '
 </ul>
 
 <p class="review-note">Total Reviews: ' . $totalRating . '</p>
 <p class="text-address">' . $row["address"] . '</p>
</div>
 ';
}
echo $outputString;
?>