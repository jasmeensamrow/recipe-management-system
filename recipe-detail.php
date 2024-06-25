<?php include_once "header.php";?>
<?php @session_start();
include_once "config.php";
$rec=new RecipeManager();
 $data=$rec->getRecipeById($_GET['rid']);
 
?>   
<div class="container">
        <div class="recipe-details">
            <img src="recipe/<?php echo $data['img_url'];?>" alt="Recipe 1">
            <?php  /** rating  ***/ ?>
          
            <?php  $av=round($rec->getAverageRating($data['recipe_id'])); ?>
            <div class="rating">
               Rating: <?php for($i=1;$i<=$av;$i++)
                {?>
                <span class="star active">&#9733;</span>
                <?php } 
                for($i=1;$i<=(5-$av);$i++)
                {
                ?>
                <span class="star">&#9733;</span>
                <?php } ?>
                 <?php echo $av;?> out of 5   
                </div>
            <h2><?php echo $data['title'];?></h2>
            <h3>Instructions:</h3>
            <p><?php echo $data['description'];?></p>
            <div class="ingredients">
                <h3>Ingredients:</h3>
                <?php $x=explode(",",$data['ingred']);
                  ?>
                <ul>
                <?php foreach($x as $a){
                 ?>   
                <li><?php echo $a;?></li>
                
                <?php }?>    
                   
                    <!-- Add more ingredients here -->
                </ul>
            </div>
            <div class="instructions">
                <h3>Instructions:</h3>
                <ol>
                <?php $y=explode(",",$data['instructions']);
                  ?>
                <?php foreach($y as $a){
                 ?>   
                <li><?php echo $a;?></li>
                
                <?php }?>    
                    
                    <!-- Add more steps here -->
                </ol>
            </div>
        </div>
        <div class="sidebar">
            <h2>Recently Uploaded</h2>
            <ul>
            <?php
            $rwlist=$rec->getrecentRecipes();
            foreach($rwlist as $dr)
            {
            ?>
            

                <li><div class="sidebar-list">
                    <img src="recipe/<?php echo $dr['img_url'];?>">
                    <a href="recipe-detail.php?rid=<?php echo $dr['recipe_id'];?>"><?php echo $dr['title'];?></a>
                    </div>
                </li>
             <?php }
             ?>
               
                <!-- Add more related recipes here -->
            </ul>

            <h2>Dietery Food</h2>
                      
                <!-- Add more related recipes here -->
          
                <ul>
                <li><a href="search.php?keyword=Weight Watchers">Weight Watchers</a></li>
                <li><a href="search.php?keyword=Diary Free">Diary Free</a></li>
                <li><a href="search.php?keyword=Gluten Free">Gluten Free</a></li>
                <li><a href="search.php?keyword=High Protein">High Protein</a></li>
                <li><a href="search.php?keyword=Vegetarian">Vegetarian</a></li>     
            </ul>
        </div>
    </div>
   <?php include_once "footer.php";?>